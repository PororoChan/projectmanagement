<div class="bg-white shadow-sm me-3 w-25" style="position: sticky; top: 0px;">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav m-2 d-flex">
            <li class="nav-item w-100 rounded" style="height: 40px;">
                <a href="<?= base_url('board') ?>" class="nav-links w-100 text-dark">
                    <i class="fas fa-chalkboard text-primary m-1 me-3" style="min-width: 15px;"></i>
                    <span class="fw-semibold">Board</span>
                </a>
            </li>
            <li class="nav-item w-100 rounded">
                <a class="nav-links w-100 text-dark d-flex" id="btn-drop" data-bs-toggle="collapse" href="#ui-basic" aria-controls="ui-basic">
                    <i class="fas fa-list-check text-primary m-1 me-3" style="min-width: 15px;"></i>
                    <div class="d-flex mx-1 align-items-center">
                        <span class="fw-semibold me-3">Master</span>
                        <i class="fas fa-angle-down font-10" id="nav-drop"></i>
                    </div>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu" style="float: right;">
                        <li class="nav-items rounded">
                            <a class="nav-links text-dark" href="#">User</a>
                        </li>
                        <li class="nav-items rounded">
                            <a class="nav-links text-dark" href="#">Department</a>
                        </li>
                        <li class="nav-items rounded">
                            <a class="nav-links text-dark" href="#">Company</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item w-100 rounded" style="height: 40px;">
                <a href="#" class="nav-links w-100 text-dark">
                    <i class="fas fa-clock text-primary m-1 me-3" style="min-width: 15px;"></i>
                    <span class="fw-semibold">Sidebar</span>
                </a>
            </li>
        </ul>
    </nav>
</div>