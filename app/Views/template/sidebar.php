<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile border-bottom">
            <a href="#" class="nav-link flex-column">
                <div class="nav-profile-image">
                    <img src="<?= base_url('public /assets/images/faces/face1.jpg') ?>" alt="profile" />
                </div>
                <div class="nav-profile-text d-flex ms-0 mb-3 flex-column">
                    <span class="mb-1 mt-2 text-center">Antonio Olson</span>
                </div>
            </a>
        </li>
        <li class="nav-item pt-3">
            <a class="nav-link d-block" href="#">
                <img class="sidebar-brand-logo" src="<?= base_url('public/assets/images/logo.svg') ?>" alt="" />
                <img class="sidebar-brand-logomini" src="<?= base_url('public/assets/images/logo-mini.svg') ?>" alt="" />
            </a>
        </li>
        <li class="pt-2 pb-1">
            <span class="nav-item-head">Dashboard</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('home') ?>">
                <i class="mdi mdi-home-outline menu-icon"></i>
                <span class="menu-title">Home</span>
            </a>
        </li>
    </ul>
</nav>