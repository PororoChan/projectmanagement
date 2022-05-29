<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/style.css') ?>" />
    <link rel="icon" href="<?= base_url('public/assets/images/favicon.png') ?>" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?= base_url('public/assets/vendors/css/vendor.bundle.base.css') ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="container-scroller">
        <?= $this->include('template/sidebar') ?>
        <div class="container-fluid page-body-wrapper">
            <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="fas fa-bars fa-xs"></span>
                    </button>
                    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                        <!-- <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?= base_url('public/assets/images/logo-mini.svg') ?>" alt="logo" /></a> -->
                    </div>
                    <ul class="navbar-nav">
                        <div class="row">
                        </div>
                    </ul>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-logout d-none d-md-block me-3">
                            <a class="nav-link" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </li>
                        <li class="nav-item nav-logout d-none d-md-block me-2">
                            <a class="nav-link" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                                <i class="fas fa-bell"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>