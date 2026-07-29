<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function sales(Request $request)
    {
        $companyId = Auth::user()->company_id;
        $from = $request->input('from', now()->startOfMonth()->format('Y-m-d'));
        $to = $request->input('to', now()->format('Y-m-d'));

        $totalSales = Sale::where('company_id', $companyId)
            ->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
            ->count();
        $totalRevenue = Sale::where('company_id', $companyId)
            ->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
            ->sum('total_amount');
        $totalDiscount = Sale::where('company_id', $companyId)
            ->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
            ->sum('discount');

        $sales = Sale::with(['customer', 'branch'])
            ->where('company_id', $companyId)
            ->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
            ->latest()
            ->paginate(20);

        return view('company.reports.daily-sales', compact('sales', 'totalSales', 'totalRevenue', 'totalDiscount', 'from', 'to'));
    }

    public function stock()
    {
        $companyId = Auth::user()->company_id;

        $stocks = Stock::with(['variant.product', 'branch'])
            ->whereHas('variant.product', fn ($q) => $q->where('company_id', $companyId))
            ->orderBy('quantity', 'asc')
            ->paginate(20);

        $lowStockCount = Stock::whereHas('variant.product', fn ($q) => $q->where('company_id', $companyId))
            ->where('quantity', '<=', 5)
            ->count();
        $outOfStockCount = Stock::whereHas('variant.product', fn ($q) => $q->where('company_id', $companyId))
            ->where('quantity', 0)
            ->count();

        return view('company.reports.stock', compact('stocks', 'lowStockCount', 'outOfStockCount'));
    }
}
