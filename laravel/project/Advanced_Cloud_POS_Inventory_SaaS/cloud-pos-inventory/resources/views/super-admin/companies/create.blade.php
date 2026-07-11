@extends('layouts.admin_master')

@section('title', 'Add Company')

@section('content')
    <!-- Page Title & Breadcrumb -->
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4 class="page-title">Add New Company</h4>
        </div>
        <div class="col-sm-6 text-sm-end">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('superadmin.companies.index') }}">Companies</a></li>
                    <li class="breadcrumb-item active">Add Company</li>
                </ol>
            </nav>
        </div>
    </div>

    <form action="{{ route('superadmin.companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-12">

                {{-- ==========================================
                    1. Basic Information
                ========================================== --}}
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Basic Information</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Company Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}"
                                    placeholder="Enter company name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="slug" class="form-label">Slug / URL Identifier</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="slug" name="slug" value="{{ old('slug') }}"
                                    placeholder="auto-generated-from-name">
                                <small class="text-muted">Leave empty to auto-generate from company name.</small>
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Company Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}"
                                    placeholder="Enter company email" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="contact_person" class="form-label">Contact Person Name</label>
                                <input type="text" class="form-control @error('contact_person') is-invalid @enderror"
                                    id="contact_person" name="contact_person" value="{{ old('contact_person') }}"
                                    placeholder="Enter contact person name">
                                @error('contact_person')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" value="{{ old('phone') }}"
                                    placeholder="Enter phone number">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="website" class="form-label">Website</label>
                                <input type="url" class="form-control @error('website') is-invalid @enderror"
                                    id="website" name="website" value="{{ old('website') }}"
                                    placeholder="https://example.com">
                                @error('website')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Assign Company Admin -->
                            <div class="col-md-6 mb-3">
                                <label for="user_id" class="form-label">Assign Company Admin <span class="text-danger">*</span></label>
                                <select class="form-select @error('user_id') is-invalid @enderror" id="user_id"
                                    name="user_id" required>
                                    <option value="">Select Admin User</option>
                                    @foreach ($users ?? [] as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }} ({{ $user->email }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ==========================================
                    2. SaaS & POS Settings
                ========================================== --}}
                <div class="card mt-3">
                    <div class="card-body">
                        <h4 class="header-title mb-3">SaaS & POS Settings</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="plan_id" class="form-label">Subscription Plan <span class="text-danger">*</span></label>
                                <select class="form-select @error('plan_id') is-invalid @enderror" id="plan_id"
                                    name="plan_id" required>
                                    <option value="">Select Plan</option>
                                    @forelse($plans ?? [] as $plan)
                                        <option value="{{ $plan->id }}" 
                                            data-price="{{ $plan->price }}"
                                            data-trial="{{ $plan->trial_days }}"
                                            data-users="{{ $plan->user_limit }}"
                                            data-branches="{{ $plan->branch_limit }}"
                                            {{ old('plan_id') == $plan->id ? 'selected' : '' }}>
                                            {{ $plan->name }} - ${{ number_format($plan->price, 2) }}/month
                                        </option>
                                    @empty
                                        <option value="" disabled>No plans available. Please create plans first.</option>
                                    @endforelse
                                </select>
                                @error('plan_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                
                                {{-- Plan Details Display --}}
                                <div id="plan-details" class="mt-2 p-2 bg-light rounded small" style="display: none;">
                                    <strong>Plan Details:</strong>
                                    <div id="plan-info"></div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status"
                                    name="status" required>
                                    <option value="trial" {{ old('status') == 'trial' ? 'selected' : '' }}>Trial</option>
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    <option value="suspended" {{ old('status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="currency" class="form-label">Default Currency</label>
                                <select class="form-select @error('currency') is-invalid @enderror" id="currency"
                                    name="currency">
                                    <option value="BDT" {{ old('currency') == 'BDT' ? 'selected' : '' }}>BDT - Bangladeshi Taka</option>
                                    <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>USD - US Dollar</option>
                                    <option value="INR" {{ old('currency') == 'INR' ? 'selected' : '' }}>INR - Indian Rupee</option>
                                    <option value="EUR" {{ old('currency') == 'EUR' ? 'selected' : '' }}>EUR - Euro</option>
                                </select>
                                @error('currency')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="timezone" class="form-label">Timezone</label>
                                <select class="form-select @error('timezone') is-invalid @enderror" id="timezone"
                                    name="timezone">
                                    <option value="Asia/Dhaka" {{ old('timezone') == 'Asia/Dhaka' ? 'selected' : '' }}>Asia/Dhaka (GMT+6)</option>
                                    <option value="Asia/Kolkata" {{ old('timezone') == 'Asia/Kolkata' ? 'selected' : '' }}>Asia/Kolkata (GMT+5:30)</option>
                                    <option value="UTC" {{ old('timezone') == 'UTC' ? 'selected' : '' }}>UTC</option>
                                    <option value="America/New_York" {{ old('timezone') == 'America/New_York' ? 'selected' : '' }}>America/New_York (EST)</option>
                                </select>
                                @error('timezone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="subdomain" class="form-label">Subdomain</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('subdomain') is-invalid @enderror"
                                        id="subdomain" name="subdomain" value="{{ old('subdomain') }}"
                                        placeholder="company-name">
                                    <span class="input-group-text">.yourdomain.com</span>
                                </div>
                                @error('subdomain')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="custom_domain" class="form-label">Custom Domain (White-label)</label>
                                <input type="text" class="form-control @error('custom_domain') is-invalid @enderror"
                                    id="custom_domain" name="custom_domain" value="{{ old('custom_domain') }}"
                                    placeholder="pos.company.com">
                                @error('custom_domain')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ==========================================
                    3. Address Details
                ========================================== --}}
                <div class="card mt-3">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Address Details</h4>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="address" class="form-label">Full Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3"
                                    placeholder="Enter full address">{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror"
                                    id="city" name="city" value="{{ old('city') }}" placeholder="Enter city">
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control @error('country') is-invalid @enderror"
                                    id="country" name="country" value="{{ old('country', 'Bangladesh') }}"
                                    placeholder="Enter country">
                                @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="zip_code" class="form-label">Zip / Postal Code</label>
                                <input type="text" class="form-control @error('zip_code') is-invalid @enderror"
                                    id="zip_code" name="zip_code" value="{{ old('zip_code') }}"
                                    placeholder="Enter zip code">
                                @error('zip_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ==========================================
                    4. Media & Logo
                ========================================== --}}
                <div class="card mt-3">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Company Logo</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="logo" class="form-label">Upload Logo</label>
                                <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                    id="logo" name="logo" accept="image/*">
                                <small class="text-muted">Recommended size: 200x200px (PNG, JPG, SVG). Max 2MB.</small>
                                @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Logo Preview</label>
                                <div id="logo-preview" class="border rounded p-2 text-center" style="min-height: 100px; background: #f8f9fa;">
                                    <i class="ti ti-photo text-muted" style="font-size: 2rem;"></i>
                                    <p class="text-muted small mb-0">No logo selected</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ==========================================
                    Action Buttons
                ========================================== --}}
                <div class="card mt-3">
                    <div class="card-body text-end">
                        <a href="{{ route('superadmin.companies.index') }}" class="btn btn-secondary me-2">
                            <i class="ti ti-x me-1"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="ti ti-device-floppy me-1"></i> Save Company
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        // Auto-generate slug from company name
        document.getElementById('name').addEventListener('input', function() {
            let slugInput = document.getElementById('slug');
            // Only auto-generate if slug is empty or hasn't been manually changed
            if (!slugInput.dataset.manual) {
                slugInput.value = this.value
                    .toLowerCase()
                    .replace(/[^a-z0-9]+/g, '-')
                    .replace(/^-+|-+$/g, '');
            }
        });

        document.getElementById('slug').addEventListener('input', function() {
            this.dataset.manual = 'true';
        });

        // Logo Preview
        document.getElementById('logo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('logo-preview');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" alt="Logo Preview" style="max-width: 150px; max-height: 150px;" class="img-fluid">`;
                };
                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = `<i class="ti ti-photo text-muted" style="font-size: 2rem;"></i><p class="text-muted small mb-0">No logo selected</p>`;
            }
        });

        // Plan Details Display
        document.getElementById('plan_id').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const detailsDiv = document.getElementById('plan-details');
            const infoDiv = document.getElementById('plan-info');
            
            if (this.value && selectedOption.dataset.price) {
                const price = selectedOption.dataset.price;
                const trial = selectedOption.dataset.trial;
                const users = selectedOption.dataset.users;
                const branches = selectedOption.dataset.branches;
                
                infoDiv.innerHTML = `
                    <div class="mt-1">
                        <strong>Price:</strong> $${parseFloat(price).toFixed(2)}/month<br>
                        <strong>Trial Period:</strong> ${trial} days<br>
                        <strong>User Limit:</strong> ${users} users<br>
                        <strong>Branch Limit:</strong> ${branches} branches
                    </div>
                `;
                detailsDiv.style.display = 'block';
            } else {
                detailsDiv.style.display = 'none';
            }
        });

        // Trigger plan change on page load if old value exists
        document.addEventListener('DOMContentLoaded', function() {
            const planSelect = document.getElementById('plan_id');
            if (planSelect.value) {
                planSelect.dispatchEvent(new Event('change'));
            }
        });
    </script>
@endpush