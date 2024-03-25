<?php
require_once CONSTANT_PATH . "/routeList.php";

function renderMenu($title, $routes)
{ ?>
    <li class="menu-title"><span data-key="t-menu"><?= $title; ?></span></li>
    <?php
    foreach ($routes as $route) { ?>
        <li class="nav-item">
            <?php if (count($route['children']) > 0) { ?>
                <a class="nav-link menu-link <?= isCurrentUrl($route['url']) ? 'active' : '' ?>"
                   href="#sidebar<?= ucfirst($route['slug']) ?>"
                   data-bs-toggle="collapse"
                   role="button"
                   aria-expanded="false" aria-controls="sidebar<?= ucfirst($route['slug']) ?>">
                    <i class="<?= $route['icon'] ?>"></i> <span
                            data-key="t-<?= ucfirst($route['slug']) ?>"><?= $route['label'] ?></span>
                </a>
                <div class="collapse menu-dropdown" id="sidebar<?= ucfirst($route['slug']) ?>">
                    <ul class="nav nav-sm flex-column">
                        <?php foreach ($route['children'] as $item) { ?>
                            <li class="nav-item">
                                <a href="<?= home_url($route['url'] . '/' . $item['url']) ?>"
                                   class="nav-link"
                                   data-key="t-<?= $route['slug'] ?>-<?= $item['slug'] ?>"><?= $item['label'] ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } else { ?>
                <a class="nav-link menu-link <?= isCurrentUrl($route['url']) ? 'active' : '' ?>"
                   href="<?= home_url($route['url']) ?>">
                    <i class="<?= $route['icon'] ?>"></i> <span
                            data-key="t-<?= $route['slug'] ?>"><?= $route['label'] ?></span>
                </a>
            <?php } ?>
        </li>
    <?php }
}

?>

<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.php" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.php" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <?php renderMenu('Menu', $menuRouters); ?>
                <?php renderMenu('System', $systemRouters); ?>
            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>