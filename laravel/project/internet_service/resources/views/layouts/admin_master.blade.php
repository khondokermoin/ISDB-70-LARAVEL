<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Amar IT Admin Dashboard">
    <title>@yield('title', 'Dashboard') | Amar IT Admin</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- ✅ FIX: Dark Mode FOUC Prevention --}}
    <script>
        (function() {
            const theme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', theme);
        })();
    </script>

    {{-- ✅ Mobile Sidebar Styles --}}
    <style>
        @media (max-width: 991.98px) {
            #adminSidebar {
                position: fixed !important;
                z-index: 1045;
                height: 100vh;
                left: 0;
                top: 0;
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            #adminSidebar.show-mobile {
                transform: translateX(0);
            }
            .sidebar-backdrop {
                position: fixed;
                top: 0; left: 0;
                width: 100%; height: 100%;
                background: rgba(0,0,0,0.5);
                z-index: 1040;
                display: none;
            }
            .sidebar-backdrop.show {
                display: block;
            }
        }
    </style>

    {{-- ✅ GLOBAL UI STYLES - 100% Dark Mode Supported --}}
    <style>
        /* ========================================
           1. BASE DARK MODE SUPPORT
           ======================================== */
        body {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* ========================================
           2. MAIN CONTENT AREA - Dark Mode Fix
           ======================================== */
        main.flex-grow-1 {
            background-color: var(--bs-body-bg);
            transition: background-color 0.3s ease;
            animation: fadeInUp 0.4s ease-out;
        }

        [data-bs-theme="dark"] main.flex-grow-1 {
            background-color: var(--bs-body-bg) !important;
        }

        [data-bs-theme="light"] main.flex-grow-1 {
            background-color: var(--bs-body-bg) !important;
        }

        /* ========================================
           3. CARDS - Light & Dark Mode
           ======================================== */
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease, background-color 0.3s ease;
            border: 1px solid var(--bs-border-color) !important;
        }

        /* Light Mode Card */
        [data-bs-theme="light"] .card {
            background-color: #fff !important;
        }

        /* Dark Mode Card */
        [data-bs-theme="dark"] .card {
            background-color: var(--bs-body-bg) !important;
            border-color: rgba(255, 255, 255, 0.1) !important;
        }

        /* Card Hover - Light Mode */
        [data-bs-theme="light"] .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px rgba(0,0,0,0.08) !important;
            border-color: rgba(var(--bs-danger-rgb), 0.3) !important;
        }

        /* Card Hover - Dark Mode */
        [data-bs-theme="dark"] .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px rgba(0,0,0,0.6) !important;
            border-color: rgba(var(--bs-danger-rgb), 0.5) !important;
            background-color: rgba(255, 255, 255, 0.02) !important;
        }

        /* ========================================
           4. ICON ANIMATIONS
           ======================================== */
        .icon-wrapper,
        .page-heading-icon {
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            display: inline-block;
        }

        .card:hover .icon-wrapper,
        .page-heading-icon:hover {
            transform: scale(1.15) rotate(5deg);
        }

        /* ========================================
           5. BUTTONS
           ======================================== */
        .btn {
            transition: all 0.25s ease !important;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-primary:hover {
            box-shadow: 0 6px 15px rgba(var(--bs-primary-rgb), 0.4);
        }

        .btn-outline-secondary:hover {
            box-shadow: 0 6px 15px rgba(var(--bs-secondary-rgb), 0.2);
            background-color: var(--bs-secondary) !important;
            color: #fff !important;
        }

        .btn-danger:hover {
            box-shadow: 0 6px 15px rgba(var(--bs-danger-rgb), 0.4);
        }

        .btn-success:hover {
            box-shadow: 0 6px 15px rgba(var(--bs-success-rgb), 0.4);
        }

        /* ========================================
           6. TABLE HOVER
           ======================================== */
        .table-hover tbody tr {
            transition: background-color 0.2s ease;
        }

        [data-bs-theme="light"] .table-hover tbody tr:hover {
            background-color: rgba(var(--bs-danger-rgb), 0.05) !important;
        }

        [data-bs-theme="dark"] .table-hover tbody tr:hover {
            background-color: rgba(var(--bs-danger-rgb), 0.1) !important;
        }

        /* ========================================
           7. WELCOME BANNER
           ======================================== */
        .welcome-banner-wrapper {
            overflow: hidden;
            border-radius: 0.5rem;
        }

        .welcome-banner-wrapper img {
            transition: transform 0.6s ease;
        }

        .welcome-banner-wrapper:hover img {
            transform: scale(1.05);
        }

        /* ========================================
           8. FORM INPUTS
           ======================================== */
        .form-control,
        .form-select {
            transition: border-color 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: rgba(var(--bs-danger-rgb), 0.5) !important;
            box-shadow: 0 0 0 0.15rem rgba(var(--bs-danger-rgb), 0.15) !important;
        }

        /* ========================================
           9. BADGES
           ======================================== */
        .badge {
            transition: transform 0.2s ease;
        }

        .card:hover .badge {
            transform: scale(1.05);
        }

        /* ========================================
           10. SMOOTH SCROLLING
           ======================================== */
        html {
            scroll-behavior: smooth;
        }

        /* ========================================
           11. PAGE LOAD ANIMATION (Fixed)
           ======================================== */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ========================================
           12. TEXT COLORS - Dark Mode Fix (Robust)
           ======================================== */

        /* 1. Headings: Make white in dark mode unless they have a specific text color class (like text-primary) */
        [data-bs-theme="dark"] h1:not([class*="text-"]),
        [data-bs-theme="dark"] h2:not([class*="text-"]),
        [data-bs-theme="dark"] h3:not([class*="text-"]),
        [data-bs-theme="dark"] h4:not([class*="text-"]),
        [data-bs-theme="dark"] h5:not([class*="text-"]),
        [data-bs-theme="dark"] h6:not([class*="text-"]) {
            color: #ffffff !important;
        }

        /* 2. Paragraphs: Make light gray in dark mode unless they have a specific text color class */
        [data-bs-theme="dark"] p:not([class*="text-"]) {
            color: rgba(255, 255, 255, 0.85) !important;
        }

        /* 3. Muted Text: Ensure it's visible */
        [data-bs-theme="dark"] .text-muted {
            color: rgba(255, 255, 255, 0.65) !important;
        }

        /* 4. Bold/Semibold Text: Make white unless colored */
        [data-bs-theme="dark"] .fw-bold:not([class*="text-"]),
        [data-bs-theme="dark"] .fw-semibold:not([class*="text-"]) {
            color: #ffffff !important;
        }

        [data-bs-theme="dark"] .bg-body-secondary {
            background-color: #1a1d21 !important;
        }

        /* ========================================
           13. NAVBAR BUTTONS - Dark Mode
           ======================================== */
        [data-bs-theme="dark"] .btn.bg-body-tertiary {
            background-color: rgba(255, 255, 255, 0.1) !important;
        }

        [data-bs-theme="dark"] .btn.bg-body-tertiary:hover {
            background-color: rgba(255, 255, 255, 0.15) !important;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-body-secondary">

    <div class="d-flex min-vh-100">
        @include('partials.admin.sidebar')

        <div class="flex-grow-1 d-flex flex-column">
            @include('partials.admin.topnav')

            {{-- ✅ FIX: bg-body class যোগ করা হয়েছে এবং fade-in সরানো হয়েছে --}}
            <main class="flex-grow-1 bg-body">
                @yield('content')
            </main>

            @include('partials.admin.footer')
        </div>
    </div>

    {{-- ✅ Mobile Sidebar Backdrop --}}
    <div id="sidebarBackdrop" class="sidebar-backdrop"
         onclick="document.getElementById('adminSidebar').classList.remove('show-mobile'); this.classList.remove('show');"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- ✅ Dark Mode Toggle Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const themeToggle = document.querySelector('[aria-label="Switch color theme"]');

            if (themeToggle) {
                const savedTheme = document.documentElement.getAttribute('data-bs-theme') || 'light';
                updateThemeIcon(savedTheme);

                themeToggle.addEventListener('click', function() {
                    const currentTheme = document.documentElement.getAttribute('data-bs-theme');
                    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

                    document.documentElement.setAttribute('data-bs-theme', newTheme);
                    localStorage.setItem('theme', newTheme);
                    updateThemeIcon(newTheme);
                });
            }

            function updateThemeIcon(theme) {
                if (!themeToggle) return;
                const icon = themeToggle.querySelector('i');
                if (icon) {
                    icon.className = theme === 'dark' ? 'bi bi-sun fs-5' : 'bi bi-moon-stars fs-5';
                }
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
