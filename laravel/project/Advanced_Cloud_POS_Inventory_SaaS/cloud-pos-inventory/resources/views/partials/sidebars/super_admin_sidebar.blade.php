<div class="sidenav-menu">

    <!-- Brand Logo -->
    <a href="{{ route('superadmin.dashboard') }}" class="logo">
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
            <li class="side-nav-title">Super Admin Panel</li>

            <!-- Dashboard -->
            <li class="side-nav-item">
                <a href="{{ route('superadmin.dashboard') }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-dashboard"></i></span>
                    <span class="menu-text"> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-title mt-2">SaaS Management</li>

            <!-- Companies / Tenants -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarCompanies" aria-expanded="false" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-building-store"></i></span>
                    <span class="menu-text"> Companies / Tenants </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarCompanies">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.companies.index') }}" class="side-nav-link">
                                <span class="menu-text">All Companies</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.companies.create') }}" class="side-nav-link">
                                <span class="menu-text">Add Company</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Plans & Subscriptions -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPlans" aria-expanded="false" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-crown"></i></span>
                    <span class="menu-text"> Plans & Subscriptions </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPlans">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.plans.index') }}" class="side-nav-link">
                                <span class="menu-text">Pricing Plans</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.subscriptions.index') }}" class="side-nav-link">
                                <span class="menu-text">Active Subscriptions</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.transactions.index') }}" class="side-nav-link">
                                <span class="menu-text">Payment Transactions</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title mt-2">Platform Administration</li>

            <!-- Platform Users & Roles -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarUsers" aria-expanded="false" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-users"></i></span>
                    <span class="menu-text"> Platform Users & Roles </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarUsers">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.users.index') }}" class="side-nav-link">
                                <span class="menu-text">Admin Staff</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.roles.index') }}" class="side-nav-link">
                                <span class="menu-text">Roles & Permissions</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Global Settings -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarSettings" aria-expanded="false" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-settings"></i></span>
                    <span class="menu-text"> Global Settings </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarSettings">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.settings.general') }}" class="side-nav-link">
                                <span class="menu-text">General Setup</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.settings.payment') }}" class="side-nav-link">
                                <span class="menu-text">Payment Gateways</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.settings.email') }}" class="side-nav-link">
                                <span class="menu-text">Email & SMS</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- System & Security -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarSystem" aria-expanded="false" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-server"></i></span>
                    <span class="menu-text"> System & Security </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarSystem">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.system.logs') }}" class="side-nav-link">
                                <span class="menu-text">Activity Logs</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.system.backup') }}" class="side-nav-link">
                                <span class="menu-text">Database Backup</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.system.info') }}" class="side-nav-link">
                                <span class="menu-text">System Info</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title mt-2">Account</li>

            <!-- Profile -->
            <li class="side-nav-item">
                <a href="{{ route('profile.edit') }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-user"></i></span>
                    <span class="menu-text"> My Profile </span>
                </a>
            </li>

            <!-- Logout -->
            <li class="side-nav-item">
                <a href="{{ route('logout') }}" class="side-nav-link"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="menu-icon"><i class="ti ti-logout"></i></span>
                    <span class="menu-text"> Logout </span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

        </ul>

        <!-- Help Box -->
        <div class="help-box text-center">
            <h5 class="fw-semibold fs-16">Super Admin Panel</h5>
            <p class="mb-3 text-muted">Manage your SaaS platform, tenants, and global settings.</p>
            <a href="{{ route('superadmin.dashboard') }}" class="btn btn-primary btn-sm">Go to Dashboard</a>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
