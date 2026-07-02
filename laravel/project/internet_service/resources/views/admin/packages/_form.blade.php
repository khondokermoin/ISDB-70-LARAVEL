{{-- resources/views/admin/packages/_form.blade.php
     Reusable partial: ONLY the form fields (no <form> tag, no
     modal-body/card wrapper). Included by:
       - create.blade.php        (full standalone create page)
       - edit.blade.php          (full standalone edit page)
       - index.blade.php         (Add New Package modal)
       - index.blade.php         (per-row Edit Package modal)

     Pass an existing $package to pre-fill for editing, e.g.:
       @include('admin.packages._form', ['package' => $package])
     For "create" mode, pass null or omit it — just make sure the
     parent view always sets $package (even to null) before including,
     e.g.: @include('admin.packages._form', ['package' => $package ?? null])

     ⚠️ NOTE: your controller currently requires a `duration_days`
     field ("The duration days field is required."). That field was
     added below with a reasonable default of 30 — rename/adjust it
     if your column name or validation differs. --}}

@php($package = $package ?? null)

{{-- ✅ Validation Errors --}}
@if ($errors->any())
    <div class="mb-3 alert alert-danger">
        <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row g-3">

    {{-- Package Name --}}
    <div class="col-12">
        <label for="name{{ $package->package_id ?? '' }}" class="form-label fw-semibold">Package Name <span class="text-danger">*</span></label>
        <input type="text"
               name="name"
               id="name{{ $package->package_id ?? '' }}"
               class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name', $package->name ?? '') }}"
               placeholder="e.g. Home Basic 10 Mbps"
               required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Type --}}
    <div class="col-md-6">
        <label for="type{{ $package->package_id ?? '' }}" class="form-label fw-semibold">Type <span class="text-danger">*</span></label>
        <select name="type" id="type{{ $package->package_id ?? '' }}" class="form-select @error('type') is-invalid @enderror" required>
            <option value="" disabled {{ old('type', $package->type ?? '') ? '' : 'selected' }}>Select type</option>
            <option value="home" {{ old('type', $package->type ?? '') == 'home' ? 'selected' : '' }}>Home</option>
            <option value="corporate" {{ old('type', $package->type ?? '') == 'corporate' ? 'selected' : '' }}>Corporate</option>
        </select>
        @error('type')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Status --}}
    <div class="col-md-6">
        <label for="status{{ $package->package_id ?? '' }}" class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
        <select name="status" id="status{{ $package->package_id ?? '' }}" class="form-select @error('status') is-invalid @enderror" required>
            <option value="" disabled {{ old('status', $package->status ?? '') ? '' : 'selected' }}>Select status</option>
            <option value="active" {{ old('status', $package->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ old('status', $package->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
        @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Speed --}}
    <div class="col-md-6">
        <label for="speed_mbps{{ $package->package_id ?? '' }}" class="form-label fw-semibold">Speed (Mbps)</label>
        <input type="number"
               name="speed_mbps"
               id="speed_mbps{{ $package->package_id ?? '' }}"
               class="form-control @error('speed_mbps') is-invalid @enderror"
               value="{{ old('speed_mbps', $package->speed_mbps ?? '') }}"
               min="0"
               placeholder="e.g. 10 (0 = Custom)">
        <div class="mt-1 form-text">Enter 0 for "Custom" speed.</div>
        @error('speed_mbps')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Price --}}
    <div class="col-md-6">
        <label for="price{{ $package->package_id ?? '' }}" class="form-label fw-semibold">Price (BDT)</label>
        <input type="number"
               name="price"
               id="price{{ $package->package_id ?? '' }}"
               class="form-control @error('price') is-invalid @enderror"
               value="{{ old('price', $package->price ?? '') }}"
               min="0"
               placeholder="e.g. 1000 (0 = Negotiable)">
        <div class="mt-1 form-text">Enter 0 for "Negotiable" price.</div>
        @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Duration (Days) — required by the backend validation --}}
    <div class="col-md-6">
        <label for="duration_days{{ $package->package_id ?? '' }}" class="form-label fw-semibold">Duration (Days) <span class="text-danger">*</span></label>
        <input type="number"
               name="duration_days"
               id="duration_days{{ $package->package_id ?? '' }}"
               class="form-control @error('duration_days') is-invalid @enderror"
               value="{{ old('duration_days', $package->duration_days ?? '') }}"
               min="1"
               placeholder="e.g. 30"
               required>
        <div class="mt-1 form-text">How many days this package is valid for (e.g. 30 for monthly).</div>
        @error('duration_days')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Features --}}
    <div class="col-12">
        <label for="features{{ $package->package_id ?? '' }}" class="form-label fw-semibold">Features</label>
        <textarea name="features"
                  id="features{{ $package->package_id ?? '' }}"
                  rows="3"
                  class="form-control @error('features') is-invalid @enderror"
                  placeholder="e.g. Free installation, 24/7 support, Unlimited data">{{ old('features', $package->features ?? '') }}</textarea>
        @error('features')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

</div>