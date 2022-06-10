<?= $this->include('inc_template/header') ?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">
<div class="content-wrapper pb-0">
    <div class="main-panel p-1">
        <div class="main-content">
            <section class="section">
                <div class="dropdown-menu">
                    <ul class="drop"></ul>
                </div>
                <div class="row p-0 w-75 text-start">
                    <div class="col d-flex justify-content-start">
                        <button id="list-board" class="btn btn-inverse-primary me-4">
                            <i class="fas fa-project-diagram fs-7 me-2"></i>
                            <span class="text-center">Board</span>
                        </button>
                        <button id="task-list" class="btn btn-inverse-success">
                            <i class="fas fa-tasks fs-7 me-2"></i>
                            <span class="text-center">To Do List</span>
                        </button>
                    </div>
                </div>
                <div class="pt-0">
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div id="row-todo" class="board-portlet p-3 rounded">
                                <div class="row">
                                    <div class="col text-start">
                                        <div id="title" class="fs-6 fw-bold text-dark">
                                            <span class="me-2 sts">TODO</span>
                                            <span id="todo-count" class="badge badge-light shadow-sm count">
                                                0
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col text-end">
                                        <i class="fas fa-ellipsis-h text-secondary"></i>
                                    </div>
                                </div>
                                <hr class="text-secondary fw-bolder rounded" style="height: 2px;">
                                <button class="btn btn-inverse-light mb-2 shadow-sm border w-100" data-coba="todo" style="min-height: 45px;">
                                    <i class="fas fa-plus fs-7 text-primary me-2"></i>
                                    <span class="text-primary text-center fs-7 font-weight-bold new">
                                        New Task
                                    </span>
                                </button>
                                <div id="task-list-todo" style="height: max-content;">
                                    <ul id="list-todo" class="portlet-card-list ui-sortable list-unstyled" sts="TODO" style="min-height: 75px;">
                                        <?php foreach ($todo as $td) : ?>
                                            <li class="portlet-card ui-sortable-handle" data-id="<?= $td['taskcode'] ?>">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="text-start"><?= $td['taskname'] ?></h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <span><?= $td['taskdesc'] ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <span class="badge badge-success badge-sm rounded fs-8"><?= $td['taskbadge'] ?></span>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div id="row-active" class="board-portlet p-3 rounded">
                                <div class="row">
                                    <div class="col text-start">
                                        <div id="title" class="fs-6 fw-bold text-dark">
                                            <span class="me-2 sts">Active</span>
                                            <span id="active-count" class="badge badge-light shadow-sm count">
                                                0
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col text-end">
                                        <i class="fas fa-ellipsis-h text-secondary"></i>
                                    </div>
                                </div>
                                <hr class="text-info fw-bolder rounded" style="height: 2px;">
                                <button class="btn btn-inverse-light mb-2 shadow-sm border w-100" data-coba="active" style="min-height: 45px;">
                                    <i class="fas fa-plus fs-7 text-primary me-2"></i>
                                    <span class="text-primary text-center fs-7 font-weight-bold new">
                                        New Task
                                    </span>
                                </button>
                                <div id="task-list-act" style="height: max-content;">
                                    <ul id="list-active" class="portlet-card-list ui-sortable list-unstyled" sts="Active" style="min-height: 75px;">
                                        <?php foreach ($active as $act) : ?>
                                            <li class="portlet-card ui-sortable-handle" data-id="<?= $act['taskcode'] ?>">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="text-start"><?= $act['taskname'] ?></h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <span><?= $act['taskdesc'] ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <span class="badge badge-success badge-sm rounded fs-8"><?= $act['taskbadge'] ?></span>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div id="row-progress" class="board-portlet p-3 rounded">
                                <div class="row">
                                    <div class="col text-start">
                                        <div id="title" class="fs-6 fw-bold text-dark">
                                            <span class="me-2 sts">In Progress</span>
                                            <span id="progress-count" class="badge badge-light shadow-sm count">
                                                0
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col text-end">
                                        <i class="fas fa-ellipsis-h text-secondary"></i>
                                    </div>
                                </div>
                                <hr class="text-warning fw-bolder rounded" style="height: 2px;">
                                <button class="btn btn-inverse-light mb-2 shadow-sm border w-100" data-coba="progress" style="min-height: 45px;">
                                    <i class="fas fa-plus fs-7 text-primary me-2"></i>
                                    <span class="text-primary text-center fs-7 font-weight-bold new">
                                        New Task
                                    </span>
                                </button>
                                <div id="task-list-prog" style="height: max-content;">
                                    <ul id="list-progress" class="portlet-card-list ui-sortable list-unstyled" sts="In Progress" style="min-height: 75px;">
                                        <?php foreach ($progress as $pg) : ?>
                                            <li class="portlet-card ui-sortable-handle" data-id="<?= $pg['taskcode'] ?>">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="text-start"><?= $pg['taskname'] ?></h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <span><?= $pg['taskdesc'] ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <span class="badge badge-success badge-sm rounded fs-8"><?= $pg['taskbadge'] ?></span>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div id="row-complete" class="board-portlet p-3 rounded">
                                <div class="row">
                                    <div class="col text-start">
                                        <div id="title" class="fs-6 fw-bold text-dark">
                                            <span class="me-2 sts">Completed</span>
                                            <span id="complete-count" class="badge badge-light shadow-sm count">
                                                0
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col text-end">
                                        <i class="fas fa-ellipsis-h text-secondary"></i>
                                    </div>
                                </div>
                                <hr class="text-success fw-bolder rounded" style="height: 2px;">
                                <button class="btn btn-inverse-light mb-2 shadow-sm border w-100" data-coba="complete" style="min-height: 45px;">
                                    <i class="fas fa-plus fs-7 text-primary me-2"></i>
                                    <span class="text-primary text-center fs-7 font-weight-bold new">
                                        New Task
                                    </span>
                                </button>
                                <div id="task-list-complete" style="height: max-content;">
                                    <ul id="list-complete" class="portlet-card-list ui-sortable list-unstyled" sts="Completed" style="min-height: 75px;">
                                        <?php foreach ($complete as $cd) : ?>
                                            <li class="portlet-card ui-sortable-handle" data-id="<?= $cd['taskcode'] ?>">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="text-start"><?= $cd['taskname'] ?></h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <span><?= $cd['taskdesc'] ?></span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <span class="badge badge-success badge-sm rounded fs-8"><?= $cd['taskbadge'] ?></span>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?= $this->include('inc_template/footer') ?>
