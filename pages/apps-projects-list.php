<?php include 'layouts/session.php'; ?>
<?php include 'layouts/main.php'; ?>

<head>

    <?php includeFileWithVariables('layouts/title-meta.php', array('title' => 'Project List')); ?>

    <link href="<?= assets_url("libs/sweetalert2/sweetalert2.min.css") ?>" rel="stylesheet" type="text/css" />

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

                    <?php includeFileWithVariables('layouts/page-title.php', array('pagetitle' => 'Projects', 'title' => 'Project List')); ?>

                    <?php
                    if (isset($_GET['success']) && $_GET['success'] == 1) {
                        if (isset($_SESSION['success_notice'])) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span>' . $_SESSION['success_notice'] . '</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                            unset($_SESSION['success_notice']);
                        }
                    }

                    if (isset($_GET['error']) && $_GET['error'] == 1) {
                        if (isset($_SESSION['error_message'])) {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span>' . $_SESSION['error_message'] . '</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                            unset($_SESSION['error_message']);
                        }
                    }
                    ?>

                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                                <a href="<?= home_url('project/new') ?>" class="btn btn-success"><i class="ri-add-line align-bottom me-1"></i> Add New</a>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end gap-2">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>

                                <select class="form-control w-md" data-choices data-choices-search-false>
                                    <option value="All">All</option>
                                    <option value="Today">Today</option>
                                    <option value="Yesterday" selected>Yesterday</option>
                                    <option value="Last 7 Days">Last 7 Days</option>
                                    <option value="Last 30 Days">Last 30 Days</option>
                                    <option value="This Month">This Month</option>
                                    <option value="Last Year">Last Year</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <?php foreach ($results as $item) { ?>
                            <div class="col-xxl-3 col-sm-6 project-card">
                                <div class="card card-height-100">
                                    <div class="card-body">
                                        <div class="d-flex flex-column h-100">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-4">Last update
                                                        : <?= renderTimeAgo($item['updated_at']) ?></p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div class="d-flex gap-1 align-items-center">
                                                        <div class="dropdown">
                                                            <button class="btn btn-link text-muted p-1 mt-n2 py-0 text-decoration-none fs-15" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                <i data-feather="more-horizontal" class="icon-sm"></i>
                                                            </button>

                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="<?= home_url('project/view/' . $item['id']) ?>"><i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                    View</a>
                                                                <a class="dropdown-item" href="<?= home_url('project/edit/' . $item['id']) ?>"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                    Edit</a>
                                                                <div class="dropdown-divider"></div>
                                                                <form action="<?= home_url("project/delete/" . $item['id']) ?>" method="post" class="mb-0">
                                                                    <a href="#" class="dropdown-item btn-delete"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>Delete</a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <div class="flex-grow-1">
                                                    <h5 class="mb-1 fs-16"><a href="<?= home_url('project/view/' . $item['id']) ?>" class="text-body"><?= $item['title'] ?></a>
                                                    </h5>
                                                    <p class="text-muted text-truncate-two-lines mb-3"><?= $item['summary'] ?></p>
                                                </div>
                                            </div>
                                            <div class="mt-auto">
                                                <div class="d-flex mb-2">
                                                    <div class="flex-grow-1">
                                                        <div>Tasks</div>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div><i class="ri-list-check align-bottom me-1 text-muted"></i>
                                                            18/42
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="progress progress-sm animated-progress">
                                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100" style="width: 34%;"></div>
                                                    <!-- /.progress-bar -->
                                                </div><!-- /.progress -->
                                            </div>
                                        </div>

                                    </div>
                                    <!-- end card body -->
                                    <div class="card-footer bg-transparent border-top-dashed py-2">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="avatar-group">
                                                    <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Darline Williams">
                                                        <div class="avatar-xxs">
                                                            <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle img-fluid">
                                                        </div>
                                                    </a>
                                                    <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Add Members">
                                                        <div class="avatar-xxs">
                                                            <div class="avatar-title fs-16 rounded-circle bg-light border-dashed border text-primary">
                                                                +
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div class="text-muted">
                                                    <i class="ri-calendar-event-fill me-1 align-bottom"></i> <?= date('M j, Y', strtotime($item['created_at'])) ?>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- end card footer -->
                                </div>
                                <!-- end card -->
                            </div>
                        <?php } ?>
                    </div>

                    <div class="row g-0 text-center text-sm-start align-items-center mb-4">
                        <div class="col-sm-6">
                            <div>
                                <p class="mb-sm-0 text-muted">Showing <span class="fw-semibold">1</span> to <span class="fw-semibold">10</span> of <span class="fw-semibold text-decoration-underline">12</span> entries</p>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-sm-6">
                            <ul class="pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                                <li class="page-item disabled">
                                    <a href="#" class="page-link">Previous</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item ">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">3</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">4</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">5</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">Next</a>
                                </li>
                            </ul>
                        </div><!-- end col -->
                    </div><!-- end row -->
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

    <!-- project list init -->
    <script src="<?= assets_url("js/pages/project-list.init.js") ?>"></script>
    <script src="<?= assets_url("libs/choices.js/public/assets/scripts/choices.min.js") ?>"></script>

    <!-- App js -->
    <script src="<?= assets_url("js/app.js") ?>"></script>
</body>

</html>