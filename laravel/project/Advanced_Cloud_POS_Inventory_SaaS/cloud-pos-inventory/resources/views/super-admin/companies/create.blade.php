@extends('layouts.admin_master')

@section('title', 'Add Company')

@section('content')
    <!-- Page Title & Breadcrumb -->
    <div class="mb-2 row">
        <div class="col-sm-6">
            <h4 class="page-title">Add New Company</h4>
        </div>
        <div class="col-sm-6 text-sm-end">
            <nav aria-label="breadcrumb">
                <ol class="mb-0 breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('superadmin.companies.index') }}">Companies</a></li>
                    <li class="breadcrumb-item active">Add Company</li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- ✅ শুধু ফর্মে id="company-form" যোগ করা হয়েছে --}}
    <form id="company-form" action="{{ route('superadmin.companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

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
                                    id="name" name="name" value="{{ old('name') }}"
                                    placeholder="Enter company name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="slug" class="form-label">Slug / URL Identifier</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="slug" name="slug" value="{{ old('slug') }}"
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
                                    id="email" name="email" value="{{ old('email') }}"
                                    placeholder="Enter company email" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="contact_person" class="form-label">Contact Person Name</label>
                                <input type="text" class="form-control @error('contact_person') is-invalid @enderror"
                                    id="contact_person" name="contact_person" value="{{ old('contact_person') }}"
                                    placeholder="Enter contact person name">
                                @error('contact_person')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" value="{{ old('phone') }}"
                                    placeholder="Enter phone number">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="website" class="form-label">Website</label>
                                <input type="url" class="form-control @error('website') is-invalid @enderror"
                                    id="website" name="website" value="{{ old('website') }}"
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
                                            {{ old('plan_id') == $plan->id ? 'selected' : '' }}>
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
                                    <option value="trial" {{ old('status') == 'trial' ? 'selected' : '' }}>Trial</option>
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                    <option value="suspended" {{ old('status') == 'suspended' ? 'selected' : '' }}>
                                        Suspended</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="currency" class="form-label">Default Currency</label>
                                <select class="form-select @error('currency') is-invalid @enderror" id="currency"
                                    name="currency">
                                    <option value="BDT" {{ old('currency') == 'BDT' ? 'selected' : '' }}>BDT -
                                        Bangladeshi Taka</option>
                                    <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>USD - US
                                        Dollar</option>
                                    <option value="INR" {{ old('currency') == 'INR' ? 'selected' : '' }}>INR - Indian
                                        Rupee</option>
                                    <option value="EUR" {{ old('currency') == 'EUR' ? 'selected' : '' }}>EUR - Euro
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
                                    <option value="Asia/Dhaka" {{ old('timezone') == 'Asia/Dhaka' ? 'selected' : '' }}>
                                        Asia/Dhaka (GMT+6)</option>
                                    <option value="Asia/Kolkata"
                                        {{ old('timezone') == 'Asia/Kolkata' ? 'selected' : '' }}>Asia/Kolkata (GMT+5:30)
                                    </option>
                                    <option value="UTC" {{ old('timezone') == 'UTC' ? 'selected' : '' }}>UTC</option>
                                    <option value="America/New_York"
                                        {{ old('timezone') == 'America/New_York' ? 'selected' : '' }}>America/New_York
                                        (EST)</option>
                                </select>
                                @error('timezone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
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

                            <div class="mb-3 col-md-6">
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
                <div class="mt-3 card">
                    <div class="card-body">
                        <h4 class="mb-3 header-title">Address Details</h4>
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label for="address" class="form-label">Full Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3"
                                    placeholder="Enter full address">{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-4">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror"
                                    id="city" name="city" value="{{ old('city') }}" placeholder="Enter city">
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-4">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control @error('country') is-invalid @enderror"
                                    id="country" name="country" value="{{ old('country', 'Bangladesh') }}"
                                    placeholder="Enter country">
                                @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-4">
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
                <div class="mt-3 card">
                    <div class="card-body">
                        <h4 class="mb-3 header-title">Company Logo</h4>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="logo" class="form-label">Upload Logo</label>
                                <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                    id="logo" name="logo"
                                    accept="image/png, image/jpeg, image/jpg, image/svg+xml">
                                <small class="text-muted">Recommended size: 200x200px (PNG, JPG). Max 2MB. আপলোডের পর টেনে
                                    (drag) ও জুম করে ছবির সঠিক অংশ সিলেক্ট করতে পারবেন।</small>
                                @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Logo Preview</label>
                                <div id="logo-preview" class="p-2 border rounded"
                                    style="min-height: 100px; background: #f8f9fa;">
                                    <div id="logo-preview-empty" class="text-center">
                                        <i class="ti ti-photo text-muted" style="font-size: 2rem;"></i>
                                        <p class="mb-0 text-muted small">No logo selected</p>
                                    </div>
                                    <div id="logo-preview-filled" class="d-none align-items-center gap-3">
                                        <img id="logo-preview-img" src="" class="rounded-circle border"
                                            width="70" height="70" style="object-fit: cover;" alt="Logo Preview">
                                        <div>
                                            <span class="d-block small text-muted mb-1">টেবিলে ঠিক এভাবে দেখাবে:</span>
                                            <img id="logo-preview-img-small" src="" class="rounded-circle border"
                                                width="40" height="40" style="object-fit: cover;"
                                                alt="Logo Preview Small">
                                            <button type="button" id="recrop-btn"
                                                class="btn btn-sm btn-outline-secondary ms-2">
                                                <i class="ti ti-crop"></i> আবার ক্রপ করুন
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <small class="text-muted">নিরাপত্তার কারণে ব্রাউজার ফাইল ইনপুট রিস্টোর করতে পারে না —
                                    validation error হলে বা পেজ রিলোড দিলে লোগো আবার সিলেক্ট করতে হবে।</small>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ==========================================
                    Action Buttons
                ========================================== --}}
                <div class="mt-3 card">
                    <div class="card-body text-end">
                        <a href="{{ route('superadmin.companies.index') }}" id="cancel-btn"
                            class="btn btn-secondary me-2">
                            <i class="ti ti-x me-1"></i> Cancel
                        </a>
                        {{-- ✅ শুধু বাটনে id="submit-btn" যোগ করা হয়েছে --}}
                        <button type="submit" id="submit-btn" class="btn btn-primary">
                            <i class="ti ti-device-floppy me-1"></i> Save Company
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>

    {{-- ==========================================
        Logo Crop Modal (Cropper.js)
    ========================================== --}}
    <div class="modal fade" id="cropModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
        data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">লোগো ক্রপ করুন</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="max-height: 400px; overflow: hidden; background: #222;">
                        <img id="crop-image" src="" alt="Crop preview" style="max-width: 100%; display: block;">
                    </div>
                    <p class="text-muted small mt-2 mb-0">ছবির উপর মাউস/আঙুল দিয়ে টেনে (drag) পজিশন ঠিক করুন, নিচের বাটন
                        দিয়ে জুম বা ঘোরান।</p>
                </div>
                <div class="modal-footer flex-wrap justify-content-center gap-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary" id="crop-zoom-out"
                        title="Zoom Out"><i class="ti ti-zoom-out"></i></button>
                    <button type="button" class="btn btn-sm btn-outline-secondary" id="crop-zoom-in" title="Zoom In"><i
                            class="ti ti-zoom-in"></i></button>
                    <button type="button" class="btn btn-sm btn-outline-secondary" id="crop-rotate-left"
                        title="Rotate Left"><i class="ti ti-rotate-2"></i></button>
                    <button type="button" class="btn btn-sm btn-outline-secondary" id="crop-rotate-right"
                        title="Rotate Right"><i class="ti ti-rotate-clockwise-2"></i></button>
                    <button type="button" class="btn btn-sm btn-outline-secondary" id="crop-reset" title="Reset"><i
                            class="ti ti-refresh"></i></button>
                    <div class="w-100"></div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">বাতিল</button>
                    <button type="button" class="btn btn-primary" id="crop-save-btn"><i class="ti ti-check me-1"></i>
                        সেভ করুন</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css">
