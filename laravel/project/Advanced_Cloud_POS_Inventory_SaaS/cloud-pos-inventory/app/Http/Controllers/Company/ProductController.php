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

class ProductController extends Controller
{
    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $companyId = auth()->user()->company_id;

        // ড্রপডাউনের জন্য প্রয়োজনীয় ডাটা লোড করা (শুধুমাত্র সক্রিয় ডাটা)
        $categories = Category::where('company_id', $companyId)->where('is_active', true)->get();
        $brands     = Brand::where('company_id', $companyId)->where('is_active', true)->get();
        $units      = Unit::where('company_id', $companyId)->get();
        $taxes      = Tax::where('company_id', $companyId)->get();

        return view('company.products.create', compact('categories', 'brands', 'units', 'taxes'));
    }

    /**
     * Store a newly created product and its variant(s) in storage.
     */
    public function store(Request $request)
    {
        $companyId = auth()->user()->company_id;
        $userId    = auth()->id();

        // ১. সম্পূর্ণ ফর্ম ভ্যালিডেশন
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'category_id'  => 'required|exists:categories,id',
            'brand_id'     => 'nullable|exists:brands,id',
            'description'  => 'nullable|string',
            'has_variants' => 'nullable|boolean',
            
            // ভেরিয়েন্ট ডাটা ভ্যালিডেশন
            'variants'                 => 'required|array|min:1',
            'variants.*.sku'           => 'required|string|max:255',
            'variants.*.barcode'       => 'nullable|string|max:255',
            'variants.*.unit_id'       => 'required|exists:units,id',
            'variants.*.tax_id'        => 'nullable|exists:taxes,id',
            'variants.*.cost_price'    => 'required|numeric|min:0',
            'variants.*.selling_price' => 'required|numeric|min:0',
            'variants.*.stock'         => 'required|integer|min:0',
            'variants.*.reorder_level' => 'required|integer|min:0',
            'variants.*.attributes'    => 'nullable|array',
        ]);

        // ২. ডাটাবেস ট্রানজেকশন শুরু (যাতে কোনো ধাপে ফেইল করলে পুরো প্রক্রিয়া বাতিল হয়)
        DB::beginTransaction();

        try {
            // ক) মূল প্রোডাক্ট তৈরি
            $product = Product::create([
                'company_id'   => $companyId,
                'name'         => $validated['name'],
                'category_id'  => $validated['category_id'],
                'brand_id'     => $validated['brand_id'] ?? null,
                'description'  => $validated['description'] ?? null,
                'has_variants' => $request->boolean('has_variants'),
            ]);

            // খ) ভেরিয়েন্ট(গুলো) প্রসেস এবং তৈরি করা
            foreach ($validated['variants'] as $variantData) {
                
                // অ্যাট্রিবিউট হ্যান্ডলিং: খালি বা অসম্পূর্ণ অ্যাট্রিবিউট বাদ দিয়ে JSON এ রূপান্তর
                $cleanAttributes = [];
                if (!empty($variantData['attributes']) && is_array($variantData['attributes'])) {
                    foreach ($variantData['attributes'] as $attr) {
                        // শুধুমাত্র সেই অ্যাট্রিবিউট নেওয়া হবে যেখানে Key এবং Value দুটোই আছে
                        if (!empty($attr['key']) && !empty($attr['value'])) {
                            $cleanAttributes[] = [
                                'key'   => trim($attr['key']),
                                'value' => trim($attr['value'])
                            ];
                        }
                    }
                }
                
                // অ্যাট্রিবিউট অ্যারে থাকলে JSON স্ট্রিং হিসেবে সেভ করা হবে (ডেটাবেসে JSON কলাম থাকতে হবে)
                $variantData['attributes'] = !empty($cleanAttributes) ? json_encode($cleanAttributes) : null;
                $variantData['product_id'] = $product->id;

                // ভেরিয়েন্ট ডাটাবেসে সেভ করা
                $variant = ProductVariant::create($variantData);

                // গ) ইনিশিয়াল স্টক এবং Stock Movement এন্ট্রি (যদি স্টক > 0 হয়)
                $initialStock = (int) ($variantData['stock'] ?? 0);
                if ($initialStock > 0) {
                    
                    // স্টক টেবিল আপডেট বা তৈরি করা
                    Stock::updateOrCreate(
                        [
                            'company_id' => $companyId,
                            'product_id' => $product->id,
                            'variant_id' => $variant->id,
                        ],
                        [
                            'quantity'      => $initialStock,
                            'reorder_level' => $variantData['reorder_level'],
                        ]
                    );

                    // অডিট ট্রেইলের জন্য স্টক মুভমেন্ট লগ তৈরি করা
                    StockMovement::create([
                        'company_id' => $companyId,
                        'product_id' => $product->id,
                        'variant_id' => $variant->id,
                        'type'       => 'in', // 'in' মানে স্টক যোগ হয়েছে
                        'quantity'   => $initialStock,
                        'reference'  => 'Initial Stock',
                        'user_id'    => $userId,
                    ]);
                }
            }

            // সব সফল হলে ডাটাবেস কমিট করুন
            DB::commit();

            return redirect()->route('company.products.index')
                             ->with('success', 'পণ্য এবং এর ভেরিয়েন্ট সফলভাবে যোগ করা হয়েছে!');

        } catch (\Exception $e) {
            // কোনো এরর হলে ডাটাবেস রোলব্যাক করুন
            DB::rollBack();
            
            // ডিবাগিংয়ের জন্য লগ রাখা ভালো (optional)
            // \Log::error('Product Creation Failed: ' . $e->getMessage());

            return back()->withInput()->with('error', 'পণ্য যোগ করতে সমস্যা হয়েছে: ' . $e->getMessage());
        }
    }
}