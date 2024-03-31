<?php
include 'layouts/session.php';
include 'layouts/main.php';

require_once(CONSTANT_PATH . '/common.php');

?>

<?php includeFileWithVariables('layouts/title-meta.php', array('title' => 'Task Details')); ?>

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

                <?php includeFileWithVariables('layouts/page-title.php', array('pagetitle' => 'Task', 'title' => 'Task Details')); ?>

                <div class="row">
                    <div class="col-xxl-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="mb-4">
                                    <select class="form-select" data-choices data-choices-sorting-false
                                            data-choices-search-false id="choices-status-input" name="status"
                                            value="<?= $data['status'] ?? '' ?>">
                                        <?php foreach ($statusList as $id => $value) { ?>
                                            <option value="<?= $id ?>">
                                                <?= $value ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="table-card">
                                    <table class="table mb-0">
                                        <tbody>
                                        <tr>
                                            <td class="fw-semibold">Created Date</td>
                                            <td><?= date('M j, Y', strtotime($data['created_at'])) ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-semibold">Priority</td>
                                            <td><span class="badge bg-danger-subtle text-danger">High</span></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-semibold">Status</td>
                                            <td><span class="badge bg-secondary-subtle text-secondary">Inprogress</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-semibold">Due Date</td>
                                            <td><?= date('M j, Y', strtotime($data['deadline'])) ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!--end table-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---end col-->
                    <div class="col-xxl-9">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="fw-bold"><?= $data['title'] ?></h4>
                                <div class="pt-3 border-top border-top-dashed mt-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h6 class="mb-3 fw-semibold text-uppercase">Category</h6>
                                            <div class="hstack flex-wrap gap-2 fs-15">
                                                <?php if ($data['category']) { ?>
                                                    <div class="badge fw-semibold bg-info-subtle text-info"><?= $categoryList[$data['category']] ?></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <h6 class="mb-3 fw-semibold text-uppercase">Tags</h6>
                                            <div class="hstack flex-wrap gap-2 fs-15">
                                                <?php
                                                if ($data['tags']) {
                                                    $tags = array_map('trim', explode(',', $data['tags']));
                                                    foreach ($tags as $tag) {
                                                        ?>
                                                        <div class="badge fw-semibold bg-info-subtle text-info"><?= $tag ?>
                                                            >
                                                        </div>
                                                    <?php }
                                                } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="text-muted">
                                    <h6 class="mb-3 fw-semibold text-uppercase">Summary</h6>
                                    <div class="mb-3"><?= $data['summary'] ?></div>
                                    <h6 class="mb-3 fw-semibold text-uppercase">Description</h6>

                                </div>
                            </div>
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

                <div class="modal fade" id="inviteMembersModal" tabindex="-1" aria-labelledby="inviteMembersModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border-0">
                            <div class="modal-header p-3 ps-4 bg-success-subtle">
                                <h5 class="modal-title" id="inviteMembersModalLabel">Team Members</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                                <div class="search-box mb-3">
                                    <input type="text" class="form-control bg-light border-light"
                                           placeholder="Search here...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>

                                <div class="mb-4 d-flex align-items-center">
                                    <div class="me-2">
                                        <h5 class="mb-0 fs-13">Members :</h5>
                                    </div>
                                    <div class="avatar-group justify-content-center">
                                        <a href="javascript: void(0);" class="avatar-group-item"
                                           data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top"
                                           title="Tonya Noble">
                                            <div class="avatar-xs">
                                                <img src="assets/images/users/avatar-10.jpg" alt=""
                                                     class="rounded-circle img-fluid">
                                            </div>
                                        </a>
                                        <a href="javascript: void(0);" class="avatar-group-item"
                                           data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top"
                                           title="Thomas Taylor">
                                            <div class="avatar-xs">
                                                <img src="assets/images/users/avatar-8.jpg" alt=""
                                                     class="rounded-circle img-fluid">
                                            </div>
                                        </a>
                                        <a href="javascript: void(0);" class="avatar-group-item"
                                           data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top"
                                           title="Nancy Martino">
                                            <div class="avatar-xs">
                                                <img src="assets/images/users/avatar-2.jpg" alt=""
                                                     class="rounded-circle img-fluid">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="mx-n4 px-4" data-simplebar style="max-height: 225px;">
                                    <div class="vstack gap-3">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-xs flex-shrink-0 me-3">
                                                <img src="assets/images/users/avatar-2.jpg" alt=""
                                                     class="img-fluid rounded-circle">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="fs-13 mb-0"><a href="javascript:void(0);"
                                                                          class="text-body d-block">Nancy Martino</a>
                                                </h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <button type="button" class="btn btn-light btn-sm">Add</button>
                                            </div>
                                        </div>
                                        <!-- end member item -->
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-xs flex-shrink-0 me-3">
                                                <div class="avatar-title bg-danger-subtle text-danger rounded-circle">
                                                    HB
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="fs-13 mb-0"><a href="javascript:void(0);"
                                                                          class="text-body d-block">Henry Baird</a></h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <button type="button" class="btn btn-light btn-sm">Add</button>
                                            </div>
                                        </div>
                                        <!-- end member item -->
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-xs flex-shrink-0 me-3">
                                                <img src="assets/images/users/avatar-3.jpg" alt=""
                                                     class="img-fluid rounded-circle">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="fs-13 mb-0"><a href="javascript:void(0);"
                                                                          class="text-body d-block">Frank Hook</a></h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <button type="button" class="btn btn-light btn-sm">Add</button>
                                            </div>
                                        </div>
                                        <!-- end member item -->
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-xs flex-shrink-0 me-3">
                                                <img src="assets/images/users/avatar-4.jpg" alt=""
                                                     class="img-fluid rounded-circle">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="fs-13 mb-0"><a href="javascript:void(0);"
                                                                          class="text-body d-block">Jennifer Carter</a>
                                                </h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <button type="button" class="btn btn-light btn-sm">Add</button>
                                            </div>
                                        </div>
                                        <!-- end member item -->
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-xs flex-shrink-0 me-3">
                                                <div class="avatar-title bg-success-subtle text-success rounded-circle">
                                                    AC
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="fs-13 mb-0"><a href="javascript:void(0);"
                                                                          class="text-body d-block">Alexis Clarke</a>
                                                </h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <button type="button" class="btn btn-light btn-sm">Add</button>
                                            </div>
                                        </div>
                                        <!-- end member item -->
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-xs flex-shrink-0 me-3">
                                                <img src="assets/images/users/avatar-7.jpg" alt=""
                                                     class="img-fluid rounded-circle">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="fs-13 mb-0"><a href="javascript:void(0);"
                                                                          class="text-body d-block">Joseph Parker</a>
                                                </h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <button type="button" class="btn btn-light btn-sm">Add</button>
                                            </div>
                                        </div>
                                        <!-- end member item -->
                                    </div>
                                    <!-- end list -->
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light w-xs" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-success w-xs">Assigned</button>
                            </div>
                        </div>
                        <!-- end modal-content -->
                    </div>
                    <!-- modal-dialog -->
                </div>
                <!-- end modal -->

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

<!-- App js -->
<script src="assets/js/app.js"></script>
</body>

</html>