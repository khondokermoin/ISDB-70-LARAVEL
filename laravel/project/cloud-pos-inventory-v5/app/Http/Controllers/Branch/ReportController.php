<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function dailySales(Request $request)
    {
        $branchId = Auth::user()->branch_id;
        $date = $request->input('date', today()->format('Y-m-d'));

        $sales = Sale::with('customer')
            ->where('branch_id', $branchId)
            ->whereDate('created_at', $date)
            ->latest()
            ->get();

        $totalRevenue = $sales->sum('total_amount');
        $totalSales = $sales->count();

        return view('branch.reports.daily-sales', compact('sales', 'totalRevenue', 'totalSales', 'date'));
    }
}
