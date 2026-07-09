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

            <!-- নতুন সেকশন: Global Master Data -->
            <li class="side-nav-title mt-2">Global Master Data</li>

            <!-- Business Types (Industry Setup) -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarBusinessTypes" aria-expanded="false"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-briefcase"></i></span>
                    <span class="menu-text"> Business Types </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarBusinessTypes">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.business-types.index') }}" class="side-nav-link">
                                <span class="menu-text">Industry Types</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.business-modules.index') }}" class="side-nav-link">
                                <span class="menu-text">Module Mapping</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Global Items & Inventory Setup -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarGlobalItems" aria-expanded="false" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-package"></i></span>
                    <span class="menu-text"> Global Inventory Setup </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarGlobalItems">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.global-categories.index') }}" class="side-nav-link">
                                <span class="menu-text">Categories</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.global-units.index') }}" class="side-nav-link">
                                <span class="menu-text">Units (UOM)</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.global-taxes.index') }}" class="side-nav-link">
                                <span class="menu-text">Taxes & VAT</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.global-attributes.index') }}" class="side-nav-link">
                                <span class="menu-text">Attributes (Color/Size)</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- নতুন সেকশন: POS & Customization -->
            <li class="side-nav-title mt-2">POS & Customization</li>

            <!-- Receipt & Print Settings -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPrintSettings" aria-expanded="false"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-receipt"></i></span>
                    <span class="menu-text"> Receipt & Print </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPrintSettings">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.invoice-templates.index') }}" class="side-nav-link">
                                <span class="menu-text">Invoice Templates</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.barcode-settings.index') }}" class="side-nav-link">
                                <span class="menu-text">Barcode Settings</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.email-templates.index') }}" class="side-nav-link">
                                <span class="menu-text">Email Templates</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Add-ons / Feature Toggles -->
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarAddons" aria-expanded="false" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-puzzle"></i></span>
                    <span class="menu-text"> Add-ons & Modules </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarAddons">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.addons.index') }}" class="side-nav-link">
                                <span class="menu-text">Installed Add-ons</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.addons.marketplace') }}" class="side-nav-link">
                                <span class="menu-text">Marketplace</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- নতুন সেকশন: Helpdesk & Support -->
            <li class="side-nav-title mt-2">Helpdesk & Support</li>

            <li class="side-nav-item">
                <a href="{{ route('superadmin.support-tickets.index') }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-lifebuoy"></i></span>
                    <span class="menu-text"> Support Tickets </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('superadmin.tenants.index') }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-login"></i></span>
                    <span class="menu-text"> Login As Tenant (Impersonate) </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('superadmin.announcements.index') }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-megaphone"></i></span>
                    <span class="menu-text"> Announcements </span>
                </a>
            </li>

            <!-- নতুন সেকশন: Global Reports -->
            <li class="side-nav-title mt-2">Global Reports</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarGlobalReports" aria-expanded="false"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-chart-bar"></i></span>
                    <span class="menu-text"> Analytics </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarGlobalReports">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.reports.revenue') }}" class="side-nav-link">
                                <span class="menu-text">SaaS Revenue</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('superadmin.reports.tenant-usage') }}" class="side-nav-link">
                                <span class="menu-text">Tenant Usage</span>
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
