<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php if (isset($title)) {
                echo $title . " - ";
            } ?><?= $set->site_title ?></title>

    <!-- base:css -->
    <link rel="stylesheet" href="<?= base_url('/assets/template/vendors/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/template/vendors/mdi/css/materialdesignicons.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('/assets/template/vendors/css/vendor.bundle.base.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/template/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/template/vendors/datatables/css/dataTables.bootstrap5.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/template/vendors/sweetalert2/sweetalert2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/template/vendors/dropify/css/dropify.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/css/jquery.auto-complete.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('/assets/template/vendors/select2/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/template/vendors/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') ?>">

    <script src="<?= base_url('/assets/template/vendors/js/vendor.bundle.base.js') ?>"></script>
    <script src="<?= base_url('/assets/template/vendors/sweetalert2/sweetalert2.all.min.js') ?>"></script>

    <script>
        var base_url = '<?= base_url(); ?>';
        var site_url = '<?= site_url(); ?>';
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="<?= base_url('/assets/logo.png') ?>" rel="icon" />
    <style>
        .form-control {
            font-size: 1em;
        }


    </style>
</head>

<body class="sidebar-icon-only">
    <div class="container-scroller d-flex">

        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
              <li class="nav-item sidebar-category">
                  <p>Arsip Pertanahan</p><span></span>
                  <p>Kabupaten Morowali</p><span></span>
              </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('/main'); ?>">
                        <i class="menu-icon mdi mdi-home"></i>
                        <span class="menu-title">Home</span>
                    </a>
                </li>
                <?php
                echo '<li class="nav-item"><a class="nav-link" href="' . site_url('/home/search') . '"><i class="menu-icon mdi mdi-folder-multiple"></i> <span class="menu-title">Semua Data</span></a></li>';
                ?>
                <?php if (isset($_SESSION['akses_modul']['entridata']) && $_SESSION['akses_modul']['entridata'] == 'on') {
                    echo '<li class="nav-item"><a class="nav-link" href="' . site_url('/admin/entr') . '"><i class="menu-icon mdi mdi-file-upload"></i> <span class="menu-title">Entri Baru</span></a></li>';
                }
                ?>

                <?php
                echo '<li class="nav-item"><a class="nav-link" href="' . site_url('/chart') . '"><i class="menu-icon mdi mdi-chart-bar"></i> <span class="menu-title">Grafik Chart</span></a></li>';
                ?>
                <?php
                if ($_SESSION['menu_master']) {
                    echo '<li class="nav-item">
							<a class="nav-link" data-bs-toggle="collapse" href="#data-master" aria-expanded="false" aria-controls="data-master">
                            <i class="menu-icon mdi mdi-wrench"></i>
                            <span class="menu-title">Data Master</span><i class="menu-arrow"></i></a>
                            <div class="collapse" id="data-master">
                            <ul class="nav flex-column sub-menu">';
                    if (isset($_SESSION['akses_modul']['user']) && $_SESSION['akses_modul']['user'] == 'on') {
                        echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"" . site_url('admin/vuser') . "\"><i class=\"fa fa-users\"></i>&nbsp; Pengguna</a></li>";
                    }
                    if (isset($_SESSION['akses_modul']['klasifikasi']) && $_SESSION['akses_modul']['klasifikasi'] == 'on') {
                        echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"" . site_url('admin/klas') . "\"><i class=\"fa fa-tag\"></i>&nbsp; Klasifikasi</a></li>";
                    }
                    if (isset($_SESSION['akses_modul']['pencipta']) && $_SESSION['akses_modul']['pencipta'] == 'on') {
                        echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"" . site_url('admin/penc') . "\"><i class=\"fa fa-home\"></i>&nbsp; Kategori Arsip</a></li>";
                    }
                    if (isset($_SESSION['akses_modul']['pengolah']) && $_SESSION['akses_modul']['pengolah'] == 'on') {
                        echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"" . site_url('admin/pengolah') . "\"><i class=\"fa fa-home\"></i>&nbsp; Unit Pengolah</a></li>";
                    }
                    if (isset($_SESSION['akses_modul']['lokasi']) && $_SESSION['akses_modul']['lokasi'] == 'on') {
                        echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"" . site_url('admin/lokasi') . "\"><i class=\"fa fa-map-marker\"></i>&nbsp; Lokasi</a></li>";
                    }
                    if (isset($_SESSION['akses_modul']['media']) && $_SESSION['akses_modul']['media'] == 'on') {
                        echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"" . site_url('admin/media') . "\"><i class=\"fa fa-film\"></i>&nbsp; Media</a></li>";
                    }
                    echo "</ul></div>
                        </li>";
                }
                ?>
                <?php
                ?>
                <?php if (isset($_SESSION['akses_modul']['import']) && $_SESSION['akses_modul']['import'] == 'on') {
                    echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"" . site_url('admin/import') . "\"><i class=\"menu-icon mdi mdi-database-import\"></i> <span class=\"menu-title\">Import Data</span></a></li>";
                    echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"" . site_url('admin/backup') . "\"><i class=\"menu-icon mdi mdi-database\"></i> <span class=\"menu-title\">Backup DB</span></a></li>";
                }
                ?>
            </ul>
        </nav>

        <!-- page-body-wrapper -->
        <div class="container-fluid page-body-wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-light bg-light col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                    <button class="navbar-toggler navbar-toggler-icon align-self-center" type="button" data-toggle="minimize"></button>
                    <div class="navbar-brand-wrapper">
                        <a class="navbar-brand brand-logo" href="<?= site_url('/main'); ?>">
                            ARSIP Pertanahan</a>
                        <a class="navbar-brand brand-logo-mini" href="<?= site_url('/main'); ?>">
                            ARSIP Pertanahan</a>
                    </div>

                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item d-none d-lg-block">
                            <!-- SEARCH FORM -->
                            <form class="ms-auto search-form d-none d-md-block" method="get" action="<?= site_url('/home/search'); ?>">
                                <div class="input-group">
                                    <input name="katakunci" class="form-control form-control-sm" type="search" placeholder="nomor arsip/kata kunci" aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn bg-primary text-white" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </li>
                    </ul>

                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?= base_url() ?>assets/images/Portrait_Placeholder.png" width="30" alt="profile" />&nbsp;
                                <span class="nav-profile-name"><?= $_SESSION['username']; ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                                <div class="dropdown-header text-center">
                                    <p class="mb-1 mt-3 font-weight-semibold"><?= $_SESSION['nama']; ?></p>
                                    <p class="font-weight-light text-muted mb-0"><?= $_SESSION['tipe']; ?></p>
                                </div>
                                <a class="dropdown-item" href="<?= site_url('pengaturan/profil'); ?>"><i class="dropdown-item-icon mdi mdi-account text-primary"></i>Profil</a>
                                <?php if ($_SESSION['tipe'] == 'admin') { ?>
                                    <a class="dropdown-item" href="<?= site_url('pengaturan'); ?>"><i class="dropdown-item-icon mdi mdi-settings text-primary"></i>Pengaturan</a>
                                <?php } else { ?>
                                <?php } ?>
                                <a class="dropdown-item" href="<?= site_url('home/logout'); ?>"><i class="dropdown-item-icon mdi mdi-power text-primary"></i>Logout</a>
                            </div>
                        </li>
                    </ul>

                    <button class="navbar-toggler navbar-toggler-icon navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas"></button>
                </div>
                <!-- /.container -->
            </nav>

            <!-- main-panel -->
            <div class="main-panel">
                <!-- content-wrapper -->
                <div class="content-wrapper">

                    <!-- SEARCH FORM -->
                    <form class="ml-auto search-form d-md-none d-lg-none d-xl-none d-sm-block mb-3" method="get" action="<?= site_url('/home/search'); ?>">
                        <div class="input-group">
                            <input name="katakunci" class="form-control" type="search" placeholder="nomor arsip/kata kunci uraian" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
