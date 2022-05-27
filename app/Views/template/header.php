<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/style.css') ?>" />
    <link rel="icon" href="<?= base_url('public/assets/images/favicon.ico') ?>" />
    <link rel="stylesheet" href="<?= base_url('public/assets/vendors/mdi/css/materialdesignicons.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/vendors/flag-icon-css/css/flag-icon.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/vendors/css/vendor.bundle.base.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/vendors/jquery-bar-rating/css-stars.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('public/assets/vendors/font-awesome/css/font-awesome.min.css') ?>" />
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-chevron-double-left"></span>
                </button>
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?= base_url('public/assets/images/logo-mini.svg') ?>" alt="logo" /></a>
                </div>
                <ul class="navbar-nav">
                    <div class="row">
                    </div>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-logout d-none d-md-block me-3">
                        <a class="nav-link" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-email-outline"></i>
                        </a>
                    </li>
                    <li class="nav-item nav-logout d-none d-md-block me-2">
                        <a class="nav-link" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                            <i class="mdi mdi-bell-outline"></i>
                        </a>
                    </li>
                    <li class="nav-item nav-logout d-none d-lg-block">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-home-circle icon-lg"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>