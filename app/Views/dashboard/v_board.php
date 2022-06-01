<?= $this->include('template/header') ?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">
<div class="content-wrapper pb-0">
    <div class="main-panel p-3">
        <div class="main-content">
            <section class="section">
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
                <div class="board-wrapper pt-4">
                    <div class="row flex-grow">
                        <div class="col-lg-3 col-md-4">
                            <div id="row-todo" class="board-portlet p-4 bg-secondary bg-opacity-25 rounded">
                                <div class="row">
                                    <div class="col text-start">
                                        <div id="title" class="fs-6 fw-bold text-dark">
                                            <span class="me-2">TODO</span>
                                            <span id="todo-count" class="badge badge-light">
                                                0
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col text-end">
                                        <i class="fas fa-ellipsis-h text-secondary"></i>
                                    </div>
                                </div>
                                <hr class="text-secondary fw-bolder">
                                <button class="btn btn-light shadow-sm w-100">
                                    <i class="fas fa-plus fs-7 text-primary me-2"></i>
                                    <span class="text-primary text-center fs-7 font-weight-semibold">
                                        New Task
                                    </span>
                                </button>
                                <div id="task-list-todo" style="height: max-content;">
                                    <ul id="list-todo" class="portlet-card-list ui-sortable list-unstyled" style="min-height: 75px;">
                                        <?php foreach ($row as $r) : ?>
                                            <li class="portlet-card ui-sortable-handle">
                                                <div class="card rounded">
                                                    <div class="card-header">
                                                        <h5 class="text-start text-secondary">
                                                            <?= $r['name'] ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div id="row-todo" class="board-portlet p-4 bg-secondary bg-opacity-25 rounded">
                                <div class="row">
                                    <div class="col text-start">
                                        <div id="title" class="fs-6 fw-bold text-dark">
                                            <span class="me-2">Review</span>
                                            <span id="review-count" class="badge badge-light">
                                                0
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col text-end">
                                        <i class="fas fa-ellipsis-h text-secondary"></i>
                                    </div>
                                </div>
                                <hr class="text-secondary fw-bolder">
                                <button class="btn btn-light shadow-sm w-100">
                                    <i class="fas fa-plus fs-7 text-primary me-2"></i>
                                    <span class="text-primary text-center fs-7 font-weight-semibold">
                                        New Task
                                    </span>
                                </button>
                                <div id="task-list-todo" style="height: max-content;">
                                    <ul id="list-review" class="portlet-card-list ui-sortable list-unstyled" style="min-height: 75px;">
                                        <?php foreach ($row as $r) : ?>
                                            <li class="portlet-card ui-sortable-handle">
                                                <div class="card rounded">
                                                    <div class="card-header">
                                                        <h5 class="text-start text-secondary">
                                                            <?= $r['username'] ?>
                                                        </h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <span class="fs-7">
                                                            <?= $r['name'] ?>
                                                        </span>
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
<?= $this->include('template/footer') ?>
<script type="text/javascript">
    function reload() {
        // Count
        var Ctodo = $('#list-todo li').length;
        $('#todo-count').html(Ctodo);

        var Creview = $('#list-review li').length;
        $('#review-count').html(Creview);
    }

    $(document).ready(function() {
        $('.portlet-card').addClass('pb-0 pt-1');

        $('#list-todo, #list-review, #list-finish').sortable({
            connectWith: "#list-todo, #list-review, #list-finish",
            items: ".portlet-card",
            stop: function(ev) {
                reload();
            }
        });

        reload();

    });
</script>