<script type="text/javascript">
    function countRef() {
        // Count
        var ctTodo = $('#list-todo li').length,
            ctActive = $('#list-active li').length,
            ctProgress = $('#list-progress li').length,
            ctComplete = $('#list-complete li').length;

        $('#todo-count').html(ctTodo);
        $('#active-count').html(ctActive);
        $('#progress-count').html(ctProgress);
        $('#complete-count').html(ctComplete);
    }

    $(document).ready(function() {
        var sts = '',
            ids = '';

        $('.portlet-card').addClass('pb-auto pt-2 shadow-sm');

        $('.portlet-card-list').sortable({
            placeholder: "bg-secondary bg-opacity-10 rounded",
            connectWith: $('.portlet-card-list'),
            items: ".portlet-card",
            cursor: "grabbing",
            start: function(ev, ui) {
                // Rotate
                ui.item.css('transform', 'rotate(3deg)');

                // PlaceHolder
                ui.placeholder.height(ui.item.height());
                ui.placeholder.css('visibility', 'visible');

                sts = $(this).attr('sts');
            },
            stop: function(ev, ui) {
                countRef();
                ui.item.css('transform', 'rotate(0deg)');

                code = ui.item.attr('data-id');

                $.ajax({
                    url: "<?= base_url('board/switch') ?>",
                    type: 'post',
                    data: {
                        code: code,
                        status: sts,
                    },
                    dataType: 'json',
                    error: function(xhr, ajaxOptions, thrownError) {
                        $.notify(thrownError, 'error')
                    }
                });
            },
            receive: function(ev, ui) {
                sts = $(this).attr('sts');
            }
        });

        countRef();
    });
</script>