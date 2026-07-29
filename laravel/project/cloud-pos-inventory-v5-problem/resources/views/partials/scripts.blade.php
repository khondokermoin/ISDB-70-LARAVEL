<!-- Vendor JS (includes jQuery + DataTables) -->
<script src="{{ asset('frontend_assets/js/vendor.min.js') }}"></script>

<!-- Application JS -->
<script src="{{ asset('frontend_assets/js/app.js') }}"></script>

<!-- ApexCharts -->
<script src="{{ asset('frontend_assets/vendor/apexcharts/apexcharts.min.js') }}"></script>

<!-- Dashboard JS -->
<script src="{{ asset('frontend_assets/js/pages/dashboard.js') }}"></script>

{{-- ✅ jQuery is already bundled in vendor.min.js — DO NOT load it again here --}}
{{-- Loading jQuery a second time resets $.fn and breaks all plugins (DataTables, etc.) --}}

<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Global Alert Notifications -->
@include('partials.alerts')

@stack('scripts')
