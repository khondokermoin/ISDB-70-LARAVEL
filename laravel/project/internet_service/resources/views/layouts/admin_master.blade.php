<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Amar IT Admin Dashboard">
    <title>@yield('title', 'Dashboard') | Amar IT Admin</title>
    
    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    {{-- Your Custom CSS (যদি লাগে) --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    @stack('styles')
</head>

<body class="bg-light">

    {{-- ===== Main Wrapper (Flexbox Layout) ===== --}}
    <div class="d-flex min-vh-100">
        
        {{-- ===== Sidebar (Left Side) ===== --}}
        @include('partials.admin.sidebar')
        
        {{-- ===== Main Content Area (Right Side) ===== --}}
        <div class="flex-grow-1 d-flex flex-column">
            
            {{-- Top Navbar --}}
            @include('partials.admin.topnav')
            
            {{-- Page Content --}}
            <main class="flex-grow-1">
                @yield('content')
            </main>
            
            {{-- Footer (content এর পরে, scroll করে দেখা যাবে) --}}
            @include('partials.admin.footer')
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    {{-- Dark Mode Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const themeToggle = document.querySelector('[aria-label="Switch color theme"]');
            
            if (themeToggle) {
                const savedTheme = localStorage.getItem('theme') || 'light';
                document.documentElement.setAttribute('data-bs-theme', savedTheme);
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