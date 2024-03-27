<?php include 'layouts/session.php'; ?>
<?php include 'layouts/main.php'; ?>

<head>

    <?php includeFileWithVariables('layouts/title-meta.php', array('title' => (isset($data['id']) ? 'Edit' : 'Create') . ' Project')); ?>

    <!-- Plugins css -->
    <link href="<?= assets_url("libs/dropzone/dropzone.css") ?>" rel="stylesheet" type="text/css"/>

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

                <?php includeFileWithVariables('layouts/page-title.php', array('pagetitle' => 'Projects', 'title' => (isset($data['id']) ? 'Edit' : 'Create') . ' Project')); ?>

                <form action="<?= home_url(isset($data['id']) ? 'project/edit/' . $data['id'] : 'project/new') ?>"
                      method="post">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="project-title-input">Project Title</label>
                                        <input type="text" class="form-control" id="project-title-input" name="title"
                                               placeholder="Enter project title" value="<?= $data['title'] ?? '' ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Project Summary</label>
                                        <textarea name="summary" class="form-control" id="" cols="30" rows="4"
                                                  placeholder="Enter project summary"><?= $data['summary'] ?? '' ?></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Project Description</label>
                                        <div id="ckeditor-classic"><?= $data['description'] ?? '' ?></div>
                                        <input type="hidden" name="description" id="project-description"
                                               value="<?= $data['description'] ?? '' ?>">
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->

                            <!-- end card -->
                            <div class="text-start mb-4">
                                <a href="<?= home_url('project') ?>" class="btn btn-light w-sm">Back</a>
                                <button type="submit"
                                        class="btn btn-success w-sm"><?= isset($data['id']) ? 'Update' : 'Create' ?>
                                </button>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">General</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="choices-priority-input" class="form-label">Priority</label>
                                        <select class="form-select" data-choices data-choices-search-false
                                                id="choices-priority-input" name="priority"
                                                value="<?= $data['priority'] ?? '' ?>">
                                            <option value="High" <?= $data['priority'] == 'High' ? 'selected' : '' ?>>
                                                High
                                            </option>
                                            <option value="Medium" <?= $data['priority'] == 'Medium' ? 'selected' : '' ?>>
                                                Medium
                                            </option>
                                            <option value="Low" <?= $data['priority'] == 'Low' ? 'selected' : '' ?>>
                                                Low
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="choices-status-input" class="form-label">Status</label>
                                        <select class="form-select" data-choices data-choices-search-false
                                                id="choices-status-input" name="status"
                                                value="<?= $data['status'] ?? '' ?>">
                                            <option value="ToDo" <?= $data['status'] == 'ToDo' ? 'selected' : '' ?>>
                                                ToDo
                                            </option>
                                            <option value="Inprogress" <?= $data['status'] == 'Inprogress' ? 'selected' : '' ?>>
                                                Inprogress
                                            </option>
                                            <option value="Done" <?= $data['status'] == 'Done' ? 'selected' : '' ?>>
                                                Done
                                            </option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="datepicker-deadline-input" class="form-label">Deadline</label>
                                        <input type="text" class="form-control" id="datepicker-deadline-input"
                                               placeholder="Enter due date" data-provider="flatpickr" name="deadline"
                                               data-date-format="d/m/Y"
                                               data-deafult-date="<?= $data['deadline'] ? date('d/m/Y', strtotime($data['deadline'])) : date('d/m/Y') ?>">
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Tags</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="choices-categories-input" class="form-label">Category</label>
                                        <select class="form-select" data-choices data-choices-search-false
                                                id="choices-categories-input" name="category"
                                                value="<?= $data['category'] ?? '' ?>">
                                            <option value="" <?= $data['category'] == '' ? 'selected' : '' ?>>
                                                --Select--
                                            </option>
                                            <option value="Designing" <?= $data['category'] == 'Designing' ? 'selected' : '' ?>>
                                                Designing
                                            </option>
                                            <option value="Development" <?= $data['category'] == 'Development' ? 'selected' : '' ?>>
                                                Development
                                            </option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="choices-text-input" class="form-label">Tags</label>
                                        <input class="form-control" id="choices-text-input" data-choices
                                               data-choices-limit="Required Limit" placeholder="Enter Tags" type="text"
                                               value="<?= $data['tags'] ?? '' ?>" name="tags"/>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->

                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </form>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!-- Modal -->
