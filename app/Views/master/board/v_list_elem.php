<div class="col-lg-3 col-md-4 list">
    <div id="" class="board-portlet p-3 bg-white shadow rounded">
        <div class="row">
            <div class="col text-start">
                <div id="title" class="fs-7 fw-bold text-dark">
                    <span class="me-2 sts"><?= $titlerow ?></span>
                    <span class="badge badge-light shadow-sm count">
                        0
                    </span>
                </div>
            </div>
            <div class="col text-end">
                <a href="#" id="dropdownlist" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-h text-secondary"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownlist">
                    <li><a href="#" role="button" id="edit" class="dropdown-item"><i class="fas fa-pencil-alt fs-7 me-2"></i><span class="text-secondary fs-7">Edit</span></a></li>
                    <li><a href="#" role="button" class="dropdown-item"><i class="fas fa-trash-alt fs-7 me-2"></i><span class="text-secondary fs-7">Delete</span></a></li>
                </ul>
            </div>
        </div>
        <hr class="text-secondary fw-bolder rounded" style="height: 0.1rem;">
        <button class="btn btn-inverse-light mb-2 shadow-sm border w-100" style="min-height: 45px;">
            <i class="fas fa-plus fs-7 text-primary me-2"></i>
            <span class="text-primary text-center fs-7 font-weight-bold new">
                New Task
            </span>
        </button>
        <div style="height: max-content;">
            <ul id="list-<?= $titlerow ?>" class="portlet-card-list ui-sortable list-unstyled" sts="<?= $titlerow ?>" style="min-height: 75px;">

            </ul>
        </div>
    </div>
</div>