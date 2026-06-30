@extends('layouts.admin_master')

@push('styles')
    {{-- ✅ Styles সরিয়ে দেওয়া হয়েছে - সব global style admin_master.blade.php এ আছে --}}
@endpush

@push('scripts')
@endpush

@section('content')
    <div class="px-3 py-4 container-fluid px-lg-4">

        {{-- ===== Page Heading ===== --}}
        <div class="gap-3 mb-4 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
            <div class="gap-3 d-flex align-items-center">
                <div class="p-3 bg-danger bg-opacity-10 rounded-3 page-heading-icon">
                    <i class="bi bi-speedometer2 text-danger fs-3"></i>
                </div>
                <div>
                    <p class="mb-1 text-uppercase small fw-semibold text-muted" style="letter-spacing: 1px;">Overview</p>
                    <h1 class="mb-1 h3 fw-bold">Dashboard</h1>
                    <p class="mb-0 text-muted small">Monitor performance, sales, users, and support from one clean workspace.</p>
                </div>
            </div>
            <div class="gap-2 d-flex">
                <button class="btn btn-outline-secondary btn-sm" type="button">
                    <i class="bi bi-download me-1"></i> Export
                </button>
                <button class="btn btn-primary btn-sm" type="button">
                    <i class="bi bi-file-earmark-plus me-1"></i> Create Report
                </button>
            </div>
        </div>

        {{-- ===== Metric Cards ===== --}}
        <div class="mb-4 row g-3">

            {{-- Revenue --}}
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="border-0 shadow-sm card h-100">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <span class="text-muted small fw-semibold">Revenue</span>
                            <div class="p-2 bg-primary bg-opacity-10 rounded-circle icon-wrapper">
                                <i class="bi bi-currency-dollar text-primary"></i>
                            </div>
                        </div>
                        <h3 class="mb-2 fw-bold">$48,240</h3>
                        <div class="gap-2 d-flex align-items-center small">
                            <span class="badge bg-success bg-opacity-10 text-success">
                                <i class="bi bi-arrow-up"></i> +12.5%
                            </span>
                            <span class="text-muted">from last month</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Orders --}}
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="border-0 shadow-sm card h-100">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <span class="text-muted small fw-semibold">Orders</span>
                            <div class="p-2 bg-success bg-opacity-10 rounded-circle icon-wrapper">
                                <i class="bi bi-bag-check text-success"></i>
                            </div>
                        </div>
                        <h3 class="mb-2 fw-bold">1,284</h3>
                        <div class="gap-2 d-flex align-items-center small">
                            <span class="badge bg-success bg-opacity-10 text-success">
                                <i class="bi bi-arrow-up"></i> +8.2%
                            </span>
                            <span class="text-muted">new orders</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Customers --}}
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="border-0 shadow-sm card h-100">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <span class="text-muted small fw-semibold">Customers</span>
                            <div class="p-2 bg-warning bg-opacity-10 rounded-circle icon-wrapper">
                                <i class="bi bi-people text-warning"></i>
                            </div>
                        </div>
                        <h3 class="mb-2 fw-bold">8,742</h3>
                        <div class="gap-2 d-flex align-items-center small">
                            <span class="badge bg-success bg-opacity-10 text-success">
                                <i class="bi bi-arrow-up"></i> +5.1%
                            </span>
                            <span class="text-muted">active users</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tickets --}}
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="border-0 shadow-sm card h-100">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <span class="text-muted small fw-semibold">Tickets</span>
                            <div class="p-2 bg-danger bg-opacity-10 rounded-circle icon-wrapper">
                                <i class="bi bi-life-preserver text-danger"></i>
                            </div>
                        </div>
                        <h3 class="mb-2 fw-bold">36</h3>
                        <div class="gap-2 d-flex align-items-center small">
                            <span class="badge bg-danger bg-opacity-10 text-danger">
                                <i class="bi bi-exclamation-circle"></i> 3 urgent
                            </span>
                            <span class="text-muted">need review</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ===== Welcome Banner ===== --}}
        <div class="border-0 shadow-sm card">
            <div class="p-0 card-body welcome-banner-wrapper">
                <img class="img-fluid w-100"
                    src="https://img.magnific.com/free-vector/stylish-welcome-lettering-banner-join-with-joy-happiness_1017-57675.jpg?t=st=1781502311~exp=1781505911~hmac=fa76fda1f817cd7220bf1ba360e13570ee7ce93060d647701e52b3c3c7534190&w=740"
                    alt="Welcome Banner">
            </div>
        </div>
    </div>
@endsection
