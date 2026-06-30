<style>
    /* ✅ Sidebar Navigation Hover Effects */
    #adminSidebar .nav-link {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    /* Normal links hover effect */
    #adminSidebar .nav-link:not(.bg-danger):hover {
        background-color: rgba(220, 53, 69, 0.1);
        color: #dc3545 !important;
        transform: translateX(4px);
    }

    /* Active link hover effect */
    #adminSidebar .nav-link.bg-danger:hover {
        background-color: #bb2d3b !important;
        box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3) !important;
        transform: translateX(4px);
    }

    /* Icon animation on hover */
    #adminSidebar .nav-link:hover i {
        transform: scale(1.15);
        transition: transform 0.3s ease;
    }

    /* Logout button hover effect */
    #adminSidebar .link-danger:hover {
        background-color: #dc3545 !important;
        color: white !important;
        transform: translateX(4px);
    }

    /* Brand logo hover effect */
    #adminSidebar .text-center a:hover span:first-child {
        transform: scale(1.05);
        transition: transform 0.3s ease;
    }
</style>

<aside class="d-flex flex-column bg-body border-end shadow-sm"
       style="width: 260px; min-width: 260px; position: sticky; top: 0; height: 100vh;"
       id="adminSidebar"
       aria-label="Main navigation">

    <div class="text-center border-bottom py-3 px-2">
        <a class="text-decoration-none d-block" href="{{ url('/') }}" aria-label="Amar IT dashboard">
            <span class="d-block fw-bolder fs-2" style="letter-spacing: -0.025em; line-height: 1; transition: transform 0.3s ease;">
                <span class="text-danger">AMAR</span>
                <span class="text-body">IT</span>
            </span>
            <small class="d-block text-muted text-uppercase fw-semibold mt-1"
                   style="letter-spacing: 1.5px; font-size: 0.7rem;">
                Admin Panel
            </small>
        </a>
    </div>

    <nav class="nav flex-column flex-grow-1 overflow-auto py-2 px-2">
        <a class="nav-link d-flex align-items-center rounded-3 px-3 py-2 mb-1 fw-medium
                  {{ Route::is('admin.dashboard') ? 'bg-danger text-white shadow-sm' : 'text-body' }}"
           href="{{ route('admin.dashboard') }}">
            <i class="bi bi-speedometer2 me-2 fs-5"></i>
            <span>Dashboard</span>
        </a>

        <div class="text-uppercase text-muted fw-bold px-3 mt-4 mb-2"
             style="font-size: 0.7rem; letter-spacing: 1.2px;">
            Manage Internet
        </div>

        <a class="nav-link d-flex align-items-center rounded-3 px-3 py-2 mb-1 fw-medium
                  {{ Route::is('admin.packages.index') ? 'bg-danger text-white shadow-sm' : 'text-body' }}"
           href="{{ route('admin.packages.index') }}">
            <i class="bi bi-box-seam me-2 fs-5"></i>
            <span>All Packages</span>
        </a>

        <a class="nav-link d-flex align-items-center rounded-3 px-3 py-2 mb-1 fw-medium
                  {{ Route::is('admin.packages.create') ? 'bg-danger text-white shadow-sm' : 'text-body' }}"
           href="{{ route('admin.packages.create') }}">
            <i class="bi bi-plus-square-dotted me-2 fs-5"></i>
            <span>Add New Package</span>
        </a>
    </nav>

    <div class="border-top p-2 mt-auto">
        <a class="nav-link d-flex align-items-center rounded-3 px-3 py-2 fw-semibold link-danger"
           href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();">
            <i class="bi bi-box-arrow-right me-2 fs-5"></i>
            <span>Logout</span>
        </a>
        <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</aside>
