@extends('layouts.admin_master')

@section('title', 'Edit Company')

@section('content')
    <!-- Page Title & Breadcrumb -->
    <div class="mb-2 row">
        <div class="col-sm-6">
            <h4 class="page-title">Edit Company</h4>
        </div>
        <div class="col-sm-6 text-sm-end">
            <nav aria-label="breadcrumb">
                <ol class="mb-0 breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('superadmin.companies.index') }}">Companies</a></li>
                    <li class="breadcrumb-item active">Edit Company</li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- ✅ id="company-form" এবং @method('PUT') যোগ করা হয়েছে --}}
    <form id="company-form" action="{{ route('superadmin.companies.update', $company->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-12">

                {{-- ==========================================
                    1. Basic Information
                ========================================== --}}
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3 header-title">Basic Information</h4>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Company Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $company->name) }}"
                                    placeholder="Enter company name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="slug" class="form-label">Slug / URL Identifier</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="slug" name="slug" value="{{ old('slug', $company->slug) }}"
                                    placeholder="auto-generated-from-name">
                                <small class="text-muted">Leave empty to auto-generate from company name.</small>
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Company Email <span
                                        class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email', $company->email) }}"
                                    placeholder="Enter company email" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="contact_person" class="form-label">Contact Person Name</label>
                                <input type="text" class="form-control @error('contact_person') is-invalid @enderror"
                                    id="contact_person" name="contact_person"
                                    value="{{ old('contact_person', $company->contact_person) }}"
                                    placeholder="Enter contact person name">
                                @error('contact_person')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" value="{{ old('phone', $company->phone) }}"
                                    placeholder="Enter phone number">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="website" class="form-label">Website</label>
                                <input type="url" class="form-control @error('website') is-invalid @enderror"
                                    id="website" name="website" value="{{ old('website', $company->website) }}"
                                    placeholder="https://example.com">
                                @error('website')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Assign Company Admin -->
                            <div class="mb-3 col-md-6">
                                <label for="user_id" class="form-label">Assign Company Admin <span
                                        class="text-danger">*</span></label>
                                <select class="form-select @error('user_id') is-invalid @enderror" id="user_id"
                                    name="user_id" required>
                                    <option value="">Select Admin User</option>
                                    @foreach ($users ?? [] as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('user_id', $company->user_id) == $user->id ? 'selected' : '' }}>
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
                <div class="mt-3 card">
                    <div class="card-body">
                        <h4 class="mb-3 header-title">SaaS & POS Settings</h4>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="plan_id" class="form-label">Subscription Plan <span
                                        class="text-danger">*</span></label>
                                <select class="form-select @error('plan_id') is-invalid @enderror" id="plan_id"
                                    name="plan_id" required>
                                    <option value="">Select Plan</option>
                                    @forelse($plans ?? [] as $plan)
                                        <option value="{{ $plan->id }}" data-price="{{ $plan->price }}"
                                            data-trial="{{ $plan->trial_days }}" data-users="{{ $plan->user_limit }}"
                                            data-branches="{{ $plan->branch_limit }}"
                                            {{ old('plan_id', $company->plan_id) == $plan->id ? 'selected' : '' }}>
                                            {{ $plan->name }} - ${{ number_format($plan->price, 2) }}/month
                                        </option>
                                    @empty
                                        <option value="" disabled>No plans available. Please create plans first.
                                        </option>
                                    @endforelse
                                </select>
                                @error('plan_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                {{-- Plan Details Display --}}
                                <div id="plan-details" class="p-2 mt-2 rounded bg-light small" style="display: none;">
                                    <strong>Plan Details:</strong>
                                    <div id="plan-info"></div>
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="status" class="form-label">Status <span
                                        class="text-danger">*</span></label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status"
                                    name="status" required>
                                    <option value="trial"
                                        {{ old('status', $company->status) == 'trial' ? 'selected' : '' }}>Trial</option>
                                    <option value="active"
                                        {{ old('status', $company->status) == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive"
                                        {{ old('status', $company->status) == 'inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                    <option value="suspended"
                                        {{ old('status', $company->status) == 'suspended' ? 'selected' : '' }}>Suspended
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="currency" class="form-label">Default Currency</label>
                                <select class="form-select @error('currency') is-invalid @enderror" id="currency"
                                    name="currency">
                                    <option value="BDT"
                                        {{ old('currency', $company->currency) == 'BDT' ? 'selected' : '' }}>BDT -
                                        Bangladeshi Taka</option>
                                    <option value="USD"
                                        {{ old('currency', $company->currency) == 'USD' ? 'selected' : '' }}>USD - US
                                        Dollar</option>
                                    <option value="INR"
                                        {{ old('currency', $company->currency) == 'INR' ? 'selected' : '' }}>INR - Indian
                                        Rupee</option>
                                    <option value="EUR"
                                        {{ old('currency', $company->currency) == 'EUR' ? 'selected' : '' }}>EUR - Euro
                                    </option>
                                </select>
                                @error('currency')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="timezone" class="form-label">Timezone</label>
                                <select class="form-select @error('timezone') is-invalid @enderror" id="timezone"
                                    name="timezone">
                                    <option value="Asia/Dhaka"
                                        {{ old('timezone', $company->timezone) == 'Asia/Dhaka' ? 'selected' : '' }}>
                                        Asia/Dhaka (GMT+6)</option>
                                    <option value="Asia/Kolkata"
                                        {{ old('timezone', $company->timezone) == 'Asia/Kolkata' ? 'selected' : '' }}>
                                        Asia/Kolkata (GMT+5:30)</option>
                                    <option value="UTC"
                                        {{ old('timezone', $company->timezone) == 'UTC' ? 'selected' : '' }}>UTC</option>
                                    <option value="America/New_York"
                                        {{ old('timezone', $company->timezone) == 'America/New_York' ? 'selected' : '' }}>
                                        America/New_York (EST)</option>
                                </select>
                                @error('timezone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="subdomain" class="form-label">Subdomain</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('subdomain') is-invalid @enderror"
                                        id="subdomain" name="subdomain"
                                        value="{{ old('subdomain', $company->subdomain) }}" placeholder="company-name">
                                    <span class="input-group-text">.yourdomain.com</span>
                                </div>
                                @error('subdomain')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="custom_domain" class="form-label">Custom Domain (White-label)</label>
                                <input type="text" class="form-control @error('custom_domain') is-invalid @enderror"
                                    id="custom_domain" name="custom_domain"
                                    value="{{ old('custom_domain', $company->custom_domain) }}"
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
                <div class="mt-3 card">
                    <div class="card-body">
                        <h4 class="mb-3 header-title">Address Details</h4>
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label for="address" class="form-label">Full Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3"
                                    placeholder="Enter full address">{{ old('address', $company->address) }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-4">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror"
                                    id="city" name="city" value="{{ old('city', $company->city) }}"
                                    placeholder="Enter city">
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-4">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control @error('country') is-invalid @enderror"
                                    id="country" name="country" value="{{ old('country', $company->country) }}"
                                    placeholder="Enter country">
                                @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-4">
                                <label for="zip_code" class="form-label">Zip / Postal Code</label>
                                <input type="text" class="form-control @error('zip_code') is-invalid @enderror"
                                    id="zip_code" name="zip_code" value="{{ old('zip_code', $company->zip_code) }}"
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
                @php
                    // ✅ BUG FIX: asset($company->logo) is wrong when the file was saved with
                    // Storage::disk('public')->put(...). That returns a path like "logos/xyz.png"
                    // which lives in storage/app/public and is served from /storage/... (via the
                    // storage:link symlink), NOT from the app's public/ root. Using asset() directly
// on it points to a URL that doesn't exist, so the <img> silently fails to load.
                    // This builds the correct URL regardless of how the path was stored.
                    $logoUrl = null;
                    if (!empty($company->logo)) {
                        if (\Illuminate\Support\Str::startsWith($company->logo, ['http://', 'https://'])) {
                            $logoUrl = $company->logo;
                        } elseif (\Illuminate\Support\Str::startsWith($company->logo, 'storage/')) {
                            $logoUrl = asset($company->logo);
                        } else {
                            $logoUrl = asset('storage/' . ltrim($company->logo, '/'));
                        }
                    }
                @endphp
                <div class="mt-3 card">
                    <div class="card-body">
                        <h4 class="mb-3 header-title">Company Logo</h4>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="logo" class="form-label">Upload New Logo</label>
                                <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                    id="logo" name="logo"
                                    accept="image/png, image/jpeg, image/jpg, image/svg+xml">
                                <small class="text-muted">Recommended size: 200x200px (PNG, JPG, SVG). Max 2MB. Leave empty
                                    to keep current logo.</small>
                                @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Logo Preview</label>
                                <div id="logo-preview" class="p-2 text-center border rounded"
                                    style="min-height: 100px; background: #f8f9fa;">
                                    @if ($logoUrl)
                                        <img src="{{ $logoUrl }}" alt="Company Logo"
                                            style="max-width: 150px; max-height: 150px;" class="img-fluid">
                                    @else
                                        <i class="ti ti-photo text-muted" style="font-size: 2rem;"></i>
                                        <p class="mb-0 text-muted small">No logo selected</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ==========================================
                    Action Buttons
                ========================================== --}}
                <div class="mt-3 card">
                    <div class="card-body text-end">
                        <a href="{{ route('superadmin.companies.index') }}" class="btn btn-secondary me-2">
                            <i class="ti ti-x me-1"></i> Cancel
                        </a>
                        {{-- ✅ id="submit-btn" যোগ করা হয়েছে --}}
                        <button type="submit" id="submit-btn" class="btn btn-primary">
                            <i class="ti ti-device-floppy me-1"></i> Update Company
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        // ✅ Note: this app already loads toastr globally (see partials/scripts.blade.php
        // + partials/alerts.blade.php, included on every page via admin_master). No need
        // for a separate toast implementation here - just call toastr directly below.

        $(document).ready(function() {
            // ==========================================
            // 1. Auto-generate slug from company name
            // ==========================================
            $('#name').on('input', function() {
                let slugInput = $('#slug');
                // Only auto-generate if slug is empty or hasn't been manually changed
                if (!slugInput.data('manual')) {
                    slugInput.val($(this).val().toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(
                        /^-+|-+$/g, ''));
                }
            });

            $('#slug').on('input', function() {
                $(this).data('manual', true);
            });

            // ✅ Edit page-এ পুরনো slug থাকলে সেটা overwrite করবে না
            if ($('#slug').val()) {
                $('#slug').data('manual', true);
            }

            // ==========================================
            // 2. Logo Preview
            // ==========================================
            const maxLogoSizeBytes = 2 * 1024 * 1024; // 2MB
            const allowedLogoTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/svg+xml'];

            // ✅ ফাইল ক্যান্সেল/রিসেট করলে আগের (সঠিক URL সহ) লোগো ফিরিয়ে আনার জন্য
            const originalLogoHtml =
                `@if ($logoUrl)<img src="{{ $logoUrl }}" alt="Company Logo" style="max-width: 150px; max-height: 150px;" class="img-fluid">@else<i class="ti ti-photo text-muted" style="font-size: 2rem;"></i><p class="mb-0 text-muted small">No logo selected</p>@endif`;

            $('#logo').on('change', function(e) {
                const file = e.target.files[0];
                const preview = $('#logo-preview');
                const logoInputEl = this;

                if (!file) {
                    preview.html(originalLogoHtml);
                    return;
                }

                // ✅ Bug fix: create.blade.php validates file size/type before accepting it,
                // edit.blade.php had no such check — invalid files just went straight to submit
                // and failed only after a round trip to the server.
                if (file.size > maxLogoSizeBytes) {
                    alert('Logo size must not exceed 2MB. Please choose a smaller file.');
                    $(logoInputEl).val('');
                    preview.html(originalLogoHtml);
                    return;
                }

                if (!allowedLogoTypes.includes(file.type)) {
                    alert('Only PNG, JPG or SVG images are allowed.');
                    $(logoInputEl).val('');
                    preview.html(originalLogoHtml);
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.html(
                        `<img src="${e.target.result}" alt="Logo Preview" style="max-width: 150px; max-height: 150px;" class="img-fluid">`
                        );
                };
                reader.readAsDataURL(file);
            });

            // ==========================================
            // 3. Plan Details Display
            // ==========================================
            $('#plan_id').on('change', function() {
                const selectedOption = $(this).find('option:selected');
                const detailsDiv = $('#plan-details');
                const infoDiv = $('#plan-info');

                if ($(this).val() && selectedOption.data('price')) {
                    const price = selectedOption.data('price');
                    const trial = selectedOption.data('trial');
                    const users = selectedOption.data('users');
                    const branches = selectedOption.data('branches');

                    infoDiv.html(`
                        <div class="mt-1">
                            <strong>Price:</strong> $${parseFloat(price).toFixed(2)}/month<br>
                            <strong>Trial Period:</strong> ${trial} days<br>
                            <strong>User Limit:</strong> ${users} users<br>
                            <strong>Branch Limit:</strong> ${branches} branches
                        </div>
                    `);
                    detailsDiv.show();
                } else {
                    detailsDiv.hide();
                }
            });

            // Trigger plan change on page load if old value exists
            const planSelect = $('#plan_id');
            if (planSelect.val()) {
                planSelect.trigger('change');
            }

            // ==========================================
            // 4. Live Validation (Blur Event)
            // ==========================================
            // যখন কোনো ফিল্ড থেকে কার্সর সরে যাবে (blur), তখন ভ্যালিডেশন চেক হবে
            $('#company-form').on('blur', '.form-control, .form-select', function() {
                let input = $(this);
                if (this.type === 'file') return; // ফাইল ইনপুট চেক করবে না

                if (!this.checkValidity()) {
                    input.addClass('is-invalid');
                    let feedback = input.siblings('.invalid-feedback').first();
                    if (!feedback.length && input.parent().hasClass('input-group')) {
                        feedback = input.parent().next('.invalid-feedback');
                    }

                    if (feedback.length) {
                        feedback.text(this.validationMessage || 'Invalid input.').show().css('display',
                            'block');
                    } else {
                        let target = input.parent().hasClass('input-group') ? input.parent() : input;
                        target.after('<div class="invalid-feedback" style="display:block;">' + (this
                            .validationMessage || 'Invalid input.') + '</div>');
                    }
                }
            });

            // ==========================================
            // 5. Live Error Clearing (Input Event)
            // ==========================================
            // ইউজার টাইপ করা শুরু করলেই সাথে সাথে এরর মেসেজ চলে যাবে
            $('#company-form').on('input change', '.form-control, .form-select', function() {
                let input = $(this);
                input.removeClass('is-invalid');

                let feedback = input.siblings('.invalid-feedback').first();
                if (!feedback.length && input.parent().hasClass('input-group')) {
                    feedback = input.parent().next('.invalid-feedback');
                }

                if (feedback.length) {
                    feedback.text('').hide();
                } else {
                    let target = input.parent().hasClass('input-group') ? input.parent() : input;
                    target.next('.invalid-feedback').remove();
                }
            });

            // ==========================================
            // 6. AJAX Form Submission (No Page Reload)
            // ==========================================
            $('#company-form').on('submit', function(e) {
                e.preventDefault(); // পেজ রিলোড হতে দেব না

                let form = $(this);
                let formData = new FormData(this);
                let url = form.attr('action');
                let submitBtn = $('#submit-btn');
                let originalBtnHtml = submitBtn.html();

                // বাটন ডিজেবল করে লোডিং দেখাও
                submitBtn.prop('disabled', true).html(
                    '<span class="spinner-border spinner-border-sm me-1"></span> Updating...');

                // সাবমিটের আগে সব পুরনো এরর ক্লিয়ার করে দাও
                form.find('.is-invalid').removeClass('is-invalid');
                form.find('.invalid-feedback').text('').hide();
                form.find('.invalid-feedback[style*="display: block"]').remove();

                $.ajax({
                    url: url,
                    // ✅ CRITICAL BUG FIX: always send POST here. The form already has
                    // @method('PUT') as a hidden _method field, which Laravel's
                    // MethodOverride middleware reads to treat this as a PUT *logically*.
                    // If we instead set the actual AJAX verb to PUT, PHP never parses a
                    // multipart/form-data body for PUT requests — $_POST and $_FILES stay
                    // empty, so none of the form fields (including the uploaded logo) ever
                    // reach the controller. This is why data/image updates were failing.
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Accept': 'application/json' // লারাভেলকে JSON এরর রিটার্ন করতে বলছি
                    },
                    success: function(response) {
                        // ✅ toastr দিয়ে টোস্ট দেখাও, তারপর সামান্য দেরি করে রিডাইরেক্ট করো
                        // যাতে টোস্ট রিডাইরেক্টের কারণে সাথে সাথে হারিয়ে না যায়।
                        toastr.success(response.message || 'Company updated successfully!',
                            'Success');
                        const redirectUrl = response.redirect ||
                            '{{ route('superadmin.companies.index') }}';
                        setTimeout(function() {
                            window.location.href = redirectUrl;
                        }, 1200);
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            // ভ্যালিডেশন এরর হলে ফিল্ডের নিচে এরর দেখাও
                            let errors = xhr.responseJSON.errors;
                            let firstErrorElement = null;

                            $.each(errors, function(key, messages) {
                                let input = form.find('[name="' + key + '"]');
                                if (input.length) {
                                    input.addClass('is-invalid');

                                    let feedback = input.siblings('.invalid-feedback')
                                        .first();
                                    if (!feedback.length && input.parent().hasClass(
                                            'input-group')) {
                                        feedback = input.parent().next(
                                            '.invalid-feedback');
                                    }

                                    if (feedback.length) {
                                        feedback.text(messages[0]).show().css('display',
                                            'block');
                                    } else {
                                        let target = input.parent().hasClass(
                                            'input-group') ? input.parent() : input;
                                        target.after(
                                            '<div class="invalid-feedback" style="display:block;">' +
                                            messages[0] + '</div>');
                                    }

                                    if (!firstErrorElement) firstErrorElement = input;
                                }
                            });

                            // প্রথম এরর ফিল্ডে স্ক্রল করো
                            if (firstErrorElement) {
                                $('html, body').animate({
                                    scrollTop: firstErrorElement.offset().top - 150
                                }, 500);
                            }
                        } else {
                            toastr.error('An unexpected error occurred. Please try again.',
                                'Error');
                            console.error(xhr.responseText);
                        }
                    },
                    complete: function() {
                        submitBtn.prop('disabled', false).html(originalBtnHtml);
                    }
                });
            });
        });
    </script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const planSelect = document.getElementById('plan_id');
    const planDetailsDiv = document.getElementById('plan-details');
    const planInfoDiv = document.getElementById('plan-info');

    if (planSelect) {
        planSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            
            if (this.value !== "") {
                const price = selectedOption.getAttribute('data-price');
                const trial = selectedOption.getAttribute('data-trial');
                const users = selectedOption.getAttribute('data-users');
                const branches = selectedOption.getAttribute('data-branches');

                planInfoDiv.innerHTML = `
                    <ul class="mb-0 mt-1">
                        <li><strong>Price:</strong> $${parseFloat(price).toFixed(2)} / month</li>
                        <li><strong>Trial Period:</strong> ${trial} Days</li>
                        <li><strong>Max Users:</strong> ${users}</li>
                        <li><strong>Max Branches:</strong> ${branches}</li>
                    </ul>
                `;
                planDetailsDiv.style.display = 'block';
            } else {
                planDetailsDiv.style.display = 'none';
            }
        });

        // Trigger change event on page load if a value is already selected (e.g., during validation error)
        if (planSelect.value !== "") {
            planSelect.dispatchEvent(new Event('change'));
        }
    }
});
</script>
@endpush
