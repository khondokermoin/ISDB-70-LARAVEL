<!doctype html>
<html lang="en">

<head>
    <?php
    $title = "Starter page";
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
                    $pagetitle = "Utility";
                    $title = "Starter page";
                    include('partials/page-title.php');
                    ?>

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php include('partials/footer.php'); ?>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <?php include('partials/right-sidebar.php'); ?>

    <?php include('partials/vendor-scripts.php'); ?>

    <script src="assets/js/app.js"></script>

</body>

</html>