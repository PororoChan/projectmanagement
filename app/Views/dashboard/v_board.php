<?= $this->include('template/header') ?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">
<div class="content-wrapper pb-0">
    <div class="main-panel p-2">
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
                            <ul id="list-coba" class="portlet-card-list">
                                <li class="portlet-card">
                                    <div class="bg-warning">samlekom</div>
                                </li>
                                <li class="portlet-card">
                                    <div class="bg-warning">saudara</div>
                                </li>
                                <li class="portlet-card">
                                    <div class="bg-warning">ukhti</div>
                                </li>
                                <li class="portlet-card">
                                    <div class="bg-warning">salam</div>
                                </li>
                                <li class="portlet-card">
                                    <div class="bg-warning">merdeka</div>
                                </li>
                            </ul>
                        </div>
                    </div>
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
                            <ul id="list-coba-2" class="portlet-card-list">
                                <li class="portlet-card">
                                    <div class="bg-warning">samlekom</div>
                                </li>
                                <li class="portlet-card">
                                    <div class="bg-warning">saudara</div>
                                </li>
                                <li class="portlet-card">
                                    <div class="bg-warning">ukhti</div>
                                </li>
                                <li class="portlet-card">
                                    <div class="bg-warning">salam</div>
                                </li>
                                <li class="portlet-card">
                                    <div class="bg-warning">merdeka</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?= $this->include('template/footer') ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#list-coba, #list-coba-2').sortable({
            connectWith: "#list-coba, #list-coba-2",
            items: ".portlet-card",
        });
    });
</script>