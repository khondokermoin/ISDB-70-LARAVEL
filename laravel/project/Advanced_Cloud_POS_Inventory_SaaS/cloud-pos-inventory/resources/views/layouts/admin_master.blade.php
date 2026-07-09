<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">


        <!-- Sidenav Menu Start -->

        @if (auth()->user()->hasRole('Super Admin'))
            @include('partials.sidebars.super_admin_sidebar')
        @elseif(auth()->user()->hasRole('Company Admin'))
            @include('partials.sidebars.company_sidebar')
        @elseif(auth()->user()->hasAnyRole(['Manager', 'Salesman']))
            @include('partials.sidebars.branch_sidebar')
        @endif

        <!-- Sidenav Menu End -->


        <!-- Topbar Start -->
        @include('partials.topbar')
        <!-- Topbar End -->

        <!-- Search Modal -->
        @include('partials.search_modal')

        <!-- =============================== -->
        <!-- Start Page Content here -->
        <!-- =============================== -->
        <div class="page-content">
            <!-- container Start -->
            @yield('content')
            <!-- container end -->

            <!-- Footer Start -->
            @include('partials.footer')
            <!-- end Footer -->
        </div>
        <!-- =============================== -->
        <!-- End Page content -->
        <!-- =============================== -->

    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->
    @include('partials.theme_settings')

    {{-- JS Files --}}
    @include('partials.scripts')

</body>

</html>
