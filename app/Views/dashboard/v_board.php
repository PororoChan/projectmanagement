<?= $this->include('template/header') ?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">
<div class="content-wrapper pb-0">
    <div class="main-panel p-1">
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
                <div class="pt-2">
                    <div class="row flex-grow">
                        <div class="col-lg-3 col-md-4">
                            <div id="row-todo" class="board-portlet p-3 rounded">
                                <div class="row">
                                    <div class="col text-start">
                                        <div id="title" class="fs-6 fw-bold text-dark">
                                            <span class="me-2">TODO</span>
                                            <span id="todo-count" class="badge badge-light shadow-sm">
                                                0
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col text-end">
                                        <a href="#" id="drop-todo" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h text-secondary"></i></a>
                                        <ul class="dropdown-menu" aria-labelledby="drop-todo">
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-pen text-dark fs-7 me-2"></i><span class="fs-7 text-dark fw-bolder">Edit</span></a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-trash text-dark fs-7 me-2"></i><span class="fs-7 text-dark fw-bolder">Delete</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <hr class="text-secondary fw-bolder">
                                <button class="btn btn-light mb-2 shadow-sm border w-100" style="min-height: 45px;">
                                    <i class="fas fa-plus fs-7 text-primary me-2"></i>
                                    <span class="text-primary text-center fs-7 font-weight-bold">
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
                            <div id="row-review" class="board-portlet p-3 rounded">
                                <div class="row">
                                    <div class="col text-start">
                                        <div id="title" class="fs-6 fw-bold text-dark">
                                            <span class="me-2">Review</span>
                                            <span id="review-count" class="badge badge-light shadow-sm">
                                                0
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col text-end">
                                        <i class="fas fa-ellipsis-h text-secondary"></i>
                                    </div>
                                </div>
                                <hr class="text-secondary fw-bolder">
                                <button class="btn btn-inverse-light mb-2 shadow-sm border w-100" style="min-height: 45px;">
                                    <i class="fas fa-plus fs-7 text-primary me-2"></i>
                                    <span class="text-primary text-center fs-7 font-weight-bold">
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
        $('.portlet-card').addClass('pb-auto pt-1 shadow-sm hover-board');

        $('#list-todo, #list-review, #list-finish').sortable({
            placeholder: "bg-secondary bg-opacity-10 rounded",
            connectWith: "#list-todo, #list-review, #list-finish",
            items: ".portlet-card",
            start: function(ev, ui) {
                $('.portlet-card').removeClass('hover-board');
                $('.portlet-card').addClass('grab-board');

                // Rotate
                ui.item.css('transform', 'rotate(3deg)')

                // PlaceHolder
                ui.placeholder.height(ui.item.height());
                ui.placeholder.css('visibility', 'visible');
            },
            stop: function(ev, ui) {
                reload();
                ui.item.css('transform', 'rotate(0deg)')
            },
        });

        reload();

    });
</script>