{{-- ✅ Navbar Custom Styles (Fully Fixed for Bootstrap 5.3) --}}
<style>
    /* ========================================
       1. STICKY TOP NAVBAR
       ======================================== */
    .top-navbar {
        position: sticky !important;
        top: 0;
        z-index: 1030;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }

    /* ========================================
       2. NAVBAR BUTTONS HOVER EFFECT
       ======================================== */
    .top-navbar .btn.bg-body-tertiary {
        transition: all 0.25s ease !important;
        border: 1px solid transparent !important;
    }

    .top-navbar .btn.bg-body-tertiary:hover,
    .top-navbar .btn.bg-body-tertiary:focus,
    .top-navbar .btn.bg-body-tertiary:active {
        background-color: rgba(220, 53, 69, 0.1) !important;
        color: #dc3545 !important;
        transform: translateY(-2px);
        border-color: rgba(220, 53, 69, 0.2) !important;
    }

    /* ========================================
       3. SEARCH BAR - FIXED
       ======================================== */
    .top-navbar .input-group .form-control,
    .top-navbar .input-group .input-group-text {
        background-color: var(--bs-tertiary-bg) !important;
        border-color: var(--bs-border-color) !important;
        color: var(--bs-body-color) !important;
    }

    .top-navbar .input-group .form-control::placeholder {
        color: var(--bs-secondary-color) !important;
        opacity: 0.7;
    }

    .top-navbar .input-group .form-control:focus {
        background-color: var(--bs-body-bg) !important;
        border-color: rgba(220, 53, 69, 0.5) !important;
        box-shadow: 0 0 0 0.15rem rgba(220, 53, 69, 0.15) !important;
        color: var(--bs-body-color) !important;
    }

    .top-navbar .input-group:focus-within .input-group-text {
        border-color: rgba(220, 53, 69, 0.5) !important;
        color: #dc3545 !important;
        background-color: rgba(220, 53, 69, 0.05) !important;
    }

    /* ========================================
       4. DROPDOWN MENU - FULLY FIXED
       ======================================== */
    .top-navbar .dropdown-menu {
        /* ✅ Bootstrap 5.3 Variables Override */
        --bs-dropdown-bg: var(--bs-body-bg) !important;
        --bs-dropdown-color: var(--bs-body-color) !important;
        --bs-dropdown-border-color: var(--bs-border-color) !important;
        --bs-dropdown-link-color: var(--bs-body-color) !important;
        --bs-dropdown-link-hover-bg: rgba(220, 53, 69, 0.1) !important;
        --bs-dropdown-link-hover-color: #dc3545 !important;
        --bs-dropdown-link-active-bg: #dc3545 !important;
        --bs-dropdown-link-active-color: #fff !important;
        --bs-dropdown-header-color: var(--bs-secondary-color) !important;

        border: 1px solid var(--bs-border-color) !important;
        border-radius: 0.75rem !important;
        padding: 0.5rem !important;
        box-shadow: 0 10px 40px rgba(0,0,0,0.15) !important;
        margin-top: 0.5rem !important;
    }

    /* Dark Mode Dropdown Shadow */
    [data-bs-theme="dark"] .top-navbar .dropdown-menu {
        box-shadow: 0 10px 40px rgba(0,0,0,0.6) !important;
        background-color: #1a1d21 !important;
    }

    /* Dropdown Items */
    .top-navbar .dropdown-item {
        transition: all 0.2s ease !important;
        border-radius: 0.5rem !important;
        margin-bottom: 0.25rem !important;
        padding: 0.75rem 1rem !important;
        color: var(--bs-body-color) !important;
    }

    .top-navbar .dropdown-item:hover {
        background-color: rgba(220, 53, 69, 0.1) !important;
        color: #dc3545 !important;
        transform: translateX(3px);
    }

    /* Dropdown Item Inner Text - FIXED */
    .top-navbar .dropdown-item .fw-medium,
    .top-navbar .dropdown-item span.fw-medium {
        color: var(--bs-body-color) !important;
        font-weight: 500 !important;
    }

    .top-navbar .dropdown-item small,
    .top-navbar .dropdown-item .text-muted {
        color: var(--bs-secondary-color) !important;
        font-size: 0.75rem !important;
    }

    /* Dropdown Header */
    .top-navbar .dropdown-header {
        color: var(--bs-secondary-color) !important;
        font-size: 0.75rem !important;
        letter-spacing: 0.5px !important;
        padding: 0.75rem 1rem !important;
    }

    /* User Profile Dropdown Header */
    .top-navbar .dropdown-header .fw-bold {
        color: var(--bs-body-color) !important;
        font-size: 0.95rem !important;
    }

    .top-navbar .dropdown-header small {
        color: var(--bs-secondary-color) !important;
    }

    /* Sign Out Button Special Style */
    .top-navbar .dropdown-item.text-danger {
        color: #dc3545 !important;
    }

    .top-navbar .dropdown-item.text-danger:hover {
        background-color: #dc3545 !important;
        color: #fff !important;
    }

    .top-navbar .dropdown-item.text-danger:hover i {
        color: #fff !important;
    }

    /* ========================================
       5. NOTIFICATION BADGE PULSE
       ======================================== */
    .top-navbar .badge-pulse {
        animation: pulse-ring 2s infinite;
    }

    @keyframes pulse-ring {
        0% { box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.7); }
        70% { box-shadow: 0 0 0 8px rgba(220, 53, 69, 0); }
        100% { box-shadow: 0 0 0 0 rgba(220, 53, 69, 0); }
    }

    /* ========================================
       6. DARK MODE SPECIFIC FIXES
       ======================================== */
    [data-bs-theme="dark"] .top-navbar {
        background-color: rgba(26, 29, 33, 0.95) !important;
        border-bottom-color: rgba(255, 255, 255, 0.1) !important;
    }

    [data-bs-theme="dark"] .top-navbar .btn.bg-body-tertiary {
        background-color: rgba(255, 255, 255, 0.05) !important;
    }

    [data-bs-theme="dark"] .top-navbar .btn.bg-body-tertiary:hover {
        background-color: rgba(220, 53, 69, 0.15) !important;
    }
