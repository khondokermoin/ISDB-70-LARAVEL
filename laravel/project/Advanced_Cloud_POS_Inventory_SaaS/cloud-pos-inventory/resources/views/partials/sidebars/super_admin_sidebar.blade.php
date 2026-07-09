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
            <li class="side-nav-title">Navigation</li>

            <!-- Dashboard -->
            <li class="side-nav-item">
                <a href="{{ route('superadmin.dashboard') }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-dashboard"></i></span>
                    <span class="menu-text"> Platform Dashboard </span>
                </a>
            </li>

            <li class="side-nav-title mt-2">SaaS Management</li>

            <!-- Tenants / Stores -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarTenants" aria-expanded="false" aria-controls="sidebarTenants"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-building-store"></i></span>
                    <span class="menu-text"> Tenants / Stores </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarTenants">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.tenants.index') }}" class="side-nav-link">
                                <span class="menu-text">All Tenants</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.tenants.create') }}" class="side-nav-link">
                                <span class="menu-text">Create Tenant</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.tenants.suspended') }}" class="side-nav-link">
                                <span class="menu-text">Suspended Tenants</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Subscriptions & Plans -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarSubscriptions" aria-expanded="false"
                    aria-controls="sidebarSubscriptions" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-crown"></i></span>
                    <span class="menu-text"> Subscriptions & Plans </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarSubscriptions">
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

            <li class="side-nav-title mt-2">Core Modules (Global)</li>

            <!-- Sales & POS -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarSales" aria-expanded="false" aria-controls="sidebarSales"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-shopping-cart"></i></span>
                    <span class="menu-text"> Sales & POS </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarSales">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.pos.index') }}" class="side-nav-link">
                                <span class="menu-text">Global POS</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.invoices.index') }}" class="side-nav-link">
                                <span class="menu-text">All Invoices</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.quotations.index') }}" class="side-nav-link">
                                <span class="menu-text">Quotations</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.returns.index') }}" class="side-nav-link">
                                <span class="menu-text">Returns</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Inventory -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarInventory" aria-expanded="false"
                    aria-controls="sidebarInventory" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-packages"></i></span>
                    <span class="menu-text"> Inventory </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarInventory">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.products.index') }}" class="side-nav-link">
                                <span class="menu-text">Products / Items</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.categories.index') }}" class="side-nav-link">
                                <span class="menu-text">Categories</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.inventory.index') }}" class="side-nav-link">
                                <span class="menu-text">Stock Management</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.barcode.index') }}" class="side-nav-link">
                                <span class="menu-text">Barcode Printing</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Purchases -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPurchases" aria-expanded="false"
                    aria-controls="sidebarPurchases" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-truck-delivery"></i></span>
                    <span class="menu-text"> Purchases </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPurchases">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.purchases.index') }}" class="side-nav-link">
                                <span class="menu-text">Purchase Orders</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.suppliers.index') }}" class="side-nav-link">
                                <span class="menu-text">Suppliers</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Accounting -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarAccounting" aria-expanded="false"
                    aria-controls="sidebarAccounting" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-calculator"></i></span>
                    <span class="menu-text"> Accounting </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarAccounting">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.expenses.index') }}" class="side-nav-link">
                                <span class="menu-text">Expenses</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.cashbook.index') }}" class="side-nav-link">
                                <span class="menu-text">Cash Book</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- People & HR -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPeople" aria-expanded="false"
                    aria-controls="sidebarPeople" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-users"></i></span>
                    <span class="menu-text"> People & HR </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPeople">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.customers.index') }}" class="side-nav-link">
                                <span class="menu-text">Customers</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.employees.index') }}" class="side-nav-link">
                                <span class="menu-text">Employees</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.payroll.index') }}" class="side-nav-link">
                                <span class="menu-text">Payroll</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title mt-2">Administration</li>

            <!-- Platform Users -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPlatformUsers" aria-expanded="false"
                    aria-controls="sidebarPlatformUsers" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-user-cog"></i></span>
                    <span class="menu-text"> Platform Users </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPlatformUsers">
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
                <a data-bs-toggle="collapse" href="#sidebarSettings" aria-expanded="false"
                    aria-controls="sidebarSettings" class="side-nav-link">
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
                            <a href="{{ route('superadmin.settings.payment-gateways') }}" class="side-nav-link">
                                <span class="menu-text">Payment Gateways</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.settings.email-sms') }}" class="side-nav-link">
                                <span class="menu-text">Email & SMS</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.settings.localization') }}" class="side-nav-link">
                                <span class="menu-text">Localization</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- System & Security -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarSystem" aria-expanded="false"
                    aria-controls="sidebarSystem" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-server"></i></span>
                    <span class="menu-text"> System & Security </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarSystem">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.logs.index') }}" class="side-nav-link">
                                <span class="menu-text">Activity Logs</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.backup.index') }}" class="side-nav-link">
                                <span class="menu-text">Database Backup</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.system-info') }}" class="side-nav-link">
                                <span class="menu-text">System Info</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.update') }}" class="side-nav-link">
                                <span class="menu-text">Update Application</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title mt-2">Reports</li>

            <!-- Analytics & Reports -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarReports" aria-expanded="false"
                    aria-controls="sidebarReports" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-chart-bar"></i></span>
                    <span class="menu-text"> Analytics & Reports </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarReports">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.reports.revenue') }}" class="side-nav-link">
                                <span class="menu-text">SaaS Revenue</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.reports.tenants') }}" class="side-nav-link">
                                <span class="menu-text">Tenant Growth</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.reports.global-sales') }}" class="side-nav-link">
                                <span class="menu-text">Global Sales</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title mt-2">Account</li>

            <!-- Profile -->
            <li class="side-nav-item">
                <a href="{{ route('superadmin.profile') }}" class="side-nav-link">
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
