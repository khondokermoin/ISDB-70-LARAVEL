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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKM3..." crossorigin="anonymous" referrerpolicy="no-referrer">
<style>
    /* সাইডবার মেনুর লেখার সাইজ বড় করার জন্য এবং লম্বা লেখা ভেঙে পরের লাইনে দেওয়ার জন্য */
    .side-nav-link .menu-text {
        font-size: 14.5px !important;
        /* ফন্টের সাইজ বাড়ানো হয়েছে, আপনার প্রয়োজন অনুযায়ী পরিবর্তন করতে পারেন */
        white-space: normal !important;
        /* লেখা লম্বা হলে যেন কেটে না যায়, বরং পরের লাইনে চলে আসে */
        line-height: 1.5 !important;
        /* দুটি লাইনের মাঝে স্পেস ঠিক রাখার জন্য */
        display: inline-block;
        vertical-align: middle;
    }

    /* সাব-মেনুর (Sub-menu) লেখার সাইজ সামঞ্জস্যপূর্ণ রাখার জন্য */
    .sub-menu .side-nav-link .menu-text {
        font-size: 13.5px !important;
    }

    /* সাইডবারের সেকশন টাইটেল (যেমন: SAAS MANAGEMENT, PLATFORM ADMINISTRATION) স্পষ্ট করার জন্য */
    .side-nav-title {
        color: #aab8c5 !important;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    /* মেইন মেনুর টেক্সট এবং আইকনের রং উজ্জ্বল করার জন্য */
    .side-nav-link .menu-text,
    .side-nav-link .menu-icon {
        color: #cedce4 !important;
    }

    /* মেনুর উপর মাউস নিলে (Hover) যেন সাদা হয়ে যায় */
    .side-nav-link:hover .menu-text,
    .side-nav-link:hover .menu-icon {
        color: #ffffff !important;
    }

    /* সাব-মেনুর (Sub-menu) লেখাগুলো সামান্য আলাদা কিন্তু স্পষ্ট রাখার জন্য */
    .sub-menu .side-nav-link .menu-text {
        color: #98a6ad !important;
    }

    /* সাব-মেনুতে হোভার ইফেক্ট */
    .sub-menu .side-nav-link:hover .menu-text {
        color: #ffffff !important;
    }

    /* অ্যাকটিভ মেনুর (যে পেজে ইউজার আছেন) কালার হাইলাইট করার জন্য */
    .side-nav-item.active>.side-nav-link .menu-text,
    .side-nav-item.active>.side-nav-link .menu-icon {
        color: #ffffff !important;
    }

    /* সাইডবারের সেকশন টাইটেলগুলোর সাইজ এবং দৃশ্যমানতা বাড়ানোর জন্য */
    .side-nav-title {
        font-size: 12px !important;
        /* ফন্টের সাইজ একটু বড় করা হয়েছে (আপনার পছন্দমতো বাড়াতে/কমাতে পারেন) */
        font-weight: 700 !important;
        /* লেখাটি আরও বোল্ড বা মোটা করার জন্য */
        letter-spacing: 0.8px !important;
        /* অক্ষরগুলোর মাঝে সামান্য ফাঁকা জায়গা দেওয়ার জন্য, এতে পড়তে সুবিধা হয় */
        text-transform: uppercase !important;
        /* লেখাগুলো সব বড় হাতের (Capital) রাখার জন্য */
        padding-top: 15px !important;
        /* ওপরের দিক থেকে একটু ফাঁকা রাখার জন্য */
        padding-bottom: 5px !important;
    }
</style>

<!-- Additional Page Styles -->
@stack('styles')
