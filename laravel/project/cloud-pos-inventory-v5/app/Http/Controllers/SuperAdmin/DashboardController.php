<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $billingStats = [
            'monthly_revenue' => Transaction::where('status', 'success')
                ->whereMonth('created_at', now()->month)
                ->sum('amount'),
            'total_revenue' => Transaction::where('status', 'success')->sum('amount'),
            'active_subscriptions' => Subscription::where('status', 'active')->count(),
            'expiring_soon' => Subscription::where('status', 'active')
                ->whereBetween('ends_at', [now(), now()->addDays(7)])
                ->count(),
            'total_plans' => Plan::active()->count(),
        ];

        $revenueChart = Transaction::where('status', 'success')
            ->where('created_at', '>=', now()->subMonths(6))
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(amount) as total')
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->map(fn ($row) => [
                'label' => date('M Y', mktime(0, 0, 0, $row->month, 1, $row->year)),
                'total' => (float) $row->total,
            ]);

        $planDistribution = Plan::withCount(['subscriptions' => fn ($q) => $q->where('status', 'active')])
            ->having('subscriptions_count', '>', 0)
            ->get(['id', 'name', 'subscriptions_count']);

        $expiringSoon = Subscription::with(['company', 'plan'])
            ->where('status', 'active')
            ->whereBetween('ends_at', [now(), now()->addDays(7)])
            ->orderBy('ends_at')
            ->get();

        return view('super-admin.dashboard', compact('billingStats', 'revenueChart', 'planDistribution', 'expiringSoon'));
    }
}
