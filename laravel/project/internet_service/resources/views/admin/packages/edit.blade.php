@extends('layouts.admin_master')

@section('title', 'Edit Package')

@section('content')
    <div class="px-3 py-4 container-fluid px-lg-4">

        {{-- ===== Page Heading ===== --}}
        <div class="gap-3 mb-4 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
            <div class="gap-3 d-flex align-items-center">
                <div class="p-3 bg-primary bg-opacity-10 rounded-3 page-heading-icon">
                    <i class="bi bi-pencil-square text-primary fs-3"></i>
                </div>
                <div>
                    <p class="mb-1 text-uppercase small fw-semibold text-body-secondary" style="letter-spacing: 1px;">Manage</p>
                    <h1 class="mb-1 h3 fw-bold text-body">Edit Package</h1>
                    <p class="mb-0 text-body-secondary small">Update details for "{{ $package->name }}".</p>
                </div>
            </div>
            <div class="gap-2 d-flex">
                <a href="{{ route('admin.packages.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Back to List
                </a>
            </div>
        </div>

        {{-- ===== Edit Package Form Card ===== --}}
        <div class="border-0 shadow-sm card">
            <div class="p-4 bg-body-tertiary border-bottom card-header">
                <h5 class="mb-0 fw-bold text-body">Package Details</h5>
            </div>

            <form action="{{ route('admin.packages.update', $package->package_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="p-4 card-body">
                    {{-- ✅ Shared form fields (kept in sync with create.blade.php and the modals on index.blade.php) --}}
                    @include('admin.packages._form', ['package' => $package])
                </div>

                <div class="p-4 border-top card-footer d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.packages.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-1"></i> Update Package
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection