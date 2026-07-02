@extends('layouts.admin_master')

@push('styles')
    {{-- ✅ DataTables CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

    {{-- ✅ Custom Search & Filter Styles --}}
    <style>
        /* ========================================
           1. SEARCH BOX - FIXED STYLING
           ======================================== */
        .package-search-wrapper {
            position: relative;
            max-width: 300px;
            width: 100%;
        }

        .package-search-wrapper .input-group {
            background-color: var(--bs-body-bg) !important;
            border: 1px solid var(--bs-border-color) !important;
            border-radius: 0.5rem !important;
            overflow: hidden;
            transition: all 0.25s ease !important;
        }

        .package-search-wrapper .input-group:focus-within {
            border-color: rgba(220, 53, 69, 0.5) !important;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.15) !important;
        }

        .package-search-wrapper .input-group-text {
            background-color: transparent !important;
            border: 0 !important;
            color: var(--bs-secondary-color) !important;
            transition: color 0.25s ease !important;
        }

        .package-search-wrapper .input-group:focus-within .input-group-text {
            color: #dc3545 !important;
        }

        .package-search-wrapper .form-control {
            background-color: transparent !important;
            border: 0 !important;
            color: var(--bs-body-color) !important;
            padding-left: 0 !important;
        }

        .package-search-wrapper .form-control::placeholder {
            color: var(--bs-secondary-color) !important;
            opacity: 0.7;
        }

        .package-search-wrapper .form-control:focus {
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
            color: #dc3545 !important;
        }

        .search-clear-btn.show {
            display: block !important;
        }

        /* ========================================
           2. TABLE ROW HOVER - GLOBAL NEUTRALIZATION
           ======================================== */
        #packagesTable tbody tr:hover,
        #packagesTable tbody tr:hover > td,
        #packagesTable tbody tr:hover > th,
        #packagesTable.table tbody tr:hover,
        #packagesTable.table-hover tbody tr:hover {
            background-color: transparent !important;
            --bs-table-hover-bg: transparent !important;
            --bs-table-hover-color: inherit !important;
            --bs-table-accent-bg: transparent !important;
            box-shadow: none !important;
        }

        #packagesTable tbody tr:hover td,
        #packagesTable tbody tr:hover td *,
        #packagesTable tbody tr:hover th {
            color: inherit !important;
        }

        /* ========================================
           2a. DISABLE "CARD LIFTS UP ON HOVER" EFFECT
           ======================================== */
        #packagesCard.card,
        #packagesCard.card:hover,
        #packagesCard.card:focus-within {
            transform: none !important;
        }

        #packagesCard.card:hover {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        }

        /* ========================================
           2b. STOP ICONS / TEXT FROM SCALING UP ON HOVER
           ======================================== */
        #packagesTable .btn-group .btn,
        #packagesTable .btn-group .btn:hover,
        #packagesTable .btn-group .btn:focus,
        #packagesTable .btn-group .btn i,
        #packagesTable .btn-group .btn:hover i {
            transform: none !important;
            scale: 1 !important;
            transition: background-color 0.15s ease, color 0.15s ease, border-color 0.15s ease !important;
        }

        /* ========================================
           2c. MAKE EDIT + DELETE LOOK LIKE ONE MERGED GROUP
           ======================================== */
        #packagesTable .btn-group {
            display: inline-flex;
        }

        #packagesTable .btn-group form {
            display: contents;
        }

        #packagesTable .btn-group .btn {
            border-radius: 0;
            margin-left: -1px;
        }

        #packagesTable .btn-group .btn:first-child {
            border-top-left-radius: 0.375rem;
            border-bottom-left-radius: 0.375rem;
            margin-left: 0;
        }

        #packagesTable .btn-group .btn:last-child,
        #packagesTable .btn-group form:last-child .btn {
            border-top-right-radius: 0.375rem;
            border-bottom-right-radius: 0.375rem;
        }

        #packagesTable .btn-group .btn:hover,
        #packagesTable .btn-group .btn:focus {
            z-index: 1;
            position: relative;
        }

        /* ========================================
           2d. TABLE HEADER - BIGGER & BOLD TEXT
           ======================================== */
        #packagesTable thead th {
            font-size: 0.85rem !important;
            font-weight: 700 !important;
            letter-spacing: 0.4px;
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

        /* Sorting Icons Customization */
        table.dataTable thead th.sorting,
        table.dataTable thead th.sorting_asc,
        table.dataTable thead th.sorting_desc {
            position: relative;
            padding-right: 1.75rem !important;
        }

        table.dataTable thead th.sorting::before,
        table.dataTable thead th.sorting::after,
        table.dataTable thead th.sorting_asc::before,
        table.dataTable thead th.sorting_asc::after,
        table.dataTable thead th.sorting_desc::before,
        table.dataTable thead th.sorting_desc::after {
            font-family: "bootstrap-icons" !important;
            font-size: 0.75rem;
            opacity: 0.4;
            transition: opacity 0.2s ease, color 0.2s ease;
        }

        table.dataTable thead th.sorting::before {
            content: "\F282";
            bottom: 55%;
        }

        table.dataTable thead th.sorting::after {
            content: "\F229";
            top: 55%;
        }

        table.dataTable thead th.sorting_asc::before,
        table.dataTable thead th.sorting_desc::after {
            opacity: 1;
            color: #dc3545 !important;
        }

        table.dataTable thead th:hover.sorting::before,
        table.dataTable thead th:hover.sorting::after {
            opacity: 0.7;
        }

        table.dataTable thead th.sorting::before,
        table.dataTable thead th.sorting::after,
        table.dataTable thead th.sorting_asc::before,
        table.dataTable thead th.sorting_asc::after,
        table.dataTable thead th.sorting_desc::before,
        table.dataTable thead th.sorting_desc::after {
            background-image: none !important;
        }

        table.dataTable thead th.sorting,
        table.dataTable thead th.sorting_asc,
        table.dataTable thead th.sorting_desc {
            cursor: pointer;
        }

        /* ========================================
           4. RESPONSIVE EXTENSION STYLING
           ======================================== */
        table.dataTable.dtr-inline.collapsed > tbody > tr > td.dtr-control:before,
        table.dataTable.dtr-inline.collapsed > tbody > tr > th.dtr-control:before {
            background-color: #0d6efd !important;
            border: 2px solid #fff !important;
            box-shadow: 0 0 3px rgba(0,0,0,0.2);
            top: 50%;
            left: 0.25rem;
            margin-top: -9px;
            font-size: 0.9rem;
            line-height: 16px;
            text-align: center;
        }

        table.dataTable > tbody > tr.child {
            background-color: var(--bs-body-bg) !important;
            padding: 0.75rem 0;
        }

        table.dataTable > tbody > tr.child span.dtr-title {
            font-weight: 600;
            color: var(--bs-body-color);
            min-width: 120px;
            display: inline-block;
        }

        table.dataTable > tbody > tr.child span.dtr-data {
            color: var(--bs-secondary-color);
        }

        /* ========================================
           5. EMPTY STATE STYLING
           ======================================== */
        .dataTables_empty {
            padding: 3rem 1rem !important;
            text-align: center;
        }

        /* ========================================
           6. SEARCH RESULT COUNTER
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
           7. RESPONSIVE TWEAKS
           ======================================== */
        @media (max-width: 768px) {
            .package-search-wrapper {
                max-width: 100%;
            }

            #packagesTable th,
            #packagesTable td {
                font-size: 0.875rem;
            }

            .card-header {
                padding: 1rem !important;
            }

            .btn-group .btn {
                padding: 0.25rem 0.5rem;
            }
        }

        /* ========================================
           8. DARK MODE - PERMANENT HOVER FIX
           (এটা চিরকালের জন্য hover সমস্যা মিটাবে)
           ======================================== */
        
        /* Dark mode hover background & base text */
        [data-bs-theme="dark"] #packagesTable tbody tr:hover,
        [data-bs-theme="dark"] #packagesTable tbody tr:hover > td,
        [data-bs-theme="dark"] #packagesTable tbody tr:hover > th,
        [data-bs-theme="dark"] #packagesTable.table tbody tr:hover,
        [data-bs-theme="dark"] #packagesTable.table-hover tbody tr:hover {
            background-color: #2b3035 !important;
            --bs-table-hover-bg: #2b3035 !important;
            --bs-table-hover-color: #e9ecef !important;
            --bs-table-accent-bg: #2b3035 !important;
            color: #e9ecef !important;
            box-shadow: none !important;
        }

        /* Force ALL text inside hovered rows to be visible */
        [data-bs-theme="dark"] #packagesTable tbody tr:hover td,
        [data-bs-theme="dark"] #packagesTable tbody tr:hover td *,
        [data-bs-theme="dark"] #packagesTable tbody tr:hover th {
            color: #e9ecef !important;
            -webkit-text-fill-color: #e9ecef !important;
        }

        /* Preserve specific Bootstrap text colors on hover */
        [data-bs-theme="dark"] #packagesTable tbody tr:hover .text-primary,
        [data-bs-theme="dark"] #packagesTable tbody tr:hover .text-primary * {
            color: #6ea8fe !important;
            -webkit-text-fill-color: #6ea8fe !important;
        }

        [data-bs-theme="dark"] #packagesTable tbody tr:hover .text-success,
        [data-bs-theme="dark"] #packagesTable tbody tr:hover .text-success * {
            color: #75b798 !important;
            -webkit-text-fill-color: #75b798 !important;
        }

        [data-bs-theme="dark"] #packagesTable tbody tr:hover .text-danger,
        [data-bs-theme="dark"] #packagesTable tbody tr:hover .text-danger * {
            color: #ea868f !important;
            -webkit-text-fill-color: #ea868f !important;
        }

        [data-bs-theme="dark"] #packagesTable tbody tr:hover .text-info,
        [data-bs-theme="dark"] #packagesTable tbody tr:hover .text-info * {
            color: #6edff6 !important;
            -webkit-text-fill-color: #6edff6 !important;
        }

        [data-bs-theme="dark"] #packagesTable tbody tr:hover .text-secondary,
        [data-bs-theme="dark"] #packagesTable tbody tr:hover .text-body-secondary,
        [data-bs-theme="dark"] #packagesTable tbody tr:hover .text-body-secondary * {
            color: #adb5bd !important;
            -webkit-text-fill-color: #adb5bd !important;
        }

        [data-bs-theme="dark"] #packagesTable tbody tr:hover .text-body,
        [data-bs-theme="dark"] #packagesTable tbody tr:hover .text-body * {
            color: #e9ecef !important;
            -webkit-text-fill-color: #e9ecef !important;
        }

        /* Badge colors preserved on hover in dark mode */
        [data-bs-theme="dark"] #packagesTable tbody tr:hover .badge.bg-info {
            background-color: rgba(13, 202, 240, 0.2) !important;
            color: #3dd5f3 !important;
            border-color: rgba(13, 202, 240, 0.3) !important;
        }

        [data-bs-theme="dark"] #packagesTable tbody tr:hover .badge.bg-secondary {
            background-color: rgba(108, 117, 125, 0.3) !important;
            color: #adb5bd !important;
            border-color: rgba(108, 117, 125, 0.4) !important;
        }

        [data-bs-theme="dark"] #packagesTable tbody tr:hover .badge.bg-success {
            background-color: rgba(25, 135, 84, 0.25) !important;
            color: #4dd4ac !important;
            border-color: rgba(25, 135, 84, 0.3) !important;
        }

        [data-bs-theme="dark"] #packagesTable tbody tr:hover .badge.bg-danger {
            background-color: rgba(220, 53, 69, 0.25) !important;
            color: #ea868f !important;
            border-color: rgba(220, 53, 69, 0.3) !important;
        }

        /* ========================================
           9. OTHER DARK MODE FIXES
           ======================================== */
        [data-bs-theme="dark"] .btn-outline-secondary {
            --bs-btn-color: #adb5bd !important;
            --bs-btn-border-color: #6c757d !important;
            --bs-btn-hover-color: #fff !important;
            --bs-btn-hover-bg: #495057 !important;
            --bs-btn-hover-border-color: #495057 !important;
            --bs-btn-active-color: #fff !important;
            --bs-btn-active-bg: #343a40 !important;
            --bs-btn-active-border-color: #343a40 !important;
        }

        [data-bs-theme="dark"] .btn-outline-secondary i,
        [data-bs-theme="dark"] .btn-outline-secondary {
            color: var(--bs-btn-color, #adb5bd) !important;
        }

        [data-bs-theme="dark"] .badge.bg-info.bg-opacity-10 {
            background-color: rgba(13, 202, 240, 0.2) !important;
            color: #3dd5f3 !important;
            border-color: rgba(13, 202, 240, 0.3) !important;
        }

        [data-bs-theme="dark"] .badge.bg-secondary.bg-opacity-10 {
            background-color: rgba(108, 117, 125, 0.3) !important;
            color: #adb5bd !important;
            border-color: rgba(108, 117, 125, 0.4) !important;
        }

        [data-bs-theme="dark"] .badge.bg-success.bg-opacity-10 {
            background-color: rgba(25, 135, 84, 0.25) !important;
            color: #4dd4ac !important;
            border-color: rgba(25, 135, 84, 0.3) !important;
        }

        [data-bs-theme="dark"] .badge.bg-danger.bg-opacity-10 {
            background-color: rgba(220, 53, 69, 0.25) !important;
            color: #ea868f !important;
            border-color: rgba(220, 53, 69, 0.3) !important;
        }

        [data-bs-theme="dark"] .text-body-secondary {
            color: #ced4da !important;
        }

        [data-bs-theme="dark"] .text-body,
        [data-bs-theme="dark"] #packagesTable td,
        [data-bs-theme="dark"] #packagesTable thead th {
            color: #f1f3f5 !important;
        }

        [data-bs-theme="dark"] #packagesTable .text-body-secondary,
        [data-bs-theme="dark"] #packagesTable td .small {
            color: #ced4da !important;
        }

        [data-bs-theme="dark"] .package-search-wrapper .form-control::placeholder {
            color: #adb5bd !important;
            opacity: 0.85;
        }

        [data-bs-theme="dark"] .package-search-wrapper .input-group-text {
            color: #ced4da !important;
        }

        [data-bs-theme="dark"] .empty-state-icon {
            opacity: 0.6 !important;
            color: #adb5bd !important;
        }

        [data-bs-theme="dark"] .bg-body-tertiary {
            background-color: rgba(33, 37, 41, 0.5) !important;
        }

        [data-bs-theme="dark"] .table {
            --bs-table-border-color: #373b3e !important;
        }

        [data-bs-theme="dark"] .search-counter {
            color: #adb5bd !important;
        }

        [data-bs-theme="dark"] .alert-success {
            background-color: rgba(25, 135, 84, 0.15) !important;
            border-color: rgba(25, 135, 84, 0.3) !important;
            color: #4dd4ac !important;
        }

        [data-bs-theme="dark"] .pagination .page-link {
            background-color: #2b3035 !important;
            border-color: #373b3e !important;
            color: #adb5bd !important;
        }

        [data-bs-theme="dark"] .pagination .page-link:hover {
            background-color: #343a40 !important;
            color: #fff !important;
        }

        [data-bs-theme="dark"] .pagination .page-item.active .page-link {
            background-color: #0d6efd !important;
            border-color: #0d6efd !important;
            color: #fff !important;
        }

        [data-bs-theme="dark"] .pagination .page-item.disabled .page-link {
            background-color: #212529 !important;
            border-color: #373b3e !important;
            color: #6c757d !important;
        }
    </style>
