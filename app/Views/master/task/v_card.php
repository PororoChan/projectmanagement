<?php foreach ($task as $t) : ?>
    <div class="col-lg-3 col-md-4 list">
        <div id="row-<?= $t['taskname'] ?>" class="board-portlet bg-white shadow p-3 rounded">
            <div class="row">
                <div class="col-lg-10 text-start">
                    <div id="taskid" class="fs-7 fw-bold text-dark" tsid="<?= $t['taskid'] ?>">
                        <span id="taskname" class="me-2 sts"><?= $t['taskname'] ?></span>
                    </div>
                </div>
                <div class="col-lg-2 text-end">
                    <a href="#" id="dropdownlist" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-h text-secondary"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownlist">
                        <li><a role="button" class="dropdown-item edit" id="<?= $t['taskid'] ?>"><i class="fas fa-pencil-alt fs-7 me-2"></i><span class="text-secondary fs-7">Edit</span></a></li>
                        <li><a href="#" role="button" class="dropdown-item delete" id="<?= $t['taskid'] ?>"><i class="fas fa-trash-alt fs-7 me-2"></i><span class="text-secondary fs-7">Delete</span></a></li>
                    </ul>
                </div>
            </div>
            <hr class="text-secondary fw-bolder rounded" style="height: 0.05rem;">
            <button class="btn btn-inverse-light mb-2 shadow-sm border w-100" style="min-height: 45px;">
                <i class="fas fa-plus fs-7 text-primary me-2"></i>
                <span class="text-primary text-center fs-7 font-weight-bold new">
                    New Task
                </span>
            </button>
            <div id="task-list-<?= $t['taskname'] ?>" style="height: max-content;">
                <ul id="list-<?= $t['taskname'] ?>" class="portlet-card-list ui-sortable list-unstyled" sts="<?= $t['taskname'] ?>" style="min-height: 75px;">

                </ul>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?= $this->include('master/imp/sortable') ?>