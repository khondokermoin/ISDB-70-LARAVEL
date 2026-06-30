@extends('layouts.admin_master')

@push('styles')
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
           2. TABLE ROW ANIMATION
           ======================================== */
        #packagesTable tbody tr {
            transition: opacity 0.2s ease, background-color 0.2s ease;
        }

        #packagesTable tbody tr.filtered-out {
            display: none;
        }

        /* ========================================
           3. NO RESULTS MESSAGE
           ======================================== */
        .no-results-row {
            display: none;
        }

        .no-results-row.show {
            display: table-row !important;
        }

        /* ========================================
           4. SEARCH RESULT COUNTER
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
           5. ICON FIXES FOR DARK MODE
           ======================================== */
        .table tbody .text-body-secondary {
            color: var(--bs-secondary-color) !important;
        }

        .table thead .text-body-secondary {
            color: var(--bs-secondary-color) !important;
        }

        /* Empty State Icon Fix */
        .empty-state-icon {
            color: var(--bs-secondary-color) !important;
            opacity: 0.4;
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
                <a href="{{ route('admin.packages.create') }}" class="shadow-sm btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i> Add New Package
                </a>
            </div>
        </div>

        {{-- ===== Packages Table Card ===== --}}
        <div class="border-0 shadow-sm card">
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
                                   placeholder="Search by ID, name, type, speed, price..."
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
                    <table id="packagesTable" class="table mb-0 align-middle table-hover">
                        <thead class="bg-body-tertiary text-body-secondary small text-uppercase">
                            <tr>
                                <th class="py-3 ps-4" style="width: 50px;">#ID</th>
                                <th class="py-3">Package Name</th>
                                <th class="py-3">Type</th>
                                <th class="py-3">Speed</th>
                                <th class="py-3">Price (BDT)</th>
                                <th class="py-3">Status</th>
                                <th class="py-3 text-end pe-4" style="width: 150px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                            @forelse($packages as $package)
                                <tr class="package-row"
                                    data-search="{{ strtolower($package->package_id . ' ' . $package->name . ' ' . $package->type . ' ' . $package->speed_mbps . ' ' . $package->price . ' ' . $package->status . ' ' . ($package->features ?? '')) }}">
                                    <td class="ps-4 fw-semibold text-body-secondary">{{ $package->package_id }}</td>
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
                                                <i class="bi bi-house-door me-1"></i>Home
                                            </span>
                                        @else
                                            <span class="px-3 py-2 border badge bg-secondary bg-opacity-10 text-secondary border-secondary rounded-pill">
                                                <i class="bi bi-building me-1"></i>Corporate
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="fw-semibold text-body">
                                            <i class="bi bi-speedometer2 text-body-secondary me-1"></i>
                                            {{ $package->speed_mbps == 0 ? 'Custom' : $package->speed_mbps . ' Mbps' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-primary">
                                            <i class="bi bi-currency-exchange text-body-secondary me-1"></i>
                                            {{ $package->price == 0 ? 'Negotiable' : '৳ ' . number_format($package->price) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($package->status == 'active')
                                            <span class="px-3 py-2 badge bg-success bg-opacity-10 text-success rounded-pill">
                                                <i class="bi bi-circle-fill small me-1" style="font-size: 7px;"></i> Active
                                            </span>
                                        @else
                                            <span class="px-3 py-2 badge bg-danger bg-opacity-10 text-danger rounded-pill">
                                                <i class="bi bi-circle-fill small me-1" style="font-size: 7px;"></i> Inactive
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.packages.edit', $package->package_id) }}"
                                               class="btn btn-sm btn-outline-secondary"
                                               title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('admin.packages.destroy', $package->package_id) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this package?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-5 text-center">
                                        <div class="d-flex flex-column align-items-center justify-content-center">
                                            <i class="mb-3 bi bi-box-seam empty-state-icon" style="font-size: 3rem;"></i>
                                            <h5 class="fw-semibold text-body">No Packages Found</h5>
                                            <p class="small text-body-secondary">You haven't created any internet packages yet.</p>
                                            <a href="{{ route('admin.packages.create') }}" class="mt-2 btn btn-sm btn-primary">
                                                <i class="bi bi-plus-circle me-1"></i> Add Your First Package
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination Links --}}
                @if(method_exists($packages, 'links'))
                    <div class="px-4 py-3 border-top">
                        {{ $packages->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- ✅ jQuery CDN (যদি admin_master এ না থাকে) --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        $(document).ready(function() {
            const $searchInput = $('#packageSearch');
            const $clearBtn = $('#clearSearch');
            const $rows = $('.package-row');
            const $counter = $('#searchCounter');
            const totalRows = $rows.length;

            // ✅ Real-time Filter Function
            $searchInput.on('keyup', function() {
                const searchValue = $(this).val().toLowerCase().trim();
                let visibleCount = 0;

                // Show/hide clear button
                if (searchValue.length > 0) {
                    $clearBtn.addClass('show');
                } else {
                    $clearBtn.removeClass('show');
                    $counter.removeClass('show');
                }

                // Filter rows
                $rows.each(function() {
                    const searchText = $(this).data('search');
                    if (searchText.indexOf(searchValue) > -1) {
                        $(this).removeClass('filtered-out');
                        visibleCount++;
                    } else {
                        $(this).addClass('filtered-out');
                    }
                });

                // Update counter
                if (searchValue.length > 0) {
                    $counter.text(`(${visibleCount} of ${totalRows} found)`).addClass('show');
                }
            });

            // ✅ Clear Search Button
            $clearBtn.on('click', function() {
                $searchInput.val('').trigger('keyup').focus();
            });

            // ✅ Keyboard Shortcut: Press '/' to focus search
            $(document).on('keydown', function(e) {
                if (e.key === '/' && !$(e.target).is('input, textarea')) {
                    e.preventDefault();
                    $searchInput.focus();
                }
                // Press 'Escape' to clear search
                if (e.key === 'Escape' && $searchInput.is(':focus')) {
                    $searchInput.val('').trigger('keyup');
                    $searchInput.blur();
                }
            });
        });
    </script>
@endpush