@endpush

@push('scripts')
    {{-- Cropper.js: লোগো drag/zoom করে ক্রপ করার জন্য --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js"></script>
    <script>
        // ✅ Note: this app already loads toastr globally (see partials/scripts.blade.php
        // + partials/alerts.blade.php, included on every page via admin_master). No need
        // for a separate toast implementation here - just call toastr directly below.

        $(document).ready(function() {
            // ==========================================
            // 0. Draft Auto-Save / Restore (sessionStorage)
            // ==========================================
            // পেজ রিলোড / ভুলে ট্যাব বন্ধ হলেও টাইপ করা ডেটা যেন হারিয়ে না যায়
            const DRAFT_KEY = 'company_create_form_draft';

            function saveFormDraft() {
                let data = {};
                $('#company-form').find('input, select, textarea')
                    .not('[type=file]')
                    .not('[name="_token"]')
                    .each(function() {
                        let name = $(this).attr('name');
                        if (!name) return;
                        data[name] = $(this).val();
                    });
                try {
                    sessionStorage.setItem(DRAFT_KEY, JSON.stringify(data));
                } catch (e) {
                    console.error('Draft save failed:', e);
                }
            }

            function restoreFormDraft() {
                let raw;
                try {
                    raw = sessionStorage.getItem(DRAFT_KEY);
                } catch (e) {
                    return;
                }
                if (!raw) return;

                try {
                    let data = JSON.parse(raw);
                    Object.keys(data).forEach(function(name) {
                        let field = $('#company-form').find('[name="' + name + '"]');
                        // সার্ভার থেকে old() এর মাধ্যমে আগে থেকে ভ্যালু থাকলে সেটাকে override করবে না
                        if (field.length && !field.val() && data[name]) {
                            field.val(data[name]);
                        }
                    });
                } catch (e) {
                    console.error('Draft restore failed:', e);
                }
            }

            function clearFormDraft() {
                try {
                    sessionStorage.removeItem(DRAFT_KEY);
                } catch (e) {}
            }

            // পেজ লোড হওয়ার সাথে সাথেই আগের ড্রাফট থাকলে ফিরিয়ে আনো
            restoreFormDraft();

            // ==========================================
            // 1. Auto-generate slug from company name
            // ==========================================
            // যদি রিস্টোর করা ড্রাফটে slug আগে থেকেই থাকে, ধরে নাও ইউজার নিজে বসিয়েছিল
            if ($('#slug').val()) {
                $('#slug').data('manual', true);
            }

            $('#name').on('input', function() {
                let slugInput = $('#slug');
                if (!slugInput.data('manual')) {
                    slugInput.val($(this).val().toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(
                        /^-+|-+$/g, ''));
                }
            });

            $('#slug').on('input', function() {
                // slug ফিল্ড খালি করে দিলে আবার auto-generate মোডে ফিরে যাবে
                $(this).data('manual', $(this).val().trim() !== '');
            });

            // ==========================================
            // 2. Logo Upload + Crop (drag/zoom/rotate)
            // ==========================================
            const logoInput = document.getElementById('logo');
            const cropImage = document.getElementById('crop-image');
            const cropModalEl = document.getElementById('cropModal');
            const cropModal = (typeof bootstrap !== 'undefined') ? new bootstrap.Modal(cropModalEl) : null;

            let cropper = null;
            let cropConfirmed = false;
            const maxSizeBytes = 2 * 1024 * 1024; // 2MB
            const allowedTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/svg+xml'];

            function showEmptyLogoPreview() {
                $('#logo-preview-empty').removeClass('d-none');
                $('#logo-preview-filled').addClass('d-none').removeClass('d-flex');
            }

            function showFilledLogoPreview(url) {
                $('#logo-preview-img').attr('src', url);
                $('#logo-preview-img-small').attr('src', url);
                $('#logo-preview-empty').addClass('d-none');
                $('#logo-preview-filled').removeClass('d-none').addClass('d-flex');
            }

            function resetLogoInput() {
                $(logoInput).val('');
                showEmptyLogoPreview();
            }

            function openCropperWithFile(file) {
                const reader = new FileReader();
                reader.onload = function(ev) {
                    cropImage.src = ev.target.result;
                    cropConfirmed = false;
                    if (cropModal) {
                        cropModal.show();
                    }
                };
                reader.readAsDataURL(file);
            }

            $(logoInput).on('change', function(e) {
                const file = e.target.files[0];

                if (!file) {
                    showEmptyLogoPreview();
                    return;
                }

                if (file.size > maxSizeBytes) {
                    alert('লোগোর সাইজ 2MB এর বেশি হতে পারবে না। অনুগ্রহ করে ছোট সাইজের ফাইল সিলেক্ট করুন।');
                    resetLogoInput();
                    return;
                }

                if (!allowedTypes.includes(file.type)) {
                    alert('শুধুমাত্র PNG, JPG অথবা SVG ফরম্যাটের ছবি আপলোড করা যাবে।');
                    resetLogoInput();
                    return;
                }

                // SVG ভেক্টর ফরম্যাট, Cropper.js এতে কাজ করে না - সরাসরি প্রিভিউ দেখাও
                if (file.type === 'image/svg+xml') {
                    const reader = new FileReader();
                    reader.onload = function(ev) {
                        showFilledLogoPreview(ev.target.result);
                    };
                    reader.readAsDataURL(file);
                    return;
                }

                if (typeof Cropper === 'undefined') {
                    // Cropper.js লোড না হলে fallback হিসেবে সাধারণ প্রিভিউ দেখাও
                    const reader = new FileReader();
                    reader.onload = function(ev) {
                        showFilledLogoPreview(ev.target.result);
                    };
                    reader.readAsDataURL(file);
                    return;
                }

                openCropperWithFile(file);
            });

            // মোডাল ওপেন হওয়ার পর Cropper ইনিশিয়ালাইজ করো (গোল সার্কেল অনুযায়ী ১:১ অনুপাত)
            $(cropModalEl).on('shown.bs.modal', function() {
                if (cropper) {
                    cropper.destroy();
                }
                cropper = new Cropper(cropImage, {
                    aspectRatio: 1,
                    viewMode: 1,
                    dragMode: 'move',
                    autoCropArea: 1,
                    cropBoxResizable: false,
                    cropBoxMovable: false,
                    background: false,
                    guides: false,
                });
            });

            // মোডাল বন্ধ (বাতিল) করলে, এবং সেভ না করা হলে ফাইল ইনপুট রিসেট করো
            $(cropModalEl).on('hidden.bs.modal', function() {
                if (cropper) {
                    cropper.destroy();
                    cropper = null;
                }
                if (!cropConfirmed) {
                    resetLogoInput();
                }
            });

            $('#crop-zoom-in').on('click', function() {
                if (cropper) cropper.zoom(0.1);
            });
            $('#crop-zoom-out').on('click', function() {
                if (cropper) cropper.zoom(-0.1);
            });
            $('#crop-rotate-left').on('click', function() {
                if (cropper) cropper.rotate(-45);
            });
            $('#crop-rotate-right').on('click', function() {
                if (cropper) cropper.rotate(45);
            });
            $('#crop-reset').on('click', function() {
                if (cropper) cropper.reset();
            });

            $('#crop-save-btn').on('click', function() {
                if (!cropper) return;

                cropper.getCroppedCanvas({
                    width: 400,
                    height: 400,
                    imageSmoothingEnabled: true,
                    imageSmoothingQuality: 'high'
                }).toBlob(function(blob) {
                    if (!blob) return;

                    const originalFile = logoInput.files[0];
                    const baseName = originalFile ? originalFile.name.replace(/\.[^/.]+$/, '') :
                        'logo';
                    const croppedFile = new File([blob], baseName + '.png', {
                        type: 'image/png'
                    });

                    // cropped ফাইলটাকে আসল file input-এ বসিয়ে দাও, যাতে ফর্ম সাবমিটে এটাই সার্ভারে যায়
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(croppedFile);
                    logoInput.files = dataTransfer.files;

                    showFilledLogoPreview(URL.createObjectURL(blob));

                    cropConfirmed = true;
                    if (cropModal) {
                        cropModal.hide();
                    }
                }, 'image/png');
            });

            // "আবার ক্রপ করুন" - বর্তমানে সেট করা ফাইল দিয়ে আবার cropper খোলো
            $('#recrop-btn').on('click', function() {
                const currentFile = logoInput.files[0];
                if (!currentFile || currentFile.type === 'image/svg+xml') return;
                openCropperWithFile(currentFile);
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

            // ইউজার নিজে ইচ্ছাকৃতভাবে "Cancel" করলে ড্রাফট মুছে ফেলো
            $('#cancel-btn').on('click', function() {
                clearFormDraft();
            });

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

                // প্রতিটি পরিবর্তনে ড্রাফট অটো-সেভ (file input বাদে, কারণ সেটা সেভ করা যায় না)
                if (this.type !== 'file') {
                    saveFormDraft();
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
                    '<span class="spinner-border spinner-border-sm me-1"></span> Saving...');

                // সাবমিটের আগে সব পুরনো এরর ক্লিয়ার করে দাও
                form.find('.is-invalid').removeClass('is-invalid');
                form.find('.invalid-feedback').text('').hide();
                form.find('.invalid-feedback[style*="display: block"]').remove();

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Accept': 'application/json' // লারাভেলকে JSON এরর রিটার্ন করতে বলছি
                    },
                    success: function(response) {
                        // ফর্ম সফলভাবে সাবমিট হয়ে গেছে, তাই সেভ করা ড্রাফট মুছে ফেলো
                        clearFormDraft();

                        // ✅ toastr দিয়ে টোস্ট দেখাও, তারপর সামান্য দেরি করে রিডাইরেক্ট করো
                        // যাতে টোস্ট রিডাইরেক্টের কারণে সাথে সাথে হারিয়ে না যায়।
                        // নোট: কন্ট্রোলারের JSON রেসপন্স-এর ব্রাঞ্চেও যদি session()->flash('success', ...)
                        // সেট করা থাকে, তাহলে redirect হওয়ার পর index পেজে আবার একই মেসেজ toastr
                        // দেখাবে (partials/alerts.blade.php থেকে) - ডাবল টোস্ট এড়াতে এই ব্রাঞ্চে
                        // flash সেট না করাই ভালো, শুধু JSON message পাঠান।
                        toastr.success(response.message || 'Company saved successfully!',
                            'Success');
                        const redirectUrl = response.redirect ||
                            '{{ route('superadmin.companies.index') }}';
                        setTimeout(function() {
                            window.location.href = redirectUrl;
                        }, 1200);
                    },
                    error: function(xhr) {
                        // ভ্যালিডেশন ফেইল হলেও বর্তমান ডেটা ড্রাফটে সেভ থাকুক (রিলোড করলেও যেন না হারায়)
                        saveFormDraft();

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
@endpush
