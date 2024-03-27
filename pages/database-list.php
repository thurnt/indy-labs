<?php
include 'layouts/session.php';
include 'layouts/main.php';

require_once CONSTANT_PATH . "/databaseList.php";

$array = array_map(function ($item) {
    $database = new TableCRUD($item['name']);
    $item['size'] = $database->calculateSize();
    return $item;
}, $dbList);

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

    <link href="<?= assets_url("libs/sweetalert2/sweetalert2.min.css") ?>" rel="stylesheet" type="text/css"/>

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
                    <?php foreach ($array as $idx => $db) { ?>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <p class="text-uppercase fw-semibold text-muted mb-0"><?= $db['label'] ?></p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <form action="<?= home_url("database/refresh") ?>" method="post"
                                                  class="mb-0">
                                                <input type="hidden" name="table_name" value="<?= $db['name'] ?>"/>
                                                <a href="#"
                                                   class="btn btn-ghost-success py-0 px-1 btn-sm fs-14 mb-0 btn-refresh"><i
                                                            class="mdi mdi-database-sync-outline fs-15 align-center"></i><span
                                                            class="fs-12 ms-1">Refresh</span></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                                                                  data-target="<?= $db['size'] ?>">0</span>M
                                            </h4>
                                            <a href="<?= home_url($db['url']) ?>" class="text-decoration-underline">See
                                                details</a>
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

<!-- Sweet Alerts js -->
<script src="<?= assets_url("libs/sweetalert2/sweetalert2.min.js") ?>"></script>

<script src="<?= assets_url("js/pages/project-list.init.js") ?>"></script>

<!-- App js -->
<script src="<?= assets_url("js/app.js") ?>"></script>
</body>

</html>