@extends('layouts.admin_master')

@section('content')
<div class="container-fluid">
    <div class="page-title-box">
        <h4 class="page-title">Branch Dashboard</h4>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50 mb-1">Today's Sales</h6>
                        <h2 class="mb-0">{{ $todaySales }}</h2>
                    </div>
                    <i class="ti ti-receipt fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50 mb-1">Today's Revenue</h6>
                        <h2 class="mb-0">৳{{ number_format($todayRevenue, 2) }}</h2>
                    </div>
                    <i class="ti ti-currency-taka fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50 mb-1">Low Stock Items</h6>
                        <h2 class="mb-0">{{ $lowStockCount }}</h2>
                    </div>
                    <i class="ti ti-alert-triangle fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50 mb-1">Total Products</h6>
                        <h2 class="mb-0">{{ $totalProducts }}</h2>
                    </div>
                    <i class="ti ti-package fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Recent Sales</h5>
                    <a href="{{ route('branch.sales.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr><th>Invoice #</th><th>Customer</th><th>Items</th><th>Total</th><th>Date</th></tr>
                        </thead>
                        <tbody>
                            @forelse($recentSales as $sale)
                            <tr>
                                <td><code>{{ $sale->invoice_no ?? '#'.$sale->id }}</code></td>
                                <td>{{ $sale->customer->name ?? 'Walk-in' }}</td>
                                <td>{{ $sale->items_count ?? 0 }}</td>
                                <td><strong>৳{{ number_format($sale->total_amount ?? 0, 2) }}</strong></td>
                                <td>{{ $sale->created_at->format('d M, h:i A') }}</td>
                            </tr>
                            @empty
                            <tr><td colspan="5" class="text-center py-3 text-muted">No sales today.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

