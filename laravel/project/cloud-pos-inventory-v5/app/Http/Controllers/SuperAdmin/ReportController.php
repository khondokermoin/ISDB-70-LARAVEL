<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Subscription;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->input('type', 'revenue');
        $from = $request->input('from', now()->startOfMonth()->format('Y-m-d'));
        $to = $request->input('to', now()->format('Y-m-d'));

        $revenue = Transaction::where('status', 'success')
            ->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
            ->sum('amount');

        $newSubscriptions = Subscription::whereBetween('started_at', [$from, $to])->count();
        $cancelledSubs = Subscription::where('status', 'cancelled')
            ->whereBetween('cancelled_at', [$from, $to])
            ->count();
        $newCompanies = Company::whereBetween('created_at', [$from, $to])->count();

        $transactions = Transaction::with(['company', 'subscription.plan'])
            ->where('status', 'success')
            ->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59'])
            ->latest()
            ->paginate(20);

        return view('super-admin.reports.index', compact(
            'type', 'revenue', 'newSubscriptions', 'cancelledSubs', 'newCompanies', 'transactions', 'from', 'to'
        ));
    }
}