<div class="sidenav-menu">

    <!-- Brand Logo -->
    <a href="{{ route('branch.dashboard') }}" class="logo">
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
            <li class="side-nav-title">Branch Panel</li>

            <!-- Dashboard -->
            <li class="side-nav-item">
                <a href="{{ route('branch.dashboard') }}" class="side-nav-link {{ request()->routeIs('branch.dashboard') ? 'active' : '' }}">
                    <span class="menu-icon"><i class="ti ti-dashboard"></i></span>
                    <span class="menu-text"> Dashboard </span>
                </a>
            </li>

            <!-- POS Terminal: this is the primary daily-use screen for Manager/Salesman,
                 so it sits as a flat top-level item (no collapse) for one-click access -->
            <li class="side-nav-item">
                <a href="{{ route('branch.pos.index') }}" class="side-nav-link {{ request()->routeIs('branch.pos.*') ? 'active' : '' }}">
                    <span class="menu-icon"><i class="ti ti-cash-register"></i></span>
                    <span class="menu-text"> POS Terminal </span>
                </a>
            </li>

            <li class="side-nav-title mt-2">Stock</li>

            <!-- Inventory -->
            <li class="side-nav-item">
                <a href="{{ route('branch.inventory.index') }}" class="side-nav-link {{ request()->routeIs('branch.inventory.*') ? 'active' : '' }}">
                    <span class="menu-icon"><i class="ti ti-package"></i></span>
                    <span class="menu-text"> Inventory </span>
                </a>
            </li>

            <li class="side-nav-title mt-2">Sales</li>

            <!-- Sales History -->
            <li class="side-nav-item">
                <a href="{{ route('branch.sales.index') }}" class="side-nav-link {{ request()->routeIs('branch.sales.*') ? 'active' : '' }}">
                    <span class="menu-icon"><i class="ti ti-receipt"></i></span>
                    <span class="menu-text"> Sales History </span>
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