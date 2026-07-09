<!-- Character Encoding -->
<meta charset="UTF-8">

<!-- Responsive Meta -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Page Title -->
<title>@yield('title', 'Dashboard') | Zircos Admin Panel</title>

<!-- SEO Meta -->
<meta name="description" content="Professional Admin Dashboard for CRM, ERP, CMS, HRM and Business Management Systems.">
<meta name="keywords" content="Admin Dashboard, CRM, ERP, CMS, Laravel Admin, Bootstrap Dashboard">
<meta name="author" content="Coderthemes">

<!-- Browser Theme -->
<meta name="theme-color" content="#3b82f6">
<meta name="robots" content="index,follow">

<!-- CSRF Token (Laravel) -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset('frontend_assets/images/favicon.ico') }}">
<link rel="apple-touch-icon" href="{{ asset('frontend_assets/images/favicon.ico') }}">

<!-- Preconnect for Faster CDN Loading -->
<link rel="preconnect" href="https://cdnjs.cloudflare.com">
<link rel="dns-prefetch" href="//cdnjs.cloudflare.com">

<!-- Theme Configuration -->
<script src="{{ asset('frontend_assets/js/config.js') }}"></script>

<!-- Vendor CSS -->
<link rel="stylesheet" href="{{ asset('frontend_assets/css/vendor.min.css') }}">

<!-- Application CSS -->
<link rel="stylesheet" href="{{ asset('frontend_assets/css/app.min.css') }}" id="app-style">

<!-- Icons -->
<link rel="stylesheet" href="{{ asset('frontend_assets/css/icons.min.css') }}">

<!-- Toastr Notifications -->
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
      integrity="sha512-vKM3..." 
      crossorigin="anonymous"
      referrerpolicy="no-referrer">

<!-- Additional Page Styles -->
@stack('styles')