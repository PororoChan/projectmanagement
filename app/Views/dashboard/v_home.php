<?= $this->include('template/header') ?>
<div class="content-wrapper pb-0">
    <div class="main-panel">
        <div class="main-content">
            <section class="section">
                <div class="p-0">
                    <button id="addBoard" class="btn btn-inverse-primary">
                        <i class="fas fa-table" style="font-size: 14px;"></i>
                        &nbsp;
                        <span class="text-center">Board</span>
                    </button>
                </div>
                <div id="board" class="row mt-4 mb-1">
                    <div id="todo" class="col-lg-3 col-md-4">
                        <div class="row">
                            <div class="col text-start">
                                <div id="title" class="fs-6 fw-bolder text-secondary">TODO</div>
                            </div>
                            <div class="col text-end">
                                <i class="fas fa-ellipsis-h text-secondary"></i>
                            </div>
                        </div>
                        <hr>
                        <div id="task-list-todo" class="rounded" style="height: max-content;">
                            <input type="text" id="add-todo" placeholder="Add To Do" class="form-control form-control-sm text-secondary rounded">
                            <div id="todo-list" class="mt-2">

                            </div>
                        </div>
                    </div>
                    <div id="review" class="col-lg-3 col-md-4">
                        <div class="row">
                            <div class="col text-start">
                                <div id="title" class="fs-6 fw-bolder text-secondary">Review</div>
                            </div>
                            <div class="col text-end">
                                <i class="fas fa-ellipsis-h text-secondary"></i>
                            </div>
                        </div>
                        <hr>
                        <div id="task-list-review" class="h-100 rounded" style="height: max-content;">
                            <input type="text" placeholder="Add Review" class="form-control form-control-sm text-secondary rounded">
                        </div>
                    </div>
                    <div id="finish" class="col-lg-3 col-md-4">
                        <div class="row">
                            <div class="col text-start">
                                <div id="title" class="fs-6 fw-bolder text-secondary">Finish</div>
                            </div>
                            <div class="col text-end">
                                <i class="fas fa-ellipsis-h text-secondary"></i>
                            </div>
                        </div>
                        <hr>
                        <div id="task-list-finish" class="h-100 rounded" style="height: max-content;">
                            <input type="text" placeholder="Add Finished" class="form-control form-control-sm text-secondary rounded">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?= $this->include('template/footer') ?>
</div>