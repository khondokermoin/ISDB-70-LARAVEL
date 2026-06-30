@extends('layouts.admin_master')

@push('styles')
@endpush

@push('scripts')
@endpush

@section('content')
    <div class="container-fluid px-3 px-lg-4 py-4">
        
        {{-- ===== Page Heading ===== --}}
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
            <div class="d-flex align-items-center gap-3">
                <div class="bg-danger bg-opacity-10 rounded-3 p-3">
                    <i class="bi bi-speedometer2 text-danger fs-3"></i>
                </div>
                <div>
                    <p class="text-uppercase small fw-semibold text-muted mb-1" style="letter-spacing: 1px;">Overview</p>
                    <h1 class="h3 mb-1 fw-bold">Dashboard</h1>
                    <p class="text-muted mb-0 small">Monitor performance, sales, users, and support from one clean workspace.</p>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-outline-secondary btn-sm" type="button">
                    <i class="bi bi-download me-1"></i> Export
                </button>
                <button class="btn btn-primary btn-sm" type="button">
                    <i class="bi bi-file-earmark-plus me-1"></i> Create Report
                </button>
            </div>
        </div>

        {{-- ===== Metric Cards ===== --}}
        <div class="row g-3 mb-4">
            
            {{-- Revenue --}}
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted small fw-semibold">Revenue</span>
                            <div class="bg-primary bg-opacity-10 rounded-circle p-2">
                                <i class="bi bi-currency-dollar text-primary"></i>
                            </div>
                        </div>
                        <h3 class="fw-bold mb-2">$48,240</h3>
                        <div class="d-flex align-items-center gap-2 small">
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
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted small fw-semibold">Orders</span>
                            <div class="bg-success bg-opacity-10 rounded-circle p-2">
                                <i class="bi bi-bag-check text-success"></i>
                            </div>
                        </div>
                        <h3 class="fw-bold mb-2">1,284</h3>
                        <div class="d-flex align-items-center gap-2 small">
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
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted small fw-semibold">Customers</span>
                            <div class="bg-warning bg-opacity-10 rounded-circle p-2">
                                <i class="bi bi-people text-warning"></i>
                            </div>
                        </div>
                        <h3 class="fw-bold mb-2">8,742</h3>
                        <div class="d-flex align-items-center gap-2 small">
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
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted small fw-semibold">Tickets</span>
                            <div class="bg-danger bg-opacity-10 rounded-circle p-2">
                                <i class="bi bi-life-preserver text-danger"></i>
                            </div>
                        </div>
                        <h3 class="fw-bold mb-2">36</h3>
                        <div class="d-flex align-items-center gap-2 small">
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
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <img class="img-fluid rounded-3"
                    src="https://img.magnific.com/free-vector/stylish-welcome-lettering-banner-join-with-joy-happiness_1017-57675.jpg?t=st=1781502311~exp=1781505911~hmac=fa76fda1f817cd7220bf1ba360e13570ee7ce93060d647701e52b3c3c7534190&w=740"
                    alt="Welcome Banner">
            </div>
        </div>
    </div>
@endsection