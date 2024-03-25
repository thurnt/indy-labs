<?php
include 'layouts/session.php';
include 'layouts/main.php';

require_once CONSTANT_PATH . "/databaseList.php";

function renderColor($idx)
{
    $period = 4;
    if ($idx % $period == 0) {
        return "primary";
    } else if ($idx % $period == 1) {
        return "warning";
    } else if ($idx % $period == 2) {
        return "secondary";
    } else {
        return "danger";
    }
}

?>

<head>

    <?php includeFileWithVariables('layouts/title-meta.php', array('title' => 'Database')); ?>

    <!-- plugin css -->
    <link href="assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <link href="assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <?php include 'layouts/head-css.php'; ?>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?php include 'layouts/menu.php'; ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <?php includeFileWithVariables('layouts/page-title.php', array('pagetitle' => 'Database', 'title' => 'List')); ?>

                    <div class="row">
                        <?php foreach ($dbList as $idx => $db) { ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <p class="text-uppercase fw-semibold text-muted mb-0"><?= $db['label'] ?></p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <h5 class="text-success fs-14 mb-0">
                                                    <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +29.08 %
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="183.35">0</span>M</h4>
                                                <a href="<?= home_url($db['url']) ?>" class="text-decoration-underline">See details</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-<?= renderColor($idx) ?>-subtle rounded fs-3">
                                                    <i class="<?= $db['icon'] ?> text-<?= renderColor($idx) ?>"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        <?php } ?>
                    </div> <!-- end row-->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php include 'layouts/footer.php'; ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <?php include 'layouts/customizer.php'; ?>

    <?php include 'layouts/vendor-scripts.php'; ?>

    <!-- apexcharts -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Vector map-->
    <script src="assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="assets/libs/jsvectormap/maps/world-merc.js"></script>
    <script src="assets/libs/jsvectormap/maps/us-merc-en.js"></script>

    <!-- Swiper Js -->
    <script src="assets/libs/swiper/swiper-bundle.min.js"></script>

    <script src="assets/js/pages/form-input-spin.init.js"></script>

    <script src="assets/libs/card/card.js"></script>

    <!-- Widget init -->
    <script src="assets/js/pages/widgets.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
</body>

</html>