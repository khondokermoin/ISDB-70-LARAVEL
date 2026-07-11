@extends('layouts.admin_master')

@section('title', 'Company Details')

@section('content')
    <!-- Page Title & Breadcrumb -->
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4 class="page-title">Company Details</h4>
        </div>
        <div class="col-sm-6 text-sm-end">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('superadmin.companies.index') }}">Companies</a></li>
                    <li class="breadcrumb-item active">Details</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <!-- Company Info Card -->
        <div class="col-xl-4 col-lg-5">
            <div class="card text-center">
                <div class="card-body">
                    <img src="https://ui-avatars.com/api/?name=Super+Company&background=random&size=128" class="rounded-circle img-thumbnail mb-3" alt="company-image">
                    <h4 class="mb-1">Super Company Ltd.</h4>
                    <p class="text-muted">contact@supercompany.com</p>

                    <a href="{{ route('superadmin.tenants.index') }}" class="btn btn-success btn-sm mb-2">
                        <i class="ti ti-login me-1"></i> Login as Tenant
                    </a>

                    <hr>

                    <div class="row text-start mt-3">
                        <div class="col-12 mb-2">
                            <p class="text-muted mb-1 fs-13"><i class="ti ti-phone me-1"></i> Phone:</p>
                            <p class="fw-semibold">+880 1700-000000</p>
                        </div>
                        <div class="col-12 mb-2">
                            <p class="text-muted mb-1 fs-13"><i class="ti ti-map-pin me-1"></i> Address:</p>
                            <p class="fw-semibold">123 Business Area, Dhaka, Bangladesh</p>
                        </div>
                        <div class="col-12 mb-2">
                            <p class="text-muted mb-1 fs-13"><i class="ti ti-calendar-event me-1"></i> Joined On:</p>
                            <p class="fw-semibold">10 Jan 2026</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subscription & Stats -->
        <div class="col-xl-8 col-lg-7">
            <!-- Subscription Info -->
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Subscription Details</h4>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="bg-light p-3 rounded text-center">
                                <p class="text-muted mb-1 fs-13">Current Plan</p>
                                <h4 class="text-primary mb-0">Enterprise</h4>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="bg-light p-3 rounded text-center">
                                <p class="text-muted mb-1 fs-13">Status</p>
                                <h4 class="text-success mb-0">Active</h4>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="bg-light p-3 rounded text-center">
                                <p class="text-muted mb-1 fs-13">Expires On</p>
                                <h4 class="text-danger mb-0">31 Dec 2026</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Usage Stats -->
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Platform Usage</h4>
                    <div class="row">
                        <div class="col-sm-6 col-md-3 mb-3">
                            <div class="card bg-primary text-white shadow-none">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4 class="mb-0 text-white">145</h4>
                                            <p class="mb-0 mt-1 fs-13">Total Users</p>
                                        </div>
                                        <div class="avatar-md">
                                            <span class="avatar-title bg-transparent text-white rounded-circle">
                                                <i class="ti ti-users fs-2"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 mb-3">
                            <div class="card bg-success text-white shadow-none">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4 class="mb-0 text-white">1,240</h4>
                                            <p class="mb-0 mt-1 fs-13">Products</p>
                                        </div>
                                        <div class="avatar-md">
                                            <span class="avatar-title bg-transparent text-white rounded-circle">
                                                <i class="ti ti-package fs-2"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 mb-3">
                            <div class="card bg-warning text-white shadow-none">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4 class="mb-0 text-white">89</h4>
                                            <p class="mb-0 mt-1 fs-13">Categories</p>
                                        </div>
                                        <div class="avatar-md">
                                            <span class="avatar-title bg-transparent text-white rounded-circle">
                                                <i class="ti ti-category fs-2"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 mb-3">
                            <div class="card bg-info text-white shadow-none">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4 class="mb-0 text-white">5,432</h4>
                                            <p class="mb-0 mt-1 fs-13">Total Sales</p>
                                        </div>
                                        <div class="avatar-md">
                                            <span class="avatar-title bg-transparent text-white rounded-circle">
                                                <i class="ti ti-chart-bar fs-2"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection