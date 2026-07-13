<div class="sidenav-menu">

    <!-- Brand Logo -->
    <a href="{{ route('company.dashboard') }}" class="logo">
        <span class="logo-light">
            <span class="logo-lg"><img src="{{ asset('frontend_assets/images/logo.png') }}" alt="logo"></span>
            <span class="logo-sm"><img src="{{ asset('frontend_assets/images/logo-sm.png') }}" alt="small logo"></span>
        </span>
        <span class="logo-dark">
            <span class="logo-lg"><img src="{{ asset('frontend_assets/images/logo-dark.png') }}" alt="dark logo"></span>
            <span class="logo-sm"><img src="{{ asset('frontend_assets/images/logo-sm.png') }}" alt="small logo"></span>
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <button class="button-sm-hover">
        <i class="ti ti-circle align-middle"></i>
    </button>

    <!-- Full Sidebar Menu Close Button -->
    <button class="button-close-fullsidebar">
        <i class="ti ti-x align-middle"></i>
    </button>

    <div data-simplebar>

        <!--- Sidenav Menu -->
        <ul class="side-nav">
            <li class="side-nav-title">Company Panel</li>

            <!-- Dashboard -->
            <li class="side-nav-item">
                <a href="{{ route('company.dashboard') }}" class="side-nav-link {{ request()->routeIs('company.dashboard') ? 'active' : '' }}">
                    <span class="menu-icon"><i class="ti ti-dashboard"></i></span>
                    <span class="menu-text"> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-title mt-2">Branch & Staff</li>

            <!-- Branches -->
            <li class="side-nav-item">
                <a href="{{ route('company.branches.index') }}" class="side-nav-link {{ request()->routeIs('company.branches.*') ? 'active' : '' }}">
                    <span class="menu-icon"><i class="ti ti-building-store"></i></span>
                    <span class="menu-text"> Branches </span>
                </a>
            </li>

            <!-- Staff / Users -->
            <li class="side-nav-item">
                <a href="{{ route('company.users.index') }}" class="side-nav-link {{ request()->routeIs('company.users.*') ? 'active' : '' }}">
                    <span class="menu-icon"><i class="ti ti-users"></i></span>
                    <span class="menu-text"> Staff & Roles </span>
                </a>
            </li>

            <li class="side-nav-title mt-2">Inventory</li>

            <!-- Products & Categories -->
            @php
                $isInventoryActive = request()->routeIs('company.products.*') || request()->routeIs('company.categories.*');
            @endphp
            <li class="side-nav-item {{ $isInventoryActive ? 'menu-open' : '' }}">
                <a data-bs-toggle="collapse" href="#sidebarProducts" aria-expanded="{{ $isInventoryActive ? 'true' : 'false' }}" class="side-nav-link {{ $isInventoryActive ? 'active' : '' }}">
                    <span class="menu-icon"><i class="ti ti-package"></i></span>
                    <span class="menu-text"> Products </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse {{ $isInventoryActive ? 'show' : '' }}" id="sidebarProducts">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('company.products.index') }}" class="side-nav-link {{ request()->routeIs('company.products.*') ? 'active' : '' }}">
                                <span class="menu-text">All Products</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('company.products.create') }}" class="side-nav-link {{ request()->routeIs('company.products.create') ? 'active' : '' }}">
                                <span class="menu-text">Add Product</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('company.categories.index') }}" class="side-nav-link {{ request()->routeIs('company.categories.*') ? 'active' : '' }}">
                                <span class="menu-text">Categories</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title mt-2">Purchasing</li>

            <!-- Purchases & Suppliers -->
            @php
                $isPurchasingActive = request()->routeIs('company.purchases.*') || request()->routeIs('company.suppliers.*');
            @endphp
            <li class="side-nav-item {{ $isPurchasingActive ? 'menu-open' : '' }}">
                <a data-bs-toggle="collapse" href="#sidebarPurchasing" aria-expanded="{{ $isPurchasingActive ? 'true' : 'false' }}" class="side-nav-link {{ $isPurchasingActive ? 'active' : '' }}">
                    <span class="menu-icon"><i class="ti ti-shopping-cart"></i></span>
                    <span class="menu-text"> Purchasing </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse {{ $isPurchasingActive ? 'show' : '' }}" id="sidebarPurchasing">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('company.purchases.index') }}" class="side-nav-link {{ request()->routeIs('company.purchases.index') || request()->routeIs('company.purchases.show') ? 'active' : '' }}">
                                <span class="menu-text">All Purchases</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('company.purchases.create') }}" class="side-nav-link {{ request()->routeIs('company.purchases.create') ? 'active' : '' }}">
                                <span class="menu-text">New Purchase</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('company.suppliers.index') }}" class="side-nav-link {{ request()->routeIs('company.suppliers.*') ? 'active' : '' }}">
                                <span class="menu-text">Suppliers</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title mt-2">CRM & Finance</li>

            <!-- Customers -->
            <li class="side-nav-item">
                <a href="{{ route('company.customers.index') }}" class="side-nav-link {{ request()->routeIs('company.customers.*') ? 'active' : '' }}">
                    <span class="menu-icon"><i class="ti ti-address-book"></i></span>
                    <span class="menu-text"> Customers </span>
                </a>
            </li>

            <!-- Expenses -->
            <li class="side-nav-item">
                <a href="{{ route('company.expenses.index') }}" class="side-nav-link {{ request()->routeIs('company.expenses.*') ? 'active' : '' }}">
                    <span class="menu-icon"><i class="ti ti-receipt-2"></i></span>
                    <span class="menu-text"> Expenses </span>
                </a>
            </li>

            <li class="side-nav-title mt-2">Reports</li>

            <!-- Company Reports -->
            <li class="side-nav-item">
                <a href="{{ route('company.reports.sales') }}" class="side-nav-link {{ request()->routeIs('company.reports.sales') ? 'active' : '' }}">
                    <span class="menu-icon"><i class="ti ti-chart-bar"></i></span>
                    <span class="menu-text"> Sales Report </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('company.reports.stock') }}" class="side-nav-link {{ request()->routeIs('company.reports.stock') ? 'active' : '' }}">
                    <span class="menu-icon"><i class="ti ti-chart-pie"></i></span>
                    <span class="menu-text"> Stock Report </span>
                </a>
            </li>

            <li class="side-nav-title mt-2">Account</li>

            <!-- Profile -->
            <li class="side-nav-item">
                <a href="{{ route('profile.edit') }}" class="side-nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                    <span class="menu-icon"><i class="ti ti-user"></i></span>
                    <span class="menu-text"> My Profile </span>
                </a>
            </li>
        </ul>

    </div>
</div>