<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Home</title>

    <!-- CSS Import -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Base CSS -->
    <link rel="stylesheet" href="<?= base_url('public/assets/css/style.css') ?>" />
    <link rel="icon" href="<?= base_url('public/assets/images/favicon.png') ?>" />
    <link rel="stylesheet" href="<?= base_url('public/assets/vendors/css/vendor.bundle.base.css') ?>">
</head>

<body>
    <div class="container-scroller">
        <div class="horizontal-menu">
            <nav class="navbar top-navbar col-lg-12 col-12 p-0">
                <div class="container">
                    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                        <a class="navbar-brand brand-logo" href="#">
                            <img src="#" alt="logo" />
                            <span class="font-12 d-block font-weight-light">Project Management</span>
                        </a>
                        <a class="navbar-brand brand-logo-mini" href="#"><img src="<?= base_url('public/assets/images/logo-mini.svg') ?>" /></a>
                    </div>
                    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                        <ul class="navbar-nav mr-lg-2">
                            <li class="nav-item nav-search d-none d-lg-block">
                                <div class="input-group">
                                    <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                                        <span class="input-group-text" id="search">
                                            <i class="fas fa-search fs-6"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" id="navbar-search-input" placeholder="Search" aria-label="search" aria-describedby="search" />
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav navbar-nav-right">
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="nav-profile-img">
                                        <img src="<?= base_url('public/assets/images/faces/avatar-1.png') ?>" />
                                    </div>
                                    <div class="nav-profile-text">
                                        <p class="text-black font-weight-semibold m-0"> <?= session()->get('name') ?> </p>
                                        <span class="font-13 online-color">online <i class="fas fa-chevron-down fs-8"></i></span>
                                    </div>
                                </a>
                                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-sync fs-7 me-2 text-success"></i> Activity Log </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url('logout') ?>">
                                        <i class="fas fa-sign-out-alt fs-7 me-2 text-primary"></i> Log Out </a>
                                </div>
                            </li>
                        </ul>
                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                            <span class="fas fa-bars"></span>
                        </button>
                    </div>
                </div>
            </nav>
            <nav class="bottom-navbar">
                <div class="container">
                    <ul class="nav page-navigation">
                        <li class="nav-item">
                            <a class="nav-link justify-content-end" href="<?= base_url('home') ?>">
                                <i class="fas fa-compass menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link justify-content-end" href="<?= base_url('board') ?>">
                                <i class="fas fa-clipboard fs-6 menu-icon"></i>
                                <span class="menu-title">Board</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container-fluid page-body-wrapper">