</style>

{{-- ✅ Top Navbar --}}
<nav class="shadow-sm navbar navbar-expand bg-body border-bottom top-navbar">
    <div class="px-3 container-fluid px-lg-4">

        {{-- ✅ Mobile Toggle Button --}}
        <button class="border-0 btn bg-body-tertiary d-lg-none me-2"
                type="button"
                onclick="document.getElementById('adminSidebar').classList.toggle('show-mobile'); document.getElementById('sidebarBackdrop')?.classList.toggle('show');"
                aria-controls="adminSidebar"
                aria-expanded="true"
                aria-label="Toggle sidebar">
            <i class="bi bi-list fs-4"></i>
        </button>

        {{-- Search Form --}}
        <form class="d-none d-md-flex flex-grow-1 ms-2" role="search" style="max-width: 400px;">
            <div class="input-group">
                <span class="input-group-text bg-body-tertiary border-end-0">
                    <i class="bi bi-search"></i>
                </span>
                <input class="form-control bg-body-tertiary border-start-0"
                       type="search"
                       placeholder="Search users, orders, reports..."
                       aria-label="Search">
            </div>
        </form>

        <div class="gap-2 d-flex align-items-center ms-auto">
            {{-- Theme Toggle --}}
            <button class="border-0 btn bg-body-tertiary position-relative"
                    type="button"
                    aria-label="Switch color theme"
                    title="Switch color theme">
                <i class="bi bi-moon-stars fs-5"></i>
            </button>

            {{-- Notifications Dropdown --}}
            <div class="dropdown">
                <button class="border-0 btn bg-body-tertiary position-relative"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        aria-label="Notifications">
                    <i class="bi bi-bell fs-5"></i>
                    <span class="top-0 p-1 position-absolute start-100 translate-middle bg-danger rounded-circle badge-pulse">
                        <span class="visually-hidden">New notifications</span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end" style="min-width: 320px;">
                    <h6 class="dropdown-header fw-bold text-uppercase">Notifications</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <i class="bi bi-person-plus text-success me-2"></i>
                                <span class="fw-medium">New user registered</span>
                            </div>
                            <small class="text-muted">4m ago</small>
                        </div>
                    </a>
                    <a class="dropdown-item" href="#">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <i class="bi bi-graph-up-arrow text-primary me-2"></i>
                                <span class="fw-medium">Revenue target reached</span>
                            </div>
                            <small class="text-muted">32m ago</small>
                        </div>
                    </a>
                    <a class="dropdown-item" href="#">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <i class="bi bi-shield-check text-info me-2"></i>
                                <span class="fw-medium">Security review completed</span>
                            </div>
                            <small class="text-muted">1h ago</small>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="text-center dropdown-item text-primary small fw-medium" href="#">
                        View all notifications
                    </a>
                </div>
            </div>

            {{-- User Profile Dropdown --}}
            <div class="dropdown">
                <button class="gap-2 border-0 btn bg-body-tertiary d-flex align-items-center"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                    <img class="rounded-circle"
                         src="https://ui-avatars.com/api/?name=Admin+Hasan&background=dc3545&color=fff&size=40"
                         alt="Admin Hasan"
                         width="32"
                         height="32">
                    <span class="d-none d-sm-inline fw-medium">Admin Hasan</span>
                    <i class="bi bi-chevron-down small d-none d-sm-inline"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" style="min-width: 220px;">
                    <li>
                        <div class="dropdown-header">
                            <div class="fw-bold">Admin Hasan</div>
                            <small>admin@amarit.com</small>
                        </div>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="bi bi-person me-2 text-muted"></i> Profile</a></li>
                    <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="bi bi-gear me-2 text-muted"></i> Account settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center text-danger"
                           href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form-topnav').submit();">
                            <i class="bi bi-box-arrow-right me-2"></i> Sign out
                        </a>
                    </li>
                </ul>
            </div>

            {{-- ✅ Logout Form --}}
            <form id="logout-form-topnav" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</nav>
