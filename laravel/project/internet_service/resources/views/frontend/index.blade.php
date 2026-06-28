@extends('layouts.frontend_master')

@section('title', 'Amar IT - #1 Broadband Internet Provider')

@section('content')

{{-- Hero Section --}}
<section class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-24 px-4 text-center">
    <div class="container mx-auto max-w-4xl">
        <h4 class="text-amberRed font-bold tracking-widest uppercase mb-2">Welcome To Amar IT</h4>
        <h1 class="text-5xl font-extrabold mb-6 leading-tight">#1 Broadband Internet Provider</h1>
        <p class="text-xl text-gray-300 mb-10">
            Experience super-fast, reliable, and uninterrupted internet connectivity for your home and business.
        </p>
        <div class="flex justify-center flex-wrap gap-4">
            <a href="#packages"
               class="bg-amberRed hover:bg-red-700 text-white font-bold py-3 px-8 rounded shadow-lg transition transform hover:-translate-y-1">
                View Our Packages
            </a>

            @auth
                {{-- route('dashboard') smart-redirects to role dashboard via web.php --}}
                <a href="{{ route('dashboard') }}"
                   class="bg-transparent border-2 border-white hover:bg-white hover:text-gray-900 text-white font-bold py-3 px-8 rounded shadow-lg transition transform hover:-translate-y-1">
                    <i class="fa fa-tachometer-alt mr-2"></i> Go to Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="bg-transparent border-2 border-white hover:bg-white hover:text-gray-900 text-white font-bold py-3 px-8 rounded shadow-lg transition transform hover:-translate-y-1">
                    <i class="fa fa-user-circle mr-2"></i> Client Login
                </a>
            @endauth
        </div>
    </div>
</section>

{{-- Bug Fix: "What We Do" section was completely missing from Blade version --}}
<section class="py-16 bg-white">
    <div class="container mx-auto max-w-6xl px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800">What We Do?</h2>
            <div class="w-16 h-1 bg-amberRed mx-auto mt-4"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div onclick="window.location.href='{{ route('corporate') }}';"
                 class="p-6 border border-gray-100 rounded-lg shadow-sm hover:shadow-md transition text-center cursor-pointer">
                <i class="fa fa-network-wired text-4xl text-amberRed mb-4"></i>
                <h3 class="text-xl font-bold mb-2">Corporate Internet</h3>
                <p class="text-gray-600 text-sm">Safe internet access services with various service level descriptions for corporate businesses.</p>
            </div>
            <div onclick="window.location.href='{{ route('home.internet') }}';"
                 class="p-6 border border-gray-100 rounded-lg shadow-sm hover:shadow-md transition text-center cursor-pointer">
                <i class="fa fa-home text-4xl text-amberRed mb-4"></i>
                <h3 class="text-xl font-bold mb-2">Home Internet</h3>
                <p class="text-gray-600 text-sm">Extensive range of high quality data & internet connectivity services throughout the country.</p>
            </div>
            <div class="p-6 border border-gray-100 rounded-lg shadow-sm hover:shadow-md transition text-center">
                <i class="fa fa-server text-4xl text-amberRed mb-4"></i>
                <h3 class="text-xl font-bold mb-2">Hosting & Dev</h3>
                <p class="text-gray-600 text-sm">Hosting & web development solutions for any business with high availability and consistency.</p>
            </div>
        </div>
    </div>
</section>

{{-- Packages Section --}}
<section id="packages" class="py-16 bg-gray-50">
    <div class="container mx-auto max-w-6xl px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800">Most Popular Packages</h2>
            <div class="w-16 h-1 bg-amberRed mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($packages as $package)
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden
                            transform transition duration-300 hover:scale-105 hover:border-amberRed">

                    <div class="p-6 text-center border-b border-gray-100">
                        <i class="fa fa-cloud text-5xl text-gray-300 mb-4"></i>
                        <h4 class="text-xl font-bold text-gray-800 uppercase tracking-wide">
                            {{ $package->name }}
                        </h4>
                        <div class="my-4">
                            <span class="text-sm font-semibold text-gray-500 align-top">BDT</span>
                            {{-- Fix: uses getPriceDisplayAttribute() accessor on model --}}
                            <span class="text-4xl font-extrabold text-amberRed">
                                {{ $package->price_display }}
                            </span>
                            <span class="text-gray-500">/mo</span>
                        </div>
                    </div>

                    <div class="p-6 bg-gray-50">
                        <ul class="space-y-3 text-gray-600 text-center mb-6">
                            {{-- Fix: accessors handle 0 and null edge cases cleanly --}}
                            <li>Speed: <span class="font-bold text-gray-800">{{ $package->speed_display }}</span></li>
                            <li>Quota: <span class="font-bold text-gray-800">{{ $package->quota_display }}</span></li>
                            <li>Duration: <span class="font-bold text-gray-800">{{ $package->duration_days }} Days</span></li>

                            @if(!empty($package->features))
                                <li>
                                    <span class="font-bold text-amberRed">{{ $package->features }}</span>
                                </li>
                            @endif

                            <li>24/7 Customer Support</li>
                            <li>Fiber Optics</li>
                        </ul>

                        {{-- Fix: null package_id guard prevents route crash --}}
                        @if($package->package_id)
                            <a href="{{ route('order.create', $package->package_id) }}"
                               class="block w-full text-center bg-gray-800 hover:bg-amberRed
                                      text-white font-semibold py-3 rounded transition duration-300">
                                Order Now <i class="fa fa-arrow-right ml-2"></i>
                            </a>
                        @endif
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-500 py-10">
                    No packages currently available.
                </p>
            @endforelse
        </div>
    </div>
</section>

@endsection