<?php include 'layouts/session.php'; ?>
<?php include 'layouts/main.php'; ?>

<?php
require_once(CONSTANT_PATH . '/common.php');
?>

<head>

    <?php includeFileWithVariables('layouts/title-meta.php', array('title' => 'Tasks List')); ?>

    <!-- Sweet Alert css-->
    <link href="<?= assets_url("libs/sweetalert2/sweetalert2.min.css") ?>" rel="stylesheet" type="text/css"/>

    <?php include 'layouts/head-css.php'; ?>

</head>w

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
                <?php includeFileWithVariables('layouts/page-title.php', array('pagetitle' => 'Tasks', 'title' => 'Tasks List')); ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" id="tasksList">
                            <div class="card-header border-0">
                                <div class="d-flex align-items-center">
                                    <h5 class="card-title mb-0 flex-grow-1">All Tasks</h5>
                                    <div class="flex-shrink-0">
                                        <div class="d-flex flex-wrap gap-2">
                                            <a class="btn btn-primary add-btn" href="<?= home_url("task/new") ?>"><i
                                                        class="ri-add-line align-bottom me-1"></i> Create Task
                                            </a>
                                            <button class="btn btn-soft-danger" id="remove-actions"
                                                    onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border border-dashed border-end-0 border-start-0">
                                <form>
                                    <div class="row g-3">
                                        <div class="col-xxl-5 col-sm-12">
                                            <div class="search-box">
                                                <input type="text" class="form-control search bg-light border-light"
                                                       placeholder="Search for tasks or something...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                        <!--end col-->

                                        <div class="col-xxl-3 col-sm-4">
                                            <input type="text" class="form-control bg-light border-light"
                                                   id="demo-datepicker" data-provider="flatpickr"
                                                   data-date-format="d M, Y" data-range-date="true"
                                                   placeholder="Select date range">
                                        </div>
                                        <!--end col-->

                                        <div class="col-xxl-3 col-sm-4">
                                            <div class="input-light">
                                                <select class="form-control" data-choices data-choices-search-false
                                                        name="choices-single-default" id="idStatus">
                                                    <option value="">Status</option>
                                                    <option value="all" selected>All</option>
                                                    <option value="New">New</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Inprogress">Inprogress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                            <!--end card-body-->
                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <?php if (count($results) > 0) { ?>
                                        <table class="table align-middle table-nowrap mb-0" id="tasksTable">
                                            <thead class="table-light text-muted">
                                            <tr>
                                                <th class="sort" data-sort="title">Title</th>
                                                <th class="sort" data-sort="create_date">Create Date</th>
                                                <th class="sort" data-sort="due_date">Due Date</th>
                                                <th class="sort" data-sort="status">Status</th>
                                                <th class="sort" data-sort="priority">Priority</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody class="list">
                                            <?php foreach ($results as $item) { ?>
                                                <tr>
                                                    <td><?= $item['title'] ?></td>
                                                    <td><?= date('d/m/Y', strtotime($item['created_at'])) ?></td>
                                                    <td><?= date('d/m/Y', strtotime($item['deadline'])) ?></td>
                                                    <td><?= $statusList[$item['status']] ?></td>
                                                    <td><?= $priorityList[$item['priority']] ?></td>
                                                    <td>
                                                        <div class="flex-shrink-0">
                                                            <ul class="list-inline mb-0 text-center">
                                                                <li class="list-inline-item me-0"><a
                                                                            href="<?= home_url("task/view/" . $item['id']) ?>"><i
                                                                                class="ri-eye-fill align-bottom mx-2 text-muted"></i></a>
                                                                </li>
                                                                <li class="list-inline-item me-0"><a
                                                                            class="edit-item-btn"
                                                                            href="<?= home_url("task/edit/" . $item['id']) ?>"><i
                                                                                class="ri-pencil-fill align-bottom mx-2 text-muted"></i></a>
                                                                </li>
                                                                <li class="list-inline-item me-0">
                                                                    <form action="<?= home_url("task/delete/" . $item['id']) ?>"
                                                                          method="post" class="mb-0">
                                                                        <a class="remove-item-btn btn-delete-task"
                                                                           href="#">
                                                                            <i class="ri-delete-bin-fill align-bottom mx-2 text-muted"></i>
                                                                        </a>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } else { ?>
                                        <!--end table-->
                                        <div class="noresult" style="display: none">
                                            <div class="text-center">
                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                           colors="primary:#121331,secondary:#08a88a"
                                                           style="width:75px;height:75px"></lord-icon>
                                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                                <p class="text-muted mb-0">We've searched more than 200k+ tasks We did
                                                    not
                                                    find any tasks for you search.</p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

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

<!-- list.js min js -->
<script src="<?= assets_url("libs/list.js/list.min.js") ?>"></script>

<script src="<?= assets_url("libs/choices.js/public/assets/scripts/choices.min.js") ?>"></script>

<!-- Sweet Alerts js -->
<script src="<?= assets_url("libs/sweetalert2/sweetalert2.min.js") ?>"></script>

<script src="<?= assets_url("js/pages/tasks-list.init.js") ?>"></script>

<!-- App js -->
<script src="<?= assets_url("js/app.js") ?>"></script>
</body>

</html>