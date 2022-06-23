<div class="bg-white shadow-sm me-3 w-25 rounded" style="position: sticky; top: 0px;">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav m-2 d-flex">
            <li class="nav-item nav-items w-100 rounded" style="height: 40px;">
                <a href="<?= base_url('board') ?>" class="nav-link w-100 text-dark">
                    <i class="fas fa-chalkboard text-dark m-1 me-3" style="min-width: 15px;"></i>
                    <span class="fw-bold">Board</span>
                </a>
            </li>
            <li class="nav-item w-100 rounded">
                <div class="nav-items rounded">
                    <a class="nav-links w-100 text-dark d-flex" id="btn-drop" data-bs-toggle="collapse" href="#ui-basic" aria-controls="ui-basic">
                        <i class="fas fa-list-check text-dark m-1 me-3" style="min-width: 15px;"></i>
                        <div class="mx-1 w-100 d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Master</span>
                            <i class="fas fa-angle-down font-10" id="nav-drop"></i>
                        </div>
                    </a>
                </div>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu" style="float: right;">
                        <li class="nav-items rounded">
                            <a class="nav-links text-dark" href="#">User</a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Log Out Button -->
            <li class="nav-items m-3 w-100 rounded" style="height: 40px;">
                <a class="btn btn-primary w-100" href="<?= base_url('logout') ?>">
                    <i class="fas fa-sign-out-alt fs-7 me-2"></i>
                    <span class="fs-7 fw-bold">Log Out</span>
                </a>
            </li>
        </ul>
    </nav>
</div>