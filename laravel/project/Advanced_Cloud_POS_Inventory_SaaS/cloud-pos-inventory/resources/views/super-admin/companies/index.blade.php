@extends('layouts.admin_master')

@section('title', 'All Companies')

@push('styles')
    {{-- ✅ DataTables CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

    <style>
        /* ========================================
               1. SEARCH BOX STYLING (v1 Theme Adapted)
               ======================================== */
        .company-search-wrapper {
            position: relative;
            max-width: 300px;
            width: 100%;
        }

        .company-search-wrapper .input-group {
            background-color: var(--bs-body-bg) !important;
            border: 1px solid var(--bs-border-color) !important;
            border-radius: 0.5rem !important;
            overflow: hidden;
            transition: all 0.25s ease !important;
        }

        .company-search-wrapper .input-group:focus-within {
            border-color: rgba(25, 135, 84, 0.5) !important;
            box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.15) !important;
        }

        .company-search-wrapper .input-group-text {
            background-color: transparent !important;
            border: 0 !important;
            color: var(--bs-secondary-color) !important;
        }

        .company-search-wrapper .form-control {
            background-color: transparent !important;
            border: 0 !important;
        }

        .company-search-wrapper .form-control:focus {
            box-shadow: none !important;
        }

        /* Clear Button */
        .search-clear-btn {
            background: transparent !important;
            border: 0 !important;
            color: var(--bs-secondary-color) !important;
            padding: 0 0.75rem !important;
            display: none;
            cursor: pointer;
            transition: color 0.2s ease !important;
        }

        .search-clear-btn:hover {
            color: #198754 !important;
        }

        .search-clear-btn.show {
            display: block !important;
        }

        /* ========================================
               2. SEARCH RESULT COUNTER
               ======================================== */
        .search-counter {
            font-size: 0.8rem;
            color: var(--bs-secondary-color);
            margin-left: 0.5rem;
            display: none;
        }

        .search-counter.show {
            display: inline-block;
        }

        /* ========================================
               3. DATATABLES CUSTOM STYLING
               ======================================== */
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_paginate {
            display: none !important;
        }

        /* ========================================
               4. STATS CARDS STYLING
               ======================================== */
        .stats-card {
            border: 0;
            border-radius: 0.75rem;
            transition: transform 0.2s ease;
        }

        .stats-card:hover {
            transform: translateY(-2px);
        }

        .stats-card .card-body {
            padding: 1.25rem;
        }

        .stats-icon {
            width: 48px;
            height: 48px;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        /* ========================================
               5. TRIAL COUNTDOWN STYLING
               ======================================== */
        .trial-countdown {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            display: inline-block;
        }

        .trial-countdown.urgent {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }

        .trial-countdown.warning {
            background-color: rgba(255, 193, 7, 0.1);
            color: #ffc107;
        }

        .trial-countdown.safe {
            background-color: rgba(25, 135, 84, 0.1);
            color: #198754;
        }

        /* ========================================
               6. USAGE BAR STYLING
               ======================================== */
        .usage-info {
            font-size: 0.75rem;
            margin-bottom: 0.25rem;
        }

        .usage-info .label {
            color: var(--bs-secondary-color);
        }

        .usage-info .value {
            font-weight: 600;
        }

        /* ========================================
               7. ACTION BUTTONS
               ======================================== */
        .action-btn-group .btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }
    </style>
@endpush

@section('content')
    <!-- Page Title & Breadcrumb -->
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4 class="page-title">All Companies / Tenants</h4>
        </div>
        <div class="col-sm-6 text-sm-end">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Companies</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- ✅ Stats Cards -->
    <div class="row mb-3">
        <div class="col-md-3 col-sm-6 mb-2">
            <div class="card stats-card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50 mb-1" style="font-size: 0.8rem;">Total Companies</h6>
                            <h2 class="mb-0 fw-bold">{{ $stats['total'] }}</h2>
                        </div>
                        <div class="stats-icon bg-white bg-opacity-25">
                            <i class="ti ti-building-store"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-2">
            <div class="card stats-card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50 mb-1" style="font-size: 0.8rem;">Active</h6>
                            <h2 class="mb-0 fw-bold">{{ $stats['active'] }}</h2>
                        </div>
                        <div class="stats-icon bg-white bg-opacity-25">
                            <i class="ti ti-check-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-2">
            <div class="card stats-card bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50 mb-1" style="font-size: 0.8rem;">On Trial</h6>
                            <h2 class="mb-0 fw-bold">{{ $stats['trial'] }}</h2>
                        </div>
                        <div class="stats-icon bg-white bg-opacity-25">
                            <i class="ti ti-clock"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-2">
            <div class="card stats-card bg-danger text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50 mb-1" style="font-size: 0.8rem;">Suspended</h6>
                            <h2 class="mb-0 fw-bold">{{ $stats['suspended'] }}</h2>
                        </div>
                        <div class="stats-icon bg-white bg-opacity-25">
                            <i class="ti ti-alert-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Button & Search Filter (Database Search) -->
    <div class="row mb-3">
        <div class="col-sm-6 d-flex align-items-center">
            <form method="GET" action="{{ route('superadmin.companies.index') }}" class="d-flex align-items-center w-100">
                <div class="company-search-wrapper flex-grow-1">
                    <div class="input-group">
                        <span class="input-group-text"><i class="ti ti-search"></i></span>
                        <input type="text" name="search" id="companySearch" class="form-control"
                            value="{{ request('search') }}"
                            placeholder="Search by name, email, status..." autocomplete="off">
                        
                        @if(request('search'))
                            <a href="{{ route('superadmin.companies.index') }}" class="search-clear-btn show d-flex align-items-center justify-content-center text-decoration-none" title="Clear search">
                                <i class="ti ti-x"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </form>
            
            {{-- ✅ Fixed: Using count() instead of total() for Collection --}}
            @if(request('search') && $companies->count() > 0)
                <span class="search-counter show ms-2">
                    ({{ $companies->count() }} found)
                </span>
            @endif
        </div>
        <div class="col-sm-6 text-sm-end">
            <a href="{{ route('superadmin.companies.create') }}" class="btn btn-success">
                <i class="ti ti-plus me-1"></i> Add New Company
            </a>
        </div>
    </div>

    <!-- Companies Table -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-centered w-100 dt-responsive" id="companies-table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Company Info</th>
                            <th>Contact</th>
                            <th>Subscription</th>
                            <th>Usage</th>
                            <th>Trial Status</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($companies as $company)
                            <tr>
                                {{-- ✅ Fixed: Simple iteration for Collection --}}
                                <td>{{ $loop->iteration }}</td>

                                <!-- Company Info -->
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if ($company->logo)
                                            <img src="{{ asset('storage/' . $company->logo) }}" class="me-2 rounded-circle" width="40" height="40" alt="{{ $company->name }}">
                                        @else
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($company->name) }}&background=random&color=fff" class="me-2 rounded-circle" width="40" height="40" alt="{{ $company->name }}">
                                        @endif
                                        <div>
                                            <span class="fw-semibold d-block">{{ $company->name }}</span>
                                            @if ($company->subdomain)
                                                <small class="text-muted">
                                                    <i class="ti ti-world"></i> {{ $company->subdomain }}.yourdomain.com
                                                </small>
                                            @else
                                                <small class="text-muted">No subdomain</small>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                <!-- Contact Info -->
                                <td>
                                    <div>
                                        <i class="ti ti-mail text-muted"></i>
                                        <span class="d-block">{{ $company->email }}</span>
                                    </div>
                                    @if ($company->phone)
                                        <div class="mt-1">
                                            <i class="ti ti-phone text-muted"></i>
                                            <small>{{ $company->phone }}</small>
                                        </div>
                                    @endif
                                    @if ($company->contact_person)
                                        <div class="mt-1">
                                            <i class="ti ti-user text-muted"></i>
                                            <small>{{ $company->contact_person }}</small>
                                        </div>
                                    @endif
                                </td>

                                <!-- Subscription Plan -->
                                <td>
                                    @if ($company->plan)
                                        <div>
                                            <span class="badge bg-info-subtle text-info">
                                                {{ $company->plan->name }}
                                            </span>
                                        </div>
                                        <div class="mt-1">
                                            @if ($company->plan->price > 0)
                                                <small class="text-muted">
                                                    ৳{{ number_format($company->plan->price, 2) }}/mo
                                                </small>
                                            @else
                                                <small class="text-success">Free</small>
                                            @endif
                                        </div>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary">No Plan</span>
                                    @endif
                                </td>

                                <!-- Usage (Users & Branches) -->
                                <td>
                                    <div class="usage-info">
                                        <span class="label">Users:</span>
                                        <span class="value">
                                            {{ $company->users_count ?? 0 }}/{{ $company->plan->user_limit ?? '∞' }}
                                        </span>
                                    </div>
                                    <div class="usage-info">
                                        <span class="label">Branches:</span>
                                        <span class="value">
                                            {{ $company->branches_count ?? 0 }}/{{ $company->plan->branch_limit ?? '∞' }}
                                        </span>
                                    </div>
                                </td>

                                <!-- Trial Status -->
                                <td>
                                    @if ($company->trial_ends_at)
                                        @php
                                            $daysLeft = now()->diffInDays($company->trial_ends_at, false);
                                        @endphp

                                        @if ($daysLeft > 7)
                                            <span class="trial-countdown safe">
                                                <i class="ti ti-clock"></i> {{ $daysLeft }} days left
                                            </span>
                                        @elseif($daysLeft > 0)
                                            <span class="trial-countdown warning">
                                                <i class="ti ti-alert-triangle"></i> {{ $daysLeft }} days left
                                            </span>
                                        @else
                                            <span class="trial-countdown urgent">
                                                <i class="ti ti-x"></i> Expired
                                            </span>
                                        @endif

                                        <div class="mt-1">
                                            <small class="text-muted">
                                                {{ \Carbon\Carbon::parse($company->trial_ends_at)->format('d M Y') }}
                                            </small>
                                        </div>
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>

                                <!-- Status -->
                                <td>
                                    @if ($company->status == 'active')
                                        <span class="badge bg-success-subtle text-success">
                                            <i class="ti ti-check"></i> Active
                                        </span>
                                    @elseif($company->status == 'trial')
                                        <span class="badge bg-warning-subtle text-warning">
                                            <i class="ti ti-clock"></i> Trial
                                        </span>
                                    @elseif($company->status == 'suspended')
                                        <span class="badge bg-danger-subtle text-danger">
                                            <i class="ti ti-alert-triangle"></i> Suspended
                                        </span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary">
                                            {{ ucfirst($company->status) }}
                                        </span>
                                    @endif

                                    <div class="mt-1">
                                        <small class="text-muted">
                                            Joined: {{ $company->created_at->format('d M Y') }}
                                        </small>
                                    </div>
                                </td>

                                <!-- Actions -->
                                <td class="text-center">
                                    <div class="btn-group action-btn-group" role="group">
                                        <!-- View -->
                                        <a href="{{ route('superadmin.companies.show', $company->id) }}" class="btn btn-sm btn-primary" title="View Details" data-bs-toggle="tooltip">
                                            <i class="ti ti-eye"></i>
                                        </a>

                                        <!-- Edit -->
                                        <a href="{{ route('superadmin.companies.edit', $company->id) }}" class="btn btn-sm btn-warning" title="Edit" data-bs-toggle="tooltip">
                                            <i class="ti ti-edit"></i>
                                        </a>

                                        <!-- Impersonate -->
                                        @if ($company->owner)
                                            <a href="{{ route('superadmin.companies.impersonate', $company->id) }}" class="btn btn-sm btn-info" title="Login as {{ $company->name }}" data-bs-toggle="tooltip">
                                                <i class="ti ti-login"></i>
                                            </a>
                                        @endif

                                        <!-- Delete -->
                                        <form action="{{ route('superadmin.companies.destroy', $company->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this company? All data will be lost!');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete" data-bs-toggle="tooltip">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-5">
                                    <i class="ti ti-building-store d-block mb-3" style="font-size: 3rem; opacity: 0.5;"></i>
                                    <h5 class="fw-semibold text-body">No Companies Found</h5>
                                    <p class="mb-2 small text-body-secondary">
                                        @if(request('search'))
                                            No companies found matching "<strong>{{ request('search') }}</strong>".
                                        @else
                                            You haven't created any companies yet.
                                        @endif
                                    </p>
                                    @if(!request('search'))
                                        <a href="{{ route('superadmin.companies.create') }}" class="btn btn-sm btn-success mt-2">
                                            <i class="ti ti-plus me-1"></i> Add Your First Company
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- ✅ Fixed: Safe check for pagination links --}}
            @if(method_exists($companies, 'hasPages') && $companies->hasPages())
                <div class="mt-3 d-flex justify-content-center">
                    {{ $companies->appends(request()->query())->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize Bootstrap Tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });

            // Initialize DataTables (Only for Sorting & Responsive features)
            const table = $('#companies-table').DataTable({
                order: [[0, 'asc']],
                columnDefs: [
                    { orderable: false, className: 'dtr-control', targets: [0] },
                    { orderable: true,  targets: [1, 2, 3, 4, 5, 6] },
                    { orderable: false, targets: [7] }
                ],
                responsive: {
                    details: {
                        type: 'inline',
                        target: 'td.dtr-control'
                    }
                },
                paging: false,       // Disabled: Using database data
                searching: false,    // Disabled: Using database search via GET form
                info: false,
                lengthChange: false,
                autoWidth: false
            });

            const $searchInput = $('#companySearch');

            // Keyboard shortcuts for search
            $(document).on('keydown', function(e) {
                if (e.key === '/' && !$(e.target).is('input, textarea')) {
                    e.preventDefault();
                    $searchInput.focus();
                }
                if (e.key === 'Escape' && $searchInput.is(':focus')) {
                    if ($searchInput.val() !== '') {
                        $searchInput.val('');
                        $searchInput.closest('form').submit();
                    } else {
                        $searchInput.blur();
                    }
                }
            });
        });
    </script>
@endpush