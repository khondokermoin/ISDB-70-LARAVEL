<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">


        <!-- Sidenav Menu Start -->
        @include('partials.sidebar')
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
            {{-- Toastr Messages --}}
            @include('partials.alerts')

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
