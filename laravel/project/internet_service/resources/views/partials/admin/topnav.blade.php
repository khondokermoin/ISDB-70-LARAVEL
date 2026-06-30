<nav class="navbar navbar-expand bg-white border-bottom shadow-sm">
    <div class="container-fluid px-3 px-lg-4">

        {{-- ===== Sidebar Toggle Button (Mobile) ===== --}}
        <button class="btn btn-light border-0 d-lg-none me-2" 
                type="button" 
                onclick="document.getElementById('adminSidebar').classList.toggle('d-none')"
                aria-controls="adminSidebar" 
                aria-expanded="true"
                aria-label="Toggle sidebar">
            <i class="bi bi-list fs-4"></i>
        </button>

        {{-- ===== Search Form ===== --}}
        <form class="d-none d-md-flex flex-grow-1 ms-2" role="search" style="max-width: 400px;">
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0">
                    <i class="bi bi-search text-muted"></i>
                </span>
                <input class="form-control bg-light border-start-0" 
                       type="search" 
                       placeholder="Search users, orders, reports"
                       aria-label="Search">
            </div>
        </form>

        {{-- ===== Right Actions ===== --}}
        <div class="d-flex align-items-center ms-auto gap-2">

            {{-- Theme Toggle --}}
            <button class="btn btn-light border-0 position-relative" 
                    type="button" 
                    aria-label="Switch color theme"
                    title="Switch color theme">
                <i class="bi bi-moon-stars fs-5"></i>
            </button>

            {{-- Notifications --}}
            <div class="dropdown">
                <button class="btn btn-light border-0 position-relative" 
                        type="button" 
                        data-bs-toggle="dropdown" 
                        aria-expanded="false"
                        aria-label="Notifications">
                    <i class="bi bi-bell fs-5"></i>
                    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger rounded-circle">
                        <span class="visually-hidden">New notifications</span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end shadow-sm" style="min-width: 300px;">
                    <h6 class="dropdown-header fw-bold text-uppercase small">Notifications</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item py-2" href="#">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <i class="bi bi-person-plus text-success me-2"></i>
                                <span class="fw-medium">New user registered</span>
                            </div>
                            <small class="text-muted">4m ago</small>
                        </div>
                    </a>
                    <a class="dropdown-item py-2" href="#">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <i class="bi bi-graph-up-arrow text-primary me-2"></i>
                                <span class="fw-medium">Revenue target reached</span>
                            </div>
                            <small class="text-muted">32m ago</small>
                        </div>
                    </a>
                    <a class="dropdown-item py-2" href="#">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <i class="bi bi-shield-check text-info me-2"></i>
                                <span class="fw-medium">Security review completed</span>
                            </div>
                            <small class="text-muted">1h ago</small>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-center text-primary small fw-medium" href="#">
                        View all notifications
                    </a>
                </div>
            </div>

            {{-- Profile Dropdown --}}
            <div class="dropdown">
                <button class="btn btn-light border-0 d-flex align-items-center gap-2" 
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
                <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                    <li>
                        <div class="dropdown-header">
                            <div class="fw-bold">Admin Hasan</div>
                            <small class="text-muted">admin@amarit.com</small>
                        </div>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class="bi bi-person me-2 text-muted"></i> Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class="bi bi-gear me-2 text-muted"></i> Account settings
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center text-danger" 
                           href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right me-2"></i> Sign out
                        </a>
                    </li>
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</nav>