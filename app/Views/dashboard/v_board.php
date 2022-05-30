<?= $this->include('template/header') ?>
<div class="content-wrapper pb-0">
    <div class="main-panel">
        <div class="main-content">
            <section class="section">
                <div class="p-0">
                    <button id="addBoard" class="btn btn-inverse-primary">
                        <i class="fas fa-stream fs-6"></i>
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
                            <button class="btn btn-inverse-success w-100">
                                <i class="fas fa-plus fs-6 btn-icon"></i>
                                &nbsp;
                                <span class="btn-icon-text">New Task</span>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?= $this->include('template/footer') ?>