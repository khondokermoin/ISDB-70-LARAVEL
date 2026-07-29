<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Tax;
use App\Models\Stock;
use App\Models\StockMovement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        $companyId = Auth::user()->company_id;

        $products = Product::where('company_id', $companyId)
            ->with(['category', 'brand', 'variants.stock'])
            ->latest()
            ->paginate(15);

        return view('company.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $companyId = Auth::user()->company_id;

        $categories = Category::where('company_id', $companyId)->where('is_active', true)->get();
        $brands     = Brand::where('company_id', $companyId)->where('is_active', true)->get();
        $units      = Unit::where('company_id', $companyId)->where('is_active', true)->get();
        $taxes      = Tax::where('company_id', $companyId)->where('is_active', true)->get();

        return view('company.products.create', compact('categories', 'brands', 'units', 'taxes'));
    }

    /**
     * Store a newly created product and its variant(s) in storage.
     */
    public function store(Request $request)
    {
        $companyId = Auth::user()->company_id;
        $branchId  = Auth::user()->branch_id;
        $userId    = Auth::id();

        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'category_id'  => 'required|exists:categories,id,company_id,' . $companyId,
            'brand_id'     => 'nullable|exists:brands,id,company_id,' . $companyId,
            'description'  => 'nullable|string',
            'has_variants' => 'nullable|boolean',

            'variants'                 => 'required|array|min:1',
            'variants.*.sku'           => 'required|string|max:255',
            'variants.*.barcode'       => 'nullable|string|max:255',
            'variants.*.unit_id'       => 'required|exists:units,id,company_id,' . $companyId,
            'variants.*.tax_id'        => 'nullable|exists:taxes,id,company_id,' . $companyId,
            'variants.*.cost_price'    => 'required|numeric|min:0',
            'variants.*.selling_price' => 'required|numeric|min:0',
            'variants.*.stock'         => 'required|integer|min:0',
            'variants.*.reorder_level' => 'required|integer|min:0',
            'variants.*.attributes'    => 'nullable|array',
        ]);

        DB::beginTransaction();

        try {
            // ক) মূল প্রোডাক্ট তৈরি
            $product = Product::create([
                'company_id'   => $companyId,
                'name'         => $validated['name'],
                'category_id'  => $validated['category_id'],
                'description'  => $validated['description'] ?? null,
                'has_variants' => $request->boolean('has_variants'),
                'is_active'    => true,
            ]);

            // খ) ভেরিয়েন্ট(গুলো) প্রসেস এবং তৈরি করা
            foreach ($validated['variants'] as $variantData) {
                $cleanAttributes = [];
                if (!empty($variantData['attributes']) && is_array($variantData['attributes'])) {
                    foreach ($variantData['attributes'] as $attr) {
                        if (!empty($attr['key']) && !empty($attr['value'])) {
                            $cleanAttributes[] = [
                                'key'   => trim($attr['key']),
                                'value' => trim($attr['value']),
                            ];
                        }
                    }
                }

                $variant = ProductVariant::create([
                    'product_id'    => $product->id,
                    'sku'           => $variantData['sku'],
                    'barcode'       => $variantData['barcode'] ?? null,
                    'unit_id'       => $variantData['unit_id'],
                    'tax_id'        => $variantData['tax_id'] ?? null,
                    'cost_price'    => $variantData['cost_price'],
                    'selling_price' => $variantData['selling_price'],
                    'reorder_level' => $variantData['reorder_level'],
                    'attributes'    => !empty($cleanAttributes) ? $cleanAttributes : null,
                    'is_active'     => true,
                ]);

                // গ) ইনিশিয়াল স্টক এন্ট্রি (branch_id দরকার)
                $initialStock = (int) ($variantData['stock'] ?? 0);
                if ($initialStock > 0 && $branchId) {
                    Stock::updateOrCreate(
                        [
                            'company_id' => $companyId,
                            'branch_id'  => $branchId,
                            'variant_id' => $variant->id,
                        ],
                        [
                            'quantity'      => $initialStock,
                            'reorder_level' => $variantData['reorder_level'],
                        ]
                    );

                    StockMovement::create([
                        'company_id'     => $companyId,
                        'branch_id'      => $branchId,
                        'variant_id'     => $variant->id,
                        'type'           => 'purchase_in',
                        'quantity'       => $initialStock,
                        'user_id'        => $userId,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('company.products.index')
                ->with('success', 'পণ্য এবং এর ভেরিয়েন্ট সফলভাবে যোগ করা হয়েছে!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'পণ্য যোগ করতে সমস্যা হয়েছে: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        $this->authorizeCompany($product);

        $product->load(['category', 'brand', 'variants.stock', 'variants.tax']);
        return view('company.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        $this->authorizeCompany($product);
        $companyId = Auth::user()->company_id;

        $product->load('variants');

        $categories = Category::where('company_id', $companyId)->where('is_active', true)->get();
        $brands     = Brand::where('company_id', $companyId)->where('is_active', true)->get();
        $units      = Unit::where('company_id', $companyId)->where('is_active', true)->get();
        $taxes      = Tax::where('company_id', $companyId)->where('is_active', true)->get();

        return view('company.products.edit', compact('product', 'categories', 'brands', 'units', 'taxes'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {
        $this->authorizeCompany($product);
        $companyId = Auth::user()->company_id;
        $branchId  = Auth::user()->branch_id;
        $userId    = Auth::id();

        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'category_id'  => 'required|exists:categories,id,company_id,' . $companyId,
            'brand_id'     => 'nullable|exists:brands,id,company_id,' . $companyId,
            'description'  => 'nullable|string',
            'has_variants' => 'nullable|boolean',

            'variants'                 => 'required|array|min:1',
            'variants.*.id'            => 'nullable|exists:product_variants,id',
            'variants.*.sku'           => 'required|string|max:255',
            'variants.*.barcode'       => 'nullable|string|max:255',
            'variants.*.unit_id'       => 'required|exists:units,id,company_id,' . $companyId,
            'variants.*.tax_id'        => 'nullable|exists:taxes,id,company_id,' . $companyId,
            'variants.*.cost_price'    => 'required|numeric|min:0',
            'variants.*.selling_price' => 'required|numeric|min:0',
            'variants.*.stock'         => 'required|integer|min:0',
            'variants.*.reorder_level' => 'required|integer|min:0',
            'variants.*.attributes'    => 'nullable|array',
        ]);

        DB::beginTransaction();

        try {
            $product->update([
                'name'         => $validated['name'],
                'category_id'  => $validated['category_id'],
                'description'  => $validated['description'] ?? null,
                'has_variants' => $request->boolean('has_variants'),
            ]);

            foreach ($validated['variants'] as $variantData) {
                $cleanAttributes = [];
                if (!empty($variantData['attributes']) && is_array($variantData['attributes'])) {
                    foreach ($variantData['attributes'] as $attr) {
                        if (!empty($attr['key']) && !empty($attr['value'])) {
                            $cleanAttributes[] = [
                                'key'   => trim($attr['key']),
                                'value' => trim($attr['value']),
                            ];
                        }
                    }
                }

                $variantId = $variantData['id'] ?? null;

                $variantPayload = [
                    'sku'           => $variantData['sku'],
                    'barcode'       => $variantData['barcode'] ?? null,
                    'unit_id'       => $variantData['unit_id'],
                    'tax_id'        => $variantData['tax_id'] ?? null,
                    'cost_price'    => $variantData['cost_price'],
                    'selling_price' => $variantData['selling_price'],
                    'reorder_level' => $variantData['reorder_level'],
                    'attributes'    => !empty($cleanAttributes) ? $cleanAttributes : null,
                ];

                if ($variantId) {
                    $variant = ProductVariant::where('product_id', $product->id)->findOrFail($variantId);
                    $variant->update($variantPayload);
                } else {
                    $variantPayload['product_id'] = $product->id;
                    $variantPayload['is_active']  = true;
                    $newVariant = ProductVariant::create($variantPayload);

                    $initialStock = (int) ($variantData['stock'] ?? 0);
                    if ($initialStock > 0 && $branchId) {
                        Stock::updateOrCreate(
                            [
                                'company_id' => $companyId,
                                'branch_id'  => $branchId,
                                'variant_id' => $newVariant->id,
                            ],
                            [
                                'quantity'      => $initialStock,
                                'reorder_level' => $variantData['reorder_level'],
                            ]
                        );
                        StockMovement::create([
                            'company_id' => $companyId,
                            'branch_id'  => $branchId,
                            'variant_id' => $newVariant->id,
                            'type'       => 'purchase_in',
                            'quantity'   => $initialStock,
                            'user_id'    => $userId,
                        ]);
                    }
                }
            }

            DB::commit();
            return redirect()->route('company.products.index')
                ->with('success', 'পণ্য সফলভাবে আপডেট করা হয়েছে!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'পণ্য আপডেট করতে সমস্যা হয়েছে: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        $this->authorizeCompany($product);

        $hasHistory = StockMovement::where('variant_id', function ($query) use ($product) {
            $query->select('id')->from('product_variants')->where('product_id', $product->id);
        })->exists();

        if ($hasHistory) {
            return back()->with('error', 'এই পণ্যটি মুছে ফেলা যাবে না কারণ এর লেনদেনের ইতিহাস রয়েছে। আপনি চাইলে এটি Inactive করে দিতে পারেন।');
        }

        DB::beginTransaction();
        try {
            $product->variants()->each(function ($variant) {
                Stock::where('variant_id', $variant->id)->delete();
                StockMovement::where('variant_id', $variant->id)->delete();
                $variant->delete();
            });

            $product->delete();
            DB::commit();

            return redirect()->route('company.products.index')
                ->with('success', 'পণ্য সফলভাবে মুছে ফেলা হয়েছে।');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'পণ্য মুছে ফেলতে সমস্যা হয়েছে: ' . $e->getMessage());
        }
    }

    /**
     * Helper: ensure product belongs to authenticated user's company.
     */
    private function authorizeCompany(Product $product): void
    {
        if ($product->company_id !== Auth::user()->company_id) {
            abort(403, 'অননুমোদিত অ্যাক্সেস। এই পণ্যটি আপনার কোম্পানির অন্তর্ভুক্ত নয়।');
        }
    }
}
