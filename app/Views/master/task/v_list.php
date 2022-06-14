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
                    </div>
                </div>
                <div class="pt-4">
                    <div class="row board-list" style="height: max-content;">
                        <?php foreach ($task as $t) : ?>
                            <div class="col-lg-3 col-md-4 list">
                                <div id="row-<?= $t['taskid'] ?>" class="board-portlet bg-white shadow p-3 rounded">
                                    <div class="row">
                                        <div class="col text-start">
                                            <div id="taskid" class="fs-7 fw-bold text-dark" tsid="<?= $t['taskid'] ?>">
                                                <span id="taskname" class="me-2 sts"><?= $t['taskname'] ?></span>
                                            </div>
                                        </div>
                                        <div class="col text-end">
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
                        <div class="col-lg-3 col-md-4 add">
                            <div id="row" class="board-portlet bg-white shadow p-3 rounded">
                                <button class="btn btn-inverse-secondary w-100" style="height: 40px;" id="add_list">
                                    <i class="fas fa-plus fs-7 me-2"></i>
                                    <span class="text-center font-weight-bold">Add List</span>
                                </button>
                                <div class="mt-4 w-100" style="height: max-content;" id="list-append">

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
<script>
    // Edit List
    $('.edit').each(function() {
        $(this).on('click', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: "<?= base_url('board/formAddList') ?>" + '/' + id,
                type: 'post',
                success: function(res) {
                    $('#list-append').html(res);
                }
            })
        });
    });

    // Delete List
    $('.delete').each(function() {
        $(this).on('click', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: "<?= base_url('board/deleteList') ?>",
                type: 'post',
                dataType: 'json',
                data: {
                    id: id,
                },
                success: function(res) {
                    // Refresh Content
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    $.notify(thrownError, 'error');
                }
            })
        });
    });
</script>