@endpush

@section('content')
    <div class="px-3 py-4 container-fluid px-lg-4">

        {{-- ===== Session Success Message ===== --}}
        @if(session('success'))
            <div class="border-0 shadow-sm alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- ===== Page Heading ===== --}}
        <div class="gap-3 mb-4 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
            <div class="gap-3 d-flex align-items-center">
                <div class="p-3 bg-primary bg-opacity-10 rounded-3 page-heading-icon">
                    <i class="bi bi-box-seam text-primary fs-3"></i>
                </div>
                <div>
                    <p class="mb-1 text-uppercase small fw-semibold text-body-secondary" style="letter-spacing: 1px;">Manage</p>
                    <h1 class="mb-1 h3 fw-bold text-body">Internet Packages</h1>
                    <p class="mb-0 text-body-secondary small">View, edit, or delete existing internet packages.</p>
                </div>
            </div>
            <div class="gap-2 d-flex">
                <button type="button" class="shadow-sm btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPackageModal">
                    <i class="bi bi-plus-circle me-1"></i> Add New Package
                </button>
            </div>
        </div>

        {{-- ===== Packages Table Card ===== --}}
        <div id="packagesCard" class="border-0 shadow-sm card">
            <div class="p-4 bg-body-tertiary border-bottom card-header">
                <div class="gap-3 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                    <h5 class="mb-0 fw-bold text-body">
                        All Packages List
                        <span id="searchCounter" class="search-counter"></span>
                    </h5>

                    {{-- ✅ Live Search Filter --}}
                    <div class="package-search-wrapper">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text"
                                   id="packageSearch"
                                   class="form-control"
                                   placeholder="Search by name, type, speed, price..."
                                   autocomplete="off">
                            <button type="button" id="clearSearch" class="search-clear-btn" title="Clear search">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-0 card-body">
                <div class="table-responsive">
                    <table id="packagesTable" class="table mb-0 align-middle dt-responsive nowrap" style="width:100%">
                        <thead class="bg-body-tertiary text-body-secondary text-uppercase fw-bold">
                            <tr>
                                <th class="py-3 ps-4" style="width: 50px;" data-priority="1">SN</th>
                                <th class="py-3" data-priority="2">Package Name</th>
                                <th class="py-3" data-priority="3">Type</th>
                                <th class="py-3" data-priority="4">Speed</th>
                                <th class="py-3" data-priority="5">Price (BDT)</th>
                                <th class="py-3" data-priority="6">Status</th>
                                <th class="py-3 text-end pe-4" style="width: 120px;" data-priority="7">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                            @forelse($packages as $package)
                                <tr>
                                    <td class="ps-4 fw-semibold text-body-secondary">{{ $loop->iteration }}</td>
                                    <td>
                                        <span class="fw-bold text-body">{{ $package->name }}</span>
                                        @if(!empty($package->features))
                                            <div class="small text-body-secondary text-truncate" style="max-width: 200px;" title="{{ $package->features }}">
                                                {{ $package->features }}
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($package->type == 'home')
                                            <span class="px-3 py-2 border badge bg-info bg-opacity-10 text-info border-info rounded-pill">
                                                Home
                                            </span>
                                        @else
                                            <span class="px-3 py-2 border badge bg-secondary bg-opacity-10 text-secondary border-secondary rounded-pill">
                                                Corporate
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="fw-semibold text-body">
                                            {{ $package->speed_mbps == 0 ? 'Custom' : $package->speed_mbps . ' Mbps' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-primary">
                                            {{ $package->price == 0 ? 'Negotiable' : '৳ ' . number_format($package->price) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($package->status == 'active')
                                            <span class="px-3 py-2 badge bg-success bg-opacity-10 text-success rounded-pill">
                                                Active
                                            </span>
                                        @else
                                            <span class="px-3 py-2 badge bg-danger bg-opacity-10 text-danger rounded-pill">
                                                Inactive
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="btn-group" role="group">
                                            <button type="button"
                                                    class="btn btn-sm btn-outline-secondary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editPackageModal{{ $package->package_id }}"
                                                    title="Edit">
                                                Edit
                                            </button>
                                            <form action="{{ route('admin.packages.destroy', $package->package_id) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this package?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                {{-- Empty state will be handled by DataTables zeroRecords --}}
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination Links --}}
                @if(method_exists($packages, 'links') && $packages->count() > 0)
                    <div class="px-4 py-3 border-top">
                        {{ $packages->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>

        {{-- ===== Add New Package Modal ===== --}}
        <div class="modal fade" id="addPackageModal" tabindex="-1" aria-labelledby="addPackageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="addPackageModalLabel">
                            <i class="bi bi-plus-circle text-primary me-2"></i>Add New Package
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.packages.store') }}" method="POST" id="createPackageForm">
                        @csrf
                        <div class="modal-body">
                            @include('admin.packages._form', ['package' => null])
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-1"></i> Save Package
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- ===== Edit Package Modals (one per row) ===== --}}
        @foreach($packages as $package)
            <div class="modal fade" id="editPackageModal{{ $package->package_id }}" tabindex="-1" aria-labelledby="editPackageModalLabel{{ $package->package_id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="editPackageModalLabel{{ $package->package_id }}">
                                <i class="bi bi-pencil-square text-primary me-2"></i>Edit Package — {{ $package->name }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.packages.update', $package->package_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="_edit_package_id" value="{{ $package->package_id }}">
                            <div class="modal-body">
                                @include('admin.packages._form', ['package' => $package])
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-1"></i> Update Package
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
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
            @if ($errors->any())
                @if (old('_edit_package_id'))
                    const editModalEl = document.getElementById('editPackageModal{{ old('_edit_package_id') }}');
                    if (editModalEl) {
                        new bootstrap.Modal(editModalEl).show();
                    }
                @else
                    const addPackageModal = new bootstrap.Modal(document.getElementById('addPackageModal'));
                    addPackageModal.show();
                @endif
            @endif

            const table = $('#packagesTable').DataTable({
                order: [[0, 'asc']],
                columnDefs: [
                    { orderable: false, targets: [0] },
                    { orderable: true,  targets: [1, 2, 3, 4, 5] },
                    { orderable: false, targets: [6] },
                    { className: 'dtr-control', orderable: false, targets: [0] }
                ],
                responsive: {
                    details: {
                        type: 'inline',
                        target: 'td.dtr-control',
                        display: $.fn.dataTable.Responsive.display.childRowImmediate,
                        renderer: function(api, rowIdx, columns) {
                            let data = $.map(columns, function(col, i) {
                                return col.hidden ?
                                    '<tr data-dt-row="'+col.rowIndex+'" data-dt-column="'+col.columnIndex+'">'+
                                        '<td class="dtr-title"><strong>' + col.title + ':</strong></td> '+
                                        '<td class="dtr-data">' + col.data + '</td>'+
                                    '</tr>' : '';
                            }).join('');
                            return data ? $('<table class="dtr-details w-100"/>').append(data) : false;
                        }
                    }
                },
                paging: false,
                searching: true,
                info: false,
                lengthChange: false,
                autoWidth: false,
                language: {
                    zeroRecords: `
                        <div class="py-5 d-flex flex-column align-items-center justify-content-center">
                            <i class="mb-3 bi bi-box-seam empty-state-icon" style="font-size: 3rem;"></i>
                            <h5 class="fw-semibold text-body">No Packages Found</h5>
                            <p class="mb-2 small text-body-secondary">You haven't created any internet packages yet.</p>
                            <button type="button" class="mt-2 btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addPackageModal">
                                <i class="bi bi-plus-circle me-1"></i> Add Your First Package
                            </button>
                        </div>
                    `,
                    emptyTable: `
                        <div class="py-5 d-flex flex-column align-items-center justify-content-center">
                            <i class="mb-3 bi bi-box-seam empty-state-icon" style="font-size: 3rem;"></i>
                            <h5 class="fw-semibold text-body">No Packages Found</h5>
                            <p class="mb-2 small text-body-secondary">You haven't created any internet packages yet.</p>
                            <button type="button" class="mt-2 btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addPackageModal">
                                <i class="bi bi-plus-circle me-1"></i> Add Your First Package
                            </button>
                        </div>
                    `
                }
            });

            const $searchInput = $('#packageSearch');
            const $clearBtn = $('#clearSearch');
            const $counter = $('#searchCounter');

            $searchInput.on('keyup', function() {
                const searchValue = $(this).val();
                table.search(searchValue).draw();

                if (searchValue.length > 0) {
                    $clearBtn.addClass('show');
                    const totalRows = table.rows().count();
                    const visibleRows = table.rows({ search: 'applied' }).count();
                    $counter.text(`(${visibleRows} of ${totalRows} found)`).addClass('show');
                } else {
                    $clearBtn.removeClass('show');
                    $counter.removeClass('show');
                }
            });

            $clearBtn.on('click', function() {
                $searchInput.val('').trigger('keyup').focus();
            });

            $(document).on('keydown', function(e) {
                if (e.key === '/' && !$(e.target).is('input, textarea')) {
                    e.preventDefault();
                    $searchInput.focus();
                }
                if (e.key === 'Escape' && $searchInput.is(':focus')) {
                    $searchInput.val('').trigger('keyup');
                    $searchInput.blur();
                }
            });

            $(window).on('resize', function() {
                table.responsive.rebuild();
                table.responsive.recalc();
            });
        });
    </script>
@endpush