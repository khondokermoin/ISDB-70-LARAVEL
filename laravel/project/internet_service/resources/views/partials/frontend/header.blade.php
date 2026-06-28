{{-- Top Bar (was in PHP version, missing from Blade) --}}
<div class="bg-amberDark text-gray-300 text-xs md:text-sm hidden md:block py-2">
    <div class="container mx-auto px-4 flex justify-between items-center max-w-6xl">
        <div class="flex space-x-6 items-center">
            <span class="font-semibold text-white">Welcome to Amar IT</span>
            <span><i class="fa fa-phone text-amberRed mr-1"></i> 09611123123</span>
            <span><i class="fa fa-envelope text-amberRed mr-1"></i> support@amarit.com.bd</span>
        </div>
        <div class="flex space-x-4 items-center">
            <a href="#" class="hover:text-white transition">BTRC Approved Tariff</a>
            <a href="#" class="hover:text-white transition">Blog</a>
            <div class="flex space-x-3 text-lg">
                <a href="#" class="hover:text-blue-500 transition"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" class="hover:text-red-500 transition"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
    </div>
</div>

<header class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center max-w-6xl">

        {{-- Logo --}}
        <a href="{{ route('home') }}" class="text-3xl font-extrabold text-amberRed tracking-tight">
            AMAR <span class="text-gray-800">IT</span>
        </a>

        {{-- Desktop Nav --}}
        <nav class="hidden md:flex space-x-6 font-semibold text-gray-600 items-center">
            <a href="{{ route('home.internet') }}"
               class="nav-item hover:text-amberRed transition {{ request()->routeIs('home.internet') ? 'active text-amberRed' : '' }}">
                Home Internet
            </a>
            <a href="{{ route('corporate') }}"
               class="nav-item hover:text-amberRed transition {{ request()->routeIs('corporate') ? 'active text-amberRed' : '' }}">
                Corporate
            </a>
            <a href="{{ route('coverage') }}"
               class="nav-item hover:text-amberRed transition {{ request()->routeIs('coverage') ? 'active text-amberRed' : '' }}">
                Coverage
            </a>
            <a href="{{ route('iptsp') }}"
               class="nav-item hover:text-amberRed transition {{ request()->routeIs('iptsp') ? 'active text-amberRed' : '' }}">
                IPTSP
            </a>
            <a href="{{ route('hosting') }}"
               class="nav-item hover:text-amberRed transition {{ request()->routeIs('hosting') ? 'active text-amberRed' : '' }}">
                Hosting
            </a>
            <a href="{{ route('support') }}"
               class="nav-item hover:text-amberRed transition {{ request()->routeIs('support') ? 'active text-amberRed' : '' }}">
                Support
            </a>

            {{-- Bug Fix: route('dashboard') → smart redirects to role dashboard via web.php --}}
            @auth
                <a href="{{ route('dashboard') }}"
                   class="bg-amberRed text-white px-5 py-2 rounded-full hover:bg-red-700 transition shadow-md">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="bg-gray-800 text-white px-5 py-2 rounded-full hover:bg-amberRed transition shadow-md">
                    <i class="fa fa-user mr-2"></i> Login
                </a>
            @endauth
        </nav>

        {{-- Mobile Toggle Button --}}
        <button id="mobile-menu-btn" class="md:hidden text-gray-600 hover:text-amberRed focus:outline-none transition">
            <i id="mobile-icon" class="fa fa-bars text-2xl"></i>
        </button>
    </div>

    {{-- Bug Fix: Mobile menu HTML was missing — restored from PHP version --}}
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 shadow-lg absolute w-full left-0">
        <nav class="flex flex-col font-semibold text-gray-600 p-4 space-y-4">
            <a href="{{ route('home.internet') }}"
               class="hover:text-amberRed transition block {{ request()->routeIs('home.internet') ? 'text-amberRed' : '' }}">
                <i class="fa fa-wifi w-6 text-center mr-2"></i>Home Internet
            </a>
            <a href="{{ route('corporate') }}"
               class="hover:text-amberRed transition block {{ request()->routeIs('corporate') ? 'text-amberRed' : '' }}">
                <i class="fa fa-building w-6 text-center mr-2"></i>Corporate
            </a>
            <a href="{{ route('coverage') }}"
               class="hover:text-amberRed transition block {{ request()->routeIs('coverage') ? 'text-amberRed' : '' }}">
                <i class="fa fa-map-marked-alt w-6 text-center mr-2"></i>Coverage
            </a>
            <a href="{{ route('iptsp') }}"
               class="hover:text-amberRed transition block {{ request()->routeIs('iptsp') ? 'text-amberRed' : '' }}">
                <i class="fa fa-globe w-6 text-center mr-2"></i>IPTSP
            </a>
            <a href="{{ route('hosting') }}"
               class="hover:text-amberRed transition block {{ request()->routeIs('hosting') ? 'text-amberRed' : '' }}">
                <i class="fa fa-server w-6 text-center mr-2"></i>Hosting
            </a>
            <a href="{{ route('support') }}"
               class="hover:text-amberRed transition block {{ request()->routeIs('support') ? 'text-amberRed' : '' }}">
                <i class="fa fa-headset w-6 text-center mr-2"></i>Support
            </a>

            <div class="border-t border-gray-200 pt-4">
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="block text-center bg-amberRed text-white px-5 py-3 rounded-lg hover:bg-red-700 transition shadow-md">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="block text-center bg-gray-800 text-white px-5 py-3 rounded-lg hover:bg-amberRed transition shadow-md">
                        <i class="fa fa-user mr-2"></i> Login / Register
                    </a>
                @endauth
            </div>
        </nav>
    </div>
</header>

{{-- Mobile Menu Script --}}
<script>
    const btn  = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');
    const icon = document.getElementById('mobile-icon');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        if (menu.classList.contains('hidden')) {
            icon.classList.replace('fa-times', 'fa-bars');
        } else {
            icon.classList.replace('fa-bars', 'fa-times');
        }
    });
</script>