<?php
include 'layouts/session.php';
include 'layouts/main.php';

require_once(CONSTANT_PATH . '/common.php');

?>

<head>

    <?php includeFileWithVariables('layouts/title-meta.php', array('title' => 'Project Overview')); ?>

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

                    <?php includeFileWithVariables('layouts/page-title.php', array('pagetitle' => 'Projects', 'title' => 'Project Overview')); ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="bg-info-subtle">
                                    <div class="card-body pb-0 px-4">
                                        <div class="row mb-3">
                                            <div class="col-md">
                                                <div class="row align-items-center g-3">
                                                    <div class="col-md">
                                                        <div>
                                                            <h4 class="fw-bold"><?= $data['title'] ?></h4>
                                                            <div class="hstack gap-3 flex-wrap">
                                                                <div>Create Date : <span class="fw-semibold"><?= date('M j, Y', strtotime($data['created_at'])) ?></span></div>
                                                                <div class="vr"></div>
                                                                <div>Due Date : <span class="fw-semibold"><?= date('M j, Y', strtotime($data['deadline'])) ?></span></div>
                                                                <div class="vr"></div>
                                                                <div class="badge rounded-pill bg-info fs-12"><?= $statusList[$data['status']] ?></div>
                                                                <div class="badge rounded-pill bg-danger fs-12"><?= $priorityList[$data['priority']] ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-auto">
                                                <div class="hstack gap-1 flex-wrap">
                                                    <button type="button" class="btn py-0 fs-16 favourite-btn active">
                                                        <i class="ri-star-fill"></i>
                                                    </button>
                                                    <button type="button" class="btn py-0 fs-16 text-body">
                                                        <i class="ri-share-line"></i>
                                                    </button>
                                                    <button type="button" class="btn py-0 fs-16 text-body">
                                                        <i class="ri-flag-line"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="nav nav-tabs-custom border-bottom-0" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#project-overview" role="tab">
                                                    Overview
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#project-documents" role="tab">
                                                    Documents
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#project-activities" role="tab">
                                                    Activities
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#project-team" role="tab">
                                                    Team
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end card body -->
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tab-content text-muted">
                                <div class="tab-pane fade show active" id="project-overview" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xl-9 col-lg-8">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="text-muted">
                                                        <h6 class="mb-3 fw-semibold text-uppercase">Description</h6>
                                                        <div><?= $data['description'] ?></div>

                                                        <div class="pt-3 border-top border-top-dashed mt-4">
                                                            <div class="row">

                                                                <div class="col-lg-3 col-sm-6">
                                                                    <div>
                                                                        <p class="mb-2 text-uppercase fw-semibold fs-13">Create Date :</p>
                                                                        <h5 class="fs-15 mb-0"><?= date('M j, Y', strtotime($data['created_at'])) ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-sm-6">
                                                                    <div>
                                                                        <p class="mb-2 text-uppercase fw-semibold fs-13">Due Date :</p>
                                                                        <h5 class="fs-15 mb-0"><?= date('M j, Y', strtotime($data['deadline'])) ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-sm-6">
                                                                    <div>
                                                                        <p class="mb-2 text-uppercase fw-semibold fs-13">Priority :</p>
                                                                        <div class="badge bg-danger fs-12"><?= $statusList[$data['status']] ?></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-sm-6">
                                                                    <div>
                                                                        <p class="mb-2 text-uppercase fw-semibold fs-13">Status :</p>
                                                                        <div class="badge bg-warning fs-12"><?= $priorityList[$data['priority']] ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end card body -->
                                            </div>
                                            <!-- end card -->
                                        </div>
                                        <!-- ene col -->
                                        <div class="col-xl-3 col-lg-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-4">Summary</h5>
                                                    <div><?= $data['summary'] ?></div>
                                                </div>
                                                <!-- end card body -->
                                            </div>

                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-4">Skills</h5>
                                                    <div class="d-flex flex-wrap gap-2 fs-16">
                                                        <div class="badge fw-medium bg-secondary-subtle text-secondary">UI/UX</div>
                                                        <div class="badge fw-medium bg-secondary-subtle text-secondary">Figma</div>
                                                        <div class="badge fw-medium bg-secondary-subtle text-secondary">HTML</div>
                                                        <div class="badge fw-medium bg-secondary-subtle text-secondary">CSS</div>
                                                        <div class="badge fw-medium bg-secondary-subtle text-secondary">Javascript</div>
                                                        <div class="badge fw-medium bg-secondary-subtle text-secondary">C#</div>
                                                        <div class="badge fw-medium bg-secondary-subtle text-secondary">Nodejs</div>
                                                    </div>
                                                </div>
                                                <!-- end card body -->
                                            </div>
                                            <!-- end card -->
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end tab pane -->
                                <div class="tab-pane fade" id="project-documents" role="tabpanel">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-4">
                                                <h5 class="card-title flex-grow-1">Documents</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="table-responsive table-card">
                                                        <table class="table table-borderless align-middle mb-0">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th scope="col">File Name</th>
                                                                    <th scope="col">Type</th>
                                                                    <th scope="col">Size</th>
                                                                    <th scope="col">Upload Date</th>
                                                                    <th scope="col" style="width: 120px;">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm">
                                                                                <div class="avatar-title bg-light text-secondary rounded fs-24">
                                                                                    <i class="ri-folder-zip-line"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="ms-3 flex-grow-1">
                                                                                <h5 class="fs-14 mb-0"><a href="javascript:void(0)" class="text-body">Artboard-documents.zip</a></h5>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>Zip File</td>
                                                                    <td>4.57 MB</td>
                                                                    <td>12 Dec 2021</td>
                                                                    <td>
                                                                        <div class="dropdown">
                                                                            <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                                <i class="ri-more-fill"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                                <li class="dropdown-divider"></li>
                                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm">
                                                                                <div class="avatar-title bg-light text-danger rounded fs-24">
                                                                                    <i class="ri-file-pdf-fill"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="ms-3 flex-grow-1">
                                                                                <h5 class="fs-14 mb-0"><a href="javascript:void(0);" class="text-body">Bank Management System</a></h5>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>PDF File</td>
                                                                    <td>8.89 MB</td>
                                                                    <td>24 Nov 2021</td>
                                                                    <td>
                                                                        <div class="dropdown">
                                                                            <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                                <i class="ri-more-fill"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                                <li class="dropdown-divider"></li>
                                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm">
                                                                                <div class="avatar-title bg-light text-secondary rounded fs-24">
                                                                                    <i class="ri-video-line"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="ms-3 flex-grow-1">
                                                                                <h5 class="fs-14 mb-0"><a href="javascript:void(0);" class="text-body">Tour-video.mp4</a></h5>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>MP4 File</td>
                                                                    <td>14.62 MB</td>
                                                                    <td>19 Nov 2021</td>
                                                                    <td>
                                                                        <div class="dropdown">
                                                                            <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                                <i class="ri-more-fill"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                                <li class="dropdown-divider"></li>
                                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm">
                                                                                <div class="avatar-title bg-light text-success rounded fs-24">
                                                                                    <i class="ri-file-excel-fill"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="ms-3 flex-grow-1">
                                                                                <h5 class="fs-14 mb-0"><a href="javascript:void(0);" class="text-body">Account-statement.xsl</a></h5>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>XSL File</td>
                                                                    <td>2.38 KB</td>
                                                                    <td>14 Nov 2021</td>
                                                                    <td>
                                                                        <div class="dropdown">
                                                                            <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                                <i class="ri-more-fill"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                                <li class="dropdown-divider"></li>
                                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm">
                                                                                <div class="avatar-title bg-light text-warning rounded fs-24">
                                                                                    <i class="ri-folder-fill"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="ms-3 flex-grow-1">
                                                                                <h5 class="fs-14 mb-0"><a href="javascript:void(0);" class="text-body">Project Screenshots Collection</a></h5>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>Folder File</td>
                                                                    <td>87.24 MB</td>
                                                                    <td>08 Nov 2021</td>
                                                                    <td>
                                                                        <div class="dropdown">
                                                                            <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                                <i class="ri-more-fill"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                                <li class="dropdown-divider"></li>
                                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm">
                                                                                <div class="avatar-title bg-light text-danger rounded fs-24">
                                                                                    <i class="ri-image-2-fill"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="ms-3 flex-grow-1">
                                                                                <h5 class="fs-14 mb-0"><a href="javascript:void(0);" class="text-body">Velzon-logo.png</a></h5>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>PNG File</td>
                                                                    <td>879 KB</td>
                                                                    <td>02 Nov 2021</td>
                                                                    <td>
                                                                        <div class="dropdown">
                                                                            <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                                <i class="ri-more-fill"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                                <li class="dropdown-divider"></li>
                                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="text-center mt-3">
                                                        <a href="javascript:void(0);" class="text-success "><i class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> Load more </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end tab pane -->
                                <div class="tab-pane fade" id="project-activities" role="tabpanel">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Activities</h5>
                                            <div class="acitivity-timeline py-3">
                                                <div class="acitivity-item d-flex">
                                                    <div class="flex-shrink-0">
                                                        <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-xs rounded-circle acitivity-avatar" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-1">Oliver Phillips <span class="badge bg-primary-subtle text-primary align-middle">New</span></h6>
                                                        <p class="text-muted mb-2">We talked about a project on linkedin.</p>
                                                        <small class="mb-0 text-muted">Today</small>
                                                    </div>
                                                </div>
                                                <div class="acitivity-item py-3 d-flex">
                                                    <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                                        <div class="avatar-title bg-success-subtle text-success rounded-circle">
                                                            N
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-1">Nancy Martino <span class="badge bg-secondary-subtle text-secondary align-middle">In Progress</span></h6>
                                                        <p class="text-muted mb-2"><i class="ri-file-text-line align-middle ms-2"></i> Create new project Building product</p>
                                                        <div class="avatar-group mb-2">
                                                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Christi">
                                                                <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs" />
                                                            </a>
                                                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Frank Hook">
                                                                <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-xs" />
                                                            </a>
                                                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title=" Ruby">
                                                                <div class="avatar-xs">
                                                                    <div class="avatar-title rounded-circle bg-light text-primary">
                                                                        R
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="more">
                                                                <div class="avatar-xs">
                                                                    <div class="avatar-title rounded-circle">
                                                                        2+
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <small class="mb-0 text-muted">Yesterday</small>
                                                    </div>
                                                </div>
                                                <div class="acitivity-item py-3 d-flex">
                                                    <div class="flex-shrink-0">
                                                        <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-xs rounded-circle acitivity-avatar" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-1">Natasha Carey <span class="badge bg-success-subtle text-success align-middle">Completed</span></h6>
                                                        <p class="text-muted mb-2">Adding a new event with attachments</p>
                                                        <div class="row">
                                                            <div class="col-xxl-4">
                                                                <div class="row border border-dashed gx-2 p-2 mb-2">
                                                                    <div class="col-4">
                                                                        <img src="assets/images/small/img-2.jpg" alt="" class="img-fluid rounded" />
                                                                    </div>
                                                                    <!--end col-->
                                                                    <div class="col-4">
                                                                        <img src="assets/images/small/img-3.jpg" alt="" class="img-fluid rounded" />
                                                                    </div>
                                                                    <!--end col-->
                                                                    <div class="col-4">
                                                                        <img src="assets/images/small/img-4.jpg" alt="" class="img-fluid rounded" />
                                                                    </div>
                                                                    <!--end col-->
                                                                </div>
                                                                <!--end row-->
                                                            </div>
                                                        </div>
                                                        <small class="mb-0 text-muted">25 Nov</small>
                                                    </div>
                                                </div>
                                                <div class="acitivity-item py-3 d-flex">
                                                    <div class="flex-shrink-0">
                                                        <img src="assets/images/users/avatar-6.jpg" alt="" class="avatar-xs rounded-circle acitivity-avatar" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-1">Bethany Johnson</h6>
                                                        <p class="text-muted mb-2">added a new member to velzon dashboard</p>
                                                        <small class="mb-0 text-muted">19 Nov</small>
                                                    </div>
                                                </div>
                                                <div class="acitivity-item py-3 d-flex">
                                                    <div class="flex-shrink-0">
                                                        <div class="avatar-xs acitivity-avatar">
                                                            <div class="avatar-title rounded-circle bg-danger-subtle text-danger">
                                                                <i class="ri-shopping-bag-line"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-1">Your order is placed <span class="badge bg-danger-subtle text-danger align-middle ms-1">Out of Delivery</span></h6>
                                                        <p class="text-muted mb-2">These customers can rest assured their order has been placed.</p>
                                                        <small class="mb-0 text-muted">16 Nov</small>
                                                    </div>
                                                </div>
                                                <div class="acitivity-item py-3 d-flex">
                                                    <div class="flex-shrink-0">
                                                        <img src="assets/images/users/avatar-7.jpg" alt="" class="avatar-xs rounded-circle acitivity-avatar" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-1">Lewis Pratt</h6>
                                                        <p class="text-muted mb-2">They all have something to say beyond the words on the page. They can come across as casual or neutral, exotic or graphic. </p>
                                                        <small class="mb-0 text-muted">22 Oct</small>
                                                    </div>
                                                </div>
                                                <div class="acitivity-item py-3 d-flex">
                                                    <div class="flex-shrink-0">
                                                        <div class="avatar-xs acitivity-avatar">
                                                            <div class="avatar-title rounded-circle bg-info-subtle text-info">
                                                                <i class="ri-line-chart-line"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-1">Monthly sales report</h6>
                                                        <p class="text-muted mb-2"><span class="text-danger">2 days left</span> notification to submit the monthly sales report. <a href="javascript:void(0);" class="link-warning text-decoration-underline">Reports Builder</a></p>
                                                        <small class="mb-0 text-muted">15 Oct</small>
                                                    </div>
                                                </div>
                                                <div class="acitivity-item d-flex">
                                                    <div class="flex-shrink-0">
                                                        <img src="assets/images/users/avatar-8.jpg" alt="" class="avatar-xs rounded-circle acitivity-avatar" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-1">New ticket received <span class="badge bg-success-subtle text-success align-middle">Completed</span></h6>
                                                        <p class="text-muted mb-2">User <span class="text-secondary">Erica245</span> submitted a ticket.</p>
                                                        <small class="mb-0 text-muted">26 Aug</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end card-body-->
                                    </div>
                                    <!--end card-->
                                </div>
                                <!-- end tab pane -->
                                <div class="tab-pane fade" id="project-team" role="tabpanel">
                                    <div class="row g-4 mb-3">
                                        <div class="col-sm">
                                            <div class="d-flex">
                                                <div class="search-box me-2">
                                                    <input type="text" class="form-control" placeholder="Search member...">
                                                    <i class="ri-search-line search-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-auto">
                                            <div>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#inviteMembersModal"><i class="ri-share-line me-1 align-bottom"></i> Invite Member</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="team-list list-view-filter">
                                        <div class="card team-box">
                                            <div class="card-body px-4">
                                                <div class="row align-items-center team-row">
                                                    <div class="col team-settings">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                                        <i class="ri-star-fill"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="col text-end dropdown">
                                                                <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill fs-17"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="team-profile-img">
                                                            <div class="avatar-lg img-thumbnail rounded-circle">
                                                                <img src="assets/images/users/avatar-2.jpg" alt="" class="img-fluid d-block rounded-circle" />
                                                            </div>
                                                            <div class="team-content">
                                                                <a href="#" class="d-block">
                                                                    <h5 class="fs-16 mb-1">Nancy Martino</h5>
                                                                </a>
                                                                <p class="text-muted mb-0">Team Leader & HR</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="row text-muted text-center">
                                                            <div class="col-6 border-end border-end-dashed">
                                                                <h5 class="mb-1">225</h5>
                                                                <p class="text-muted mb-0">Projects</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <h5 class="mb-1">197</h5>
                                                                <p class="text-muted mb-0">Tasks</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col">
                                                        <div class="text-end">
                                                            <a href="pages-profile.php" class="btn btn-light view-btn">View Profile</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end card-->
                                        <div class="card team-box">
                                            <div class="card-body px-4">
                                                <div class="row align-items-center team-row">
                                                    <div class="col team-settings">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <button type="button" class="btn fs-16 p-0 favourite-btn active">
                                                                        <i class="ri-star-fill"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="col text-end dropdown">
                                                                <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill fs-17"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="team-profile-img">
                                                            <div class="avatar-lg img-thumbnail rounded-circle">
                                                                <div class="avatar-title bg-danger-subtle text-danger rounded-circle">
                                                                    HB
                                                                </div>
                                                            </div>
                                                            <div class="team-content">
                                                                <a href="#" class="d-block">
                                                                    <h5 class="fs-16 mb-1">Henry Baird</h5>
                                                                </a>
                                                                <p class="text-muted mb-0">Full Stack Developer</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="row text-muted text-center">
                                                            <div class="col-6 border-end border-end-dashed">
                                                                <h5 class="mb-1">352</h5>
                                                                <p class="text-muted mb-0">Projects</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <h5 class="mb-1">376</h5>
                                                                <p class="text-muted mb-0">Tasks</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col">
                                                        <div class="text-end">
                                                            <a href="pages-profile.php" class="btn btn-light view-btn">View Profile</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end card-->
                                        <div class="card team-box">
                                            <div class="card-body px-4">
                                                <div class="row align-items-center team-row">
                                                    <div class="col team-settings">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <button type="button" class="btn fs-16 p-0 favourite-btn active">
                                                                        <i class="ri-star-fill"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="col text-end dropdown">
                                                                <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill fs-17"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="team-profile-img">
                                                            <div class="avatar-lg img-thumbnail rounded-circle">
                                                                <img src="assets/images/users/avatar-3.jpg" alt="" class="img-fluid d-block rounded-circle" />
                                                            </div>
                                                            <div class="team-content">
                                                                <a href="#" class="d-block">
                                                                    <h5 class="fs-16 mb-1">Frank Hook</h5>
                                                                </a>
                                                                <p class="text-muted mb-0">Project Manager</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="row text-muted text-center">
                                                            <div class="col-6 border-end border-end-dashed">
                                                                <h5 class="mb-1">164</h5>
                                                                <p class="text-muted mb-0">Projects</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <h5 class="mb-1">182</h5>
                                                                <p class="text-muted mb-0">Tasks</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col">
                                                        <div class="text-end">
                                                            <a href="pages-profile.php" class="btn btn-light view-btn">View Profile</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end card-->
                                        <div class="card team-box">
                                            <div class="card-body px-4">
                                                <div class="row align-items-center team-row">
                                                    <div class="col team-settings">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                                        <i class="ri-star-fill"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="col text-end dropdown">
                                                                <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill fs-17"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="team-profile-img">
                                                            <div class="avatar-lg img-thumbnail rounded-circle">
                                                                <img src="assets/images/users/avatar-8.jpg" alt="" class="img-fluid d-block rounded-circle" />
                                                            </div>
                                                            <div class="team-content">
                                                                <a href="#" class="d-block">
                                                                    <h5 class="fs-16 mb-1">Jennifer Carter</h5>
                                                                </a>
                                                                <p class="text-muted mb-0">UI/UX Designer</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="row text-muted text-center">
                                                            <div class="col-6 border-end border-end-dashed">
                                                                <h5 class="mb-1">225</h5>
                                                                <p class="text-muted mb-0">Projects</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <h5 class="mb-1">197</h5>
                                                                <p class="text-muted mb-0">Tasks</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col">
                                                        <div class="text-end">
                                                            <a href="pages-profile.php" class="btn btn-light view-btn">View Profile</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end card-->
                                        <div class="card team-box">
                                            <div class="card-body px-4">
                                                <div class="row align-items-center team-row">
                                                    <div class="col team-settings">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                                        <i class="ri-star-fill"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="col text-end dropdown">
                                                                <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill fs-17"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="team-profile-img">
                                                            <div class="avatar-lg img-thumbnail rounded-circle">
                                                                <div class="avatar-title bg-success-subtle text-success rounded-circle">
                                                                    ME
                                                                </div>
                                                            </div>
                                                            <div class="team-content">
                                                                <a href="#" class="d-block">
                                                                    <h5 class="fs-16 mb-1">Megan Elmore</h5>
                                                                </a>
                                                                <p class="text-muted mb-0">Team Leader & Web Developer</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="row text-muted text-center">
                                                            <div class="col-6 border-end border-end-dashed">
                                                                <h5 class="mb-1">201</h5>
                                                                <p class="text-muted mb-0">Projects</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <h5 class="mb-1">263</h5>
                                                                <p class="text-muted mb-0">Tasks</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col">
                                                        <div class="text-end">
                                                            <a href="pages-profile.php" class="btn btn-light view-btn">View Profile</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end card-->
                                        <div class="card team-box">
                                            <div class="card-body px-4">
                                                <div class="row align-items-center team-row">
                                                    <div class="col team-settings">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                                        <i class="ri-star-fill"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="col text-end dropdown">
                                                                <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill fs-17"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="team-profile-img">
                                                            <div class="avatar-lg img-thumbnail rounded-circle">
                                                                <img src="assets/images/users/avatar-4.jpg" alt="" class="img-fluid d-block rounded-circle" />
                                                            </div>
                                                            <div class="team-content">
                                                                <a href="#" class="d-block">
                                                                    <h5 class="fs-16 mb-1">Alexis Clarke</h5>
                                                                </a>
                                                                <p class="text-muted mb-0">Backend Developer</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="row text-muted text-center">
                                                            <div class="col-6 border-end border-end-dashed">
                                                                <h5 class="mb-1">132</h5>
                                                                <p class="text-muted mb-0">Projects</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <h5 class="mb-1">147</h5>
                                                                <p class="text-muted mb-0">Tasks</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col">
                                                        <div class="text-end">
                                                            <a href="pages-profile.php" class="btn btn-light view-btn">View Profile</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end card-->
                                        <div class="card team-box">
                                            <div class="card-body px-4">
                                                <div class="row align-items-center team-row">
                                                    <div class="col team-settings">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                                        <i class="ri-star-fill"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="col text-end dropdown">
                                                                <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill fs-17"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="team-profile-img">
                                                            <div class="avatar-lg img-thumbnail rounded-circle">
                                                                <div class="avatar-title bg-info-subtle text-info rounded-circle">
                                                                    NC
                                                                </div>
                                                            </div>
                                                            <div class="team-content">
                                                                <a href="#" class="d-block">
                                                                    <h5 class="fs-16 mb-1">Nathan Cole</h5>
                                                                </a>
                                                                <p class="text-muted mb-0">Front-End Developer</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="row text-muted text-center">
                                                            <div class="col-6 border-end border-end-dashed">
                                                                <h5 class="mb-1">352</h5>
                                                                <p class="text-muted mb-0">Projects</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <h5 class="mb-1">376</h5>
                                                                <p class="text-muted mb-0">Tasks</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col">
                                                        <div class="text-end">
                                                            <a href="pages-profile.php" class="btn btn-light view-btn">View Profile</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end card-->
                                        <div class="card team-box">
                                            <div class="card-body px-4">
                                                <div class="row align-items-center team-row">
                                                    <div class="col team-settings">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                                        <i class="ri-star-fill"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="col text-end dropdown">
                                                                <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill fs-17"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="team-profile-img">
                                                            <div class="avatar-lg img-thumbnail rounded-circle">
                                                                <img src="assets/images/users/avatar-7.jpg" alt="" class="img-fluid d-block rounded-circle" />
                                                            </div>
                                                            <div class="team-content">
                                                                <a href="#" class="d-block">
                                                                    <h5 class="fs-16 mb-1">Joseph Parker</h5>
                                                                </a>
                                                                <p class="text-muted mb-0">Team Leader & HR</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="row text-muted text-center">
                                                            <div class="col-6 border-end border-end-dashed">
                                                                <h5 class="mb-1">64</h5>
                                                                <p class="text-muted mb-0">Projects</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <h5 class="mb-1">93</h5>
                                                                <p class="text-muted mb-0">Tasks</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col">
                                                        <div class="text-end">
                                                            <a href="pages-profile.php" class="btn btn-light view-btn">View Profile</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end card-->
                                        <div class="card team-box">
                                            <div class="card-body px-4">
                                                <div class="row align-items-center team-row">
                                                    <div class="col team-settings">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                                        <i class="ri-star-fill"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="col text-end dropdown">
                                                                <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill fs-17"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="team-profile-img">
                                                            <div class="avatar-lg img-thumbnail rounded-circle">
                                                                <img src="assets/images/users/avatar-5.jpg" alt="" class="img-fluid d-block rounded-circle" />
                                                            </div>
                                                            <div class="team-content">
                                                                <a href="#" class="d-block">
                                                                    <h5 class="fs-16 mb-1">Erica Kernan</h5>
                                                                </a>
                                                                <p class="text-muted mb-0">Web Designer</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="row text-muted text-center">
                                                            <div class="col-6 border-end border-end-dashed">
                                                                <h5 class="mb-1">345</h5>
                                                                <p class="text-muted mb-0">Projects</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <h5 class="mb-1">298</h5>
                                                                <p class="text-muted mb-0">Tasks</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col">
                                                        <div class="text-end">
                                                            <a href="pages-profile.php" class="btn btn-light view-btn">View Profile</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end card-->
                                        <div class="card team-box">
                                            <div class="card-body px-4">
                                                <div class="row align-items-center team-row">
                                                    <div class="col team-settings">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                                        <i class="ri-star-fill"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="col text-end dropdown">
                                                                <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill fs-17"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="team-profile-img">
                                                            <div class="avatar-lg img-thumbnail rounded-circle">
                                                                <div class="avatar-title border bg-light text-primary rounded-circle">
                                                                    DP
                                                                </div>
                                                            </div>
                                                            <div class="team-content">
                                                                <a href="#" class="d-block">
                                                                    <h5 class="fs-16 mb-1">Donald Palmer</h5>
                                                                </a>
                                                                <p class="text-muted mb-0">Wed Developer</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col">
                                                        <div class="row text-muted text-center">
                                                            <div class="col-6 border-end border-end-dashed">
                                                                <h5 class="mb-1">97</h5>
                                                                <p class="text-muted mb-0">Projects</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <h5 class="mb-1">135</h5>
                                                                <p class="text-muted mb-0">Tasks</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col">
                                                        <div class="text-end">
                                                            <a href="pages-profile.php" class="btn btn-light view-btn">View Profile</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end card-->
                                    </div>
                                    <!-- end team list -->

                                    <div class="row g-0 text-center text-sm-start align-items-center mb-3">
                                        <div class="col-sm-6">
                                            <div>
                                                <p class="mb-sm-0">Showing 1 to 10 of 12 entries</p>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-sm-6">
                                            <ul class="pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                                                <li class="page-item disabled"> <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a> </li>
                                                <li class="page-item"> <a href="#" class="page-link">1</a> </li>
                                                <li class="page-item active"> <a href="#" class="page-link">2</a> </li>
                                                <li class="page-item"> <a href="#" class="page-link">3</a> </li>
                                                <li class="page-item"> <a href="#" class="page-link">4</a> </li>
                                                <li class="page-item"> <a href="#" class="page-link">5</a> </li>
                                                <li class="page-item"> <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a> </li>
                                            </ul>
                                        </div><!-- end col -->
                                    </div><!-- end row -->
                                </div>
                                <!-- end tab pane -->
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
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
    <div class="modal fade" id="inviteMembersModal" tabindex="-1" aria-labelledby="inviteMembersModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
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
                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Brent Gonzalez">
                                <div class="avatar-xs">
                                    <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle img-fluid">
                                </div>
                            </a>
                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Sylvia Wright">
                                <div class="avatar-xs">
                                    <div class="avatar-title rounded-circle bg-secondary">
                                        S
                                    </div>
                                </div>
                            </a>
                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Ellen Smith">
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
                                    <h5 class="fs-14 mb-0"><a href="#" class="text-body d-block">Nancy Martino</a></h5>
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
                                    <h5 class="fs-14 mb-0"><a href="#" class="text-body d-block">Henry Baird</a></h5>
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
                                    <h5 class="fs-14 mb-0"><a href="#" class="text-body d-block">Frank Hook</a></h5>
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
                                    <h5 class="fs-14 mb-0"><a href="#" class="text-body d-block">Jennifer Carter</a></h5>
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
                                    <h5 class="fs-14 mb-0"><a href="#" class="text-body d-block">Alexis Clarke</a></h5>
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
                                    <h5 class="fs-14 mb-0"><a href="#" class="text-body d-block">Joseph Parker</a></h5>
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

    <script src="assets/js/pages/project-overview.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

</body>

</html>