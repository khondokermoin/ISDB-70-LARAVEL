<!doctype html>
<html lang="en">

<head>
    <?php
    $title = "Video";
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
                    $pagetitle = "UI Elements";
                    $title = "Video";
                    include('partials/page-title.php');
                    ?>

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Ratio video 16:9</h4>
                                    <p class="card-title-desc">Aspect ratios can be customized with modifier classes.</p>

                                    <!-- 16:9 aspect ratio -->
                                    <div class="ratio ratio-16x9">
                                        <iframe title="YouToube Video" src="https://www.youtube.com/embed/1y_kfWUCFDQ" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->

                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Ratio video 21:9</h4>
                                    <p class="card-title-desc">Aspect ratios can be customized with modifier classes.</p>

                                    <!-- 21:9 aspect ratio -->
                                    <div class="ratio ratio-21x9">
                                        <iframe title="YouToube Video" src="https://www.youtube.com/embed/1y_kfWUCFDQ" allowfullscreen></iframe>
                                    </div>

                                </div>
                            </div>
                        </div> <!-- end col -->

                    </div> <!-- end row -->

                    <div class="row">

                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Ratio video 4:3</h4>
                                    <p class="card-title-desc">Aspect ratios can be customized with modifier classes.</p>

                                    <!-- 4:3 aspect ratio -->
                                    <div class="ratio ratio-4x3">
                                        <iframe title="YouToube Video" src="https://www.youtube.com/embed/1y_kfWUCFDQ" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->

                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Ratio video 1:1</h4>
                                    <p class="card-title-desc">Aspect ratios can be customized with modifier classes.</p>

                                    <!-- 1:1 aspect ratio -->
                                    <div class="ratio ratio-1x1">
                                        <iframe title="YouToube Video" src="https://www.youtube.com/embed/1y_kfWUCFDQ" allowfullscreen></iframe>
                                    </div>

                                </div>
                            </div>
                        </div> <!-- end col -->

                    </div> <!-- end row -->
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