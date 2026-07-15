<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\ProductVariant;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Stock;
use App\Models\StockMovement;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::with(['branch', 'supplier', 'user'])
            ->where('company_id', auth()->user()->company_id)
            ->latest()
            ->paginate(15);
        return view('company.purchases.index', compact('purchases'));
    }

    public function create()
    {
        $companyId = auth()->user()->company_id;
        $branches = Branch::where('company_id', $companyId)->get();
        $suppliers = Supplier::where('company_id', $companyId)->get();
        // সব Active Product Variant আনা
        $variants = ProductVariant::whereHas('product', function ($q) use ($companyId) {
            $q->where('company_id', $companyId)->where('is_active', true);
        })->where('is_active', true)->with('product')->get();

        return view('company.purchases.create', compact('branches', 'suppliers', 'variants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'branch_id' => 'required|exists:branches,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'purchase_date' => 'required|date',
            'items' => 'required|array|min:1',
            'items.*.variant_id' => 'required|exists:product_variants,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
        ]);

        $companyId = auth()->user()->company_id;
        $userId = auth()->id();

        DB::beginTransaction();
        try {
            // ১. Purchase রেকর্ড তৈরি
            $purchase = Purchase::create([
                'company_id' => $companyId,
                'branch_id' => $request->branch_id,
                'supplier_id' => $request->supplier_id,
                'user_id' => $userId,
                'purchase_date' => $request->purchase_date,
                'total_amount' => $request->total_amount,
                'status' => 'completed',
            ]);

            // ২. প্রতিটি আইটেমের জন্য Stock আপডেট এবং Movement লগ তৈরি
            foreach ($request->items as $item) {
                // Purchase Item সেভ
                $purchase->items()->create([
                    'variant_id' => $item['variant_id'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'subtotal' => $item['quantity'] * $item['unit_price'],
                ]);

                // Stock আপডেট (না থাকলে তৈরি করবে, থাকলে আপডেট করবে)
                $stock = Stock::updateOrCreate(
                    [
                        'company_id' => $companyId,
                        'branch_id' => $request->branch_id,
                        'variant_id' => $item['variant_id'],
                    ],
                    [
                        'quantity' => DB::raw('quantity + ' . $item['quantity']),
                    ]
                );

                // Stock Movement লগ তৈরি
                StockMovement::create([
                    'company_id' => $companyId,
                    'branch_id' => $request->branch_id,
                    'variant_id' => $item['variant_id'],
                    'type' => 'purchase_in',
                    'quantity' => $item['quantity'],
                    'reference_type' => Purchase::class,
                    'reference_id' => $purchase->id,
                    'user_id' => $userId,
                ]);
            }

            DB::commit();
            return redirect()->route('company.purchases.index')->with('success', 'Purchase successful and stock updated!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Purchase failed: ' . $e->getMessage())->withInput();
        }
    }

    public function show(Purchase $purchase)
    {
        if ($purchase->company_id !== auth()->user()->company_id) abort(403);
        $purchase->load(['items.variant.product', 'branch', 'supplier']);
        return view('company.purchases.show', compact('purchase'));
    }
}
