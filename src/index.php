<?php
header('Access-Control-Allow-Origin: *');
include 'autoload.php';
@session_start();

use model\auth\Admins;

$Admin = new Admins();
if ($_SESSION['admin_auth']['login'] != true and $_COOKIE['admin_login'] != true) header('location: login.php');
if (isset($_COOKIE['admin_auth']['admin_login'])) {
    $_SESSION['admin_auth']['aid'] = $_COOKIE['admin_auth']['admin_aid'];
    $_SESSION['admin_auth']['login'] = true;
}
if (isset($_COOKIE['admin_aid'])) {
    $aid = $_COOKIE['admin_aid'];
    if ($Admin->findAdminById($aid) == true){
        $_SESSION['admin_auth']['admin'] = $Admin->admin;
    }
}
if (isset($_SESSION['admin_auth']['aid'])) {
    $aid = $_SESSION['admin_auth']['aid'];
    if ($Admin->findAdminById($aid) == true){
        $_SESSION['admin_auth']['admin'] = $Admin->admin;
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<?php

require_once 'layers/head.php';
?>
<body class="hold-transition sidebar-mini pace-primary">
<?=fw_preLoader();?>
<input type="hidden" id="index_avatar" value="avatar2.png">
<input type="hidden" id="index_name" value="<?= $Admin->getName() ?>">
<input type="hidden" id="index_username" value="<?= $Admin->getUserName() ?>">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav mr-auto">
            <?php
            require_once 'layers/user-menu.php';
            ?>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                            class="fa fa-th-large"></i></a>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="index.php" style="background-color: #ffffff" class="brand-link">
            <img src="dist/img/CompanyLogo.png" alt="Paniz Logo" class="brand-image elevation-1">
            <span style="color: #0c0c0c" class="brand-text font-weight-light">پنل مدیریت <?=$PROJECT__NAME?></span>
        </a>
        <div class="sidebar">
            <div>
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/avatar3.png"
                             class="img-circle elevation-2" alt="Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $Admin->getName() ?></a>
                    </div>
                </div>
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="https://icon-library.net/images/dashboard-icon-vector/dashboard-icon-vector-11.jpg"
                             class="img-circle elevation-2" alt="Image">
                    </div>
                    <div class="info">
                        <a href="index.php" class="d-block">داشبورد</a>
                    </div>
                </div>
                <nav class="mt-2">
                    <?php
                    require_once 'layers/SideBar.php';
                    ?>
                </nav>
            </div>
        </div>
    </aside>
    <div id="spinner" style="display: none"></div>
    <div class="content-wrapper" id="fw-content">
        <?php
        require_once 'layers/Dashboard.php';
        ?>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    <footer class="main-footer float-left">
        <strong>CopyRight &copy; 2019 <a href="https://parsa.best">Parsa.best</a></strong>
    </footer>
</div>
<?php
require_once 'layers/scripts.php';
?>
</body>
</html>
