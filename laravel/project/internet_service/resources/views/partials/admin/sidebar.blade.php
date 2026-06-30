<aside class="d-flex flex-column bg-white border-end shadow-sm" 
       style="width: 260px; min-width: 260px; position: sticky; top: 0; height: 100vh;"
       id="adminSidebar" 
       aria-label="Main navigation">

    {{-- ===== Header / Brand ===== --}}
    <div class="text-center border-bottom py-3 px-2">
        <a class="text-decoration-none d-block" href="{{ url('/') }}" aria-label="Amar IT dashboard">
            <span class="d-block fw-bolder fs-2" style="letter-spacing: -0.025em; line-height: 1;">
                <span class="text-danger">AMAR</span>
                <span class="text-dark">IT</span>
            </span>
            <small class="d-block text-muted text-uppercase fw-semibold mt-1" 
                   style="letter-spacing: 1.5px; font-size: 0.7rem;">
                Admin Panel
            </small>
        </a>
    </div>

    {{-- ===== Main Navigation ===== --}}
    <nav class="nav flex-column flex-grow-1 overflow-auto py-2 px-2">

        {{-- Dashboard --}}
        <a class="nav-link d-flex align-items-center rounded-3 px-3 py-2 mb-1 fw-medium
                  {{ Route::is('admin.dashboard') ? 'bg-danger text-white shadow-sm' : 'link-dark' }}"
           href="{{ route('admin.dashboard') }}">
            <i class="bi bi-speedometer2 me-2 fs-5"></i>
            <span>Dashboard</span>
        </a>

        {{-- Section Heading --}}
        <div class="text-uppercase text-muted fw-bold px-3 mt-4 mb-2" 
             style="font-size: 0.7rem; letter-spacing: 1.2px;">
            Manage Internet
        </div>

        {{-- All Packages --}}
        <a class="nav-link d-flex align-items-center rounded-3 px-3 py-2 mb-1 fw-medium
                  {{ Route::is('admin.packages.index') ? 'bg-danger text-white shadow-sm' : 'link-dark' }}"
           href="{{ route('admin.packages.index') }}">
            <i class="bi bi-box-seam me-2 fs-5"></i>
            <span>All Packages</span>
        </a>

        {{-- Add New Package --}}
        <a class="nav-link d-flex align-items-center rounded-3 px-3 py-2 mb-1 fw-medium
                  {{ Route::is('admin.packages.create') ? 'bg-danger text-white shadow-sm' : 'link-dark' }}"
           href="{{ route('admin.packages.create') }}">
            <i class="bi bi-plus-square-dotted me-2 fs-5"></i>
            <span>Add New Package</span>
        </a>
    </nav>

    {{-- ===== Footer / Logout ===== --}}
    <div class="border-top p-2 mt-auto">
        <a class="nav-link d-flex align-items-center rounded-3 px-3 py-2 fw-semibold link-danger"
           href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right me-2 fs-5"></i>
            <span>Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</aside>