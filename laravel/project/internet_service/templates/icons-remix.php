<!doctype html>
<html lang="en">

<head>
    <?php
    $title = "Remix Icons";
    include('partials/title-meta.php');
    ?>

    <?php include('partials/head-css.php'); ?>
</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?php include('partials/menu.php'); ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <?php
                    $pagetitle = "Icons";
                    $title = "Remix Icons";
                    include('partials/page-title.php');
                    ?>

                    <div class="row">

                        <div class="col-12" id="icons"></div> <!-- end col-->

                    </div><!-- end row -->

                </div><!-- container-fluid -->

            </div><!-- End Page-content -->

            <?php include('partials/footer.php'); ?>

        </div><!-- end main content-->

    </div><!-- END layout-wrapper -->

    <?php include('partials/right-sidebar.php'); ?>

    <?php include('partials/vendor-scripts.php'); ?>

    <!-- Remix icon js-->
    <script src="assets/js/pages/remix-icons-list.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>