<div class="modal fade" id="inviteMembersModal" tabindex="-1" aria-labelledby="inviteMembersModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-3 ps-4 bg-success-subtle">
                <h5 class="modal-title" id="inviteMembersModalLabel">Members</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="search-box mb-3">
                    <input type="text" class="form-control bg-light border-light" placeholder="Search here...">
                    <i class="ri-search-line search-icon"></i>
                </div>

                <div class="mb-4 d-flex align-items-center">
                    <div class="me-2">
                        <h5 class="mb-0 fs-13">Members :</h5>
                    </div>
                    <div class="avatar-group justify-content-center">
                        <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                           data-bs-trigger="hover" data-bs-placement="top" title="Brent Gonzalez">
                            <div class="avatar-xs">
                                <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle img-fluid">
                            </div>
                        </a>
                        <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                           data-bs-trigger="hover" data-bs-placement="top" title="Sylvia Wright">
                            <div class="avatar-xs">
                                <div class="avatar-title rounded-circle bg-secondary">
                                    S
                                </div>
                            </div>
                        </a>
                        <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                           data-bs-trigger="hover" data-bs-placement="top" title="Ellen Smith">
                            <div class="avatar-xs">
                                <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle img-fluid">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="mx-n4 px-4" data-simplebar style="max-height: 225px;">
                    <div class="vstack gap-3">
                        <div class="d-flex align-items-center">
                            <div class="avatar-xs flex-shrink-0 me-3">
                                <img src="assets/images/users/avatar-2.jpg" alt="" class="img-fluid rounded-circle">
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Nancy Martino</a></h5>
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
                                <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Henry Baird</a></h5>
                            </div>
                            <div class="flex-shrink-0">
                                <button type="button" class="btn btn-light btn-sm">Add</button>
                            </div>
                        </div>
                        <!-- end member item -->
                        <div class="d-flex align-items-center">
                            <div class="avatar-xs flex-shrink-0 me-3">
                                <img src="assets/images/users/avatar-3.jpg" alt="" class="img-fluid rounded-circle">
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Frank Hook</a></h5>
                            </div>
                            <div class="flex-shrink-0">
                                <button type="button" class="btn btn-light btn-sm">Add</button>
                            </div>
                        </div>
                        <!-- end member item -->
                        <div class="d-flex align-items-center">
                            <div class="avatar-xs flex-shrink-0 me-3">
                                <img src="assets/images/users/avatar-4.jpg" alt="" class="img-fluid rounded-circle">
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Jennifer Carter</a></h5>
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
                                <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Alexis Clarke</a></h5>
                            </div>
                            <div class="flex-shrink-0">
                                <button type="button" class="btn btn-light btn-sm">Add</button>
                            </div>
                        </div>
                        <!-- end member item -->
                        <div class="d-flex align-items-center">
                            <div class="avatar-xs flex-shrink-0 me-3">
                                <img src="assets/images/users/avatar-7.jpg" alt="" class="img-fluid rounded-circle">
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Joseph Parker</a></h5>
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
                <button type="button" class="btn btn-success w-xs">Invite</button>
            </div>
        </div>
        <!-- end modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- end modal -->


<?php include 'layouts/customizer.php'; ?>

<?php include 'layouts/vendor-scripts.php'; ?>

<!-- ckeditor -->
<script src="<?= assets_url("libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js") ?>"></script>

<!-- dropzone js -->
<script src="<?= assets_url("libs/dropzone/dropzone-min.js") ?>"></script>

<script src="<?= assets_url("libs/choices.js/public/assets/scripts/choices.min.js") ?>"></script>

<!-- project-create init -->
<script src="<?= assets_url("js/pages/project-create.init.js") ?>"></script>

<!-- App js -->
<script src="<?= assets_url("js/app.js") ?>"></script>
</body>

</html>