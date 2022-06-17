<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title ?></title>
    <style>
        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar:horizontal {
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            border-radius: 10px;
            background: #f2f2f2;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background: #A6A6A6;
        }

        ::-webkit-scrollbar-thumb:horizontal {
            border-radius: 10px;
            background: #A6A6A6;
        }
    </style>
    <link rel="icon" href="<?= base_url('public/assets/images/logo.ico') ?>" />

    <?= $this->include('v_script') ?>
</head>

<body>
    <div class="container-scroller">
        <div class="horizontal-menu">
            <nav class="navbar top-navbar col-lg-12 col-12 p-0">
                <div class="container-fluid">
                    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                        <a class="navbar-brand brand-logo" href="#">
                            <span class="font-16 d-block font-weight-bold">Project Management</span>
                        </a>
                        <a class="navbar-brand brand-logo-mini" href="#"><img src="<?= base_url('public/assets/images/logo-mini.svg') ?>" /></a>
                    </div>
                    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                        <ul class="navbar-nav mr-lg-2">
                            <li class="nav-item nav-search d-none d-lg-block">
                                <div class="input-group">
                                    <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                                        <span class="input-group-text" id="search">
                                            <i class="fas fa-search text-dark fs-6"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control text-secondary" id="navbar-search-input" placeholder="Search" aria-label="search" aria-describedby="search" />
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav navbar-nav-right">
                            <li class="nav-item">
                                <a class="text-secondary" href="#">
                                    <i class="far fa-envelope fs-6"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="text-secondary" href="#">
                                    <i class="far fa-bell fs-6"></i>
                                </a>
                            </li>
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="nav-profile-img">
                                        <img src="<?= base_url('public/assets/images/faces/avatar.png') ?>" />
                                    </div>
                                    <div class="nav-profile-text">
                                        <p class="text-black font-weight-semibold m-0"> <?= session()->get('name') ?> </p>
                                        <span class="font-12 online-color me-3">Online <i class="fas fa-chevron-down fs-8"></i></span>
                                    </div>
                                </a>
                                <div class="dropdown-menu bg-white navbar-dropdown" aria-labelledby="profileDropdown">
                                    <a class="dropdown-item" href="<?= base_url('logout') ?>">
                                        <i class="fas fa-sign-out-alt fs-7 me-2 text-danger"></i>
                                        <span class="fs-7">
                                            Log Out
                                        </span>
                                    </a>
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
                            <a class="nav-link justify-content-center" href="<?= base_url('home') ?>">
                                <i class="far fa-compass menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link justify-content-center" href="<?= base_url('board') ?>">
                                <i class="fas fa-chart-bar fs-6 menu-icon"></i>
                                <span class="menu-title">Board</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container-fluid page-body-wrapper" style="overflow-x: scroll; overflow-y: hidden;">