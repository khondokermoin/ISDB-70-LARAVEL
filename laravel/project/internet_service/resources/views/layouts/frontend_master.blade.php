<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Amar IT - Internet Provider')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        amberRed:  '#dc2626',
                        amberDark: '#111827',
                    }
                }
            }
        }
    </script>

    <style>
        .nav-item { position: relative; padding-bottom: 4px; }
        .nav-item::after {
            content: ''; position: absolute;
            left: 50%; bottom: 0;
            width: 0; height: 2px;
            background: #dc2626;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        .nav-item:hover::after,
        .nav-item.active::after { width: 100%; }
    </style>

    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased">

    @include('partials.frontend.header')
    <main>@yield('content')</main>
    @include('partials.frontend.footer')

    @stack('scripts')
</body>
</html>