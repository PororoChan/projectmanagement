<?php foreach ($task as $t) : ?>
    <div class="col-md-4 col-lg-3 col-xl-3 list" seq="<?= $t['seq'] ?>">
        <div id="<?= $t['taskid'] ?>" class="bg-white shadow p-3 rounded">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-10 text-start">
                    <div id="taskid" class="font-14 fw-bold text-dark tsid" tsid="<?= $t['taskid'] ?>">
                        <span id="taskname" class="me-2 sts"><?= $t['taskname'] ?></span>
                    </div>
                </div>
                <div class="col-lg-1 d-flex justify-content-end dropstart">
                    <a href="" id="dropdownlist" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-h text-secondary"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownlist">
                        <li><a href="#" role="button" class="dropdown-item delist" idt="<?= $t['taskid'] ?>"><i class="fas fa-trash text-danger fs-7 me-2"></i><span class="text-secondary fw-bolder fs-7">Delete</span></a></li>
                    </ul>
                </div>
            </div>
            <hr class="text-secondary fw-bolder mt-2 mb-2 rounded" style="height: 0.05rem;">
            <button class="btn btn-inverse-light mb-2 shadow-sm border w-100 btn-add" tsid="<?= $t['taskid'] ?>" style="min-height: 45px;">
                <i class="fas fa-plus fs-7 text-primary me-2"></i>
                <span class="text-primary text-center fs-7 font-weight-bold new">
                    New Task
                </span>
            </button>
            <div id="task-list-<?= $t['taskname'] ?>" tid="<?= $t['taskid'] ?>" class="task-item" style="overflow-y: auto;">
                <ul id="list-<?= $t['taskname'] ?>" class="portlet-card-list list-unstyled p-1" sts="<?= $t['taskid'] ?>" style="min-height: 75px; max-height: 400px;">
                    <?php foreach ($tasklist->getAll($t['taskid']) as $list) : ?>
                        <div class="portlet-card bg-white border shadow-sm p-3 rounded" tlid="<?= $list['id'] ?>">
                            <div class="portlet-card-header mb-1">
                                <div class="text-dark fw-semibold font-14 me-2 d-flex justify-content-between">
                                    <?= $list['tasklistname'] ?>
                                    <div class="dropstart">
                                        <a href="" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownMenu">
                                            <i class="fas fa-ellipsis-v fs-5 text-secondary"></i>
                                        </a>
                                        <ul class="dropdown-menu position-absolute shadow-sm" aria-labelledby="dropdownMenu">
                                            <li><a class="dropdown-item taskedit" taskid="<?= $list['id'] ?>" href="#"><i class="fas fa-pencil-alt text-warning fs-7 me-2"></i><span class="text-secondary fs-7 fw-bolder">Edit</span></a></li>
                                            <li><a class="dropdown-item deltasklist" dtid="<?= $list['id'] ?>" href="#"><i class="fas fa-trash text-danger fs-7 me-2"></i><span class="text-secondary fs-7 fw-bolder">Delete</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-card-body pt-3">
                                <div class="text-secondary fw-semibold font-13" style="overflow-wrap: break-word;">
                                    <?= $list['description'] ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<div class="col-md-4 col-lg-3 col-xl-3 add">
    <div id="row" class="board-portlet bg-white shadow p-3 rounded">
        <button class="btn btn-success w-100 add_list" style="height: 40px;" id="add_list">
            <i class="fas fa-plus fs-7 me-2"></i>
            <span class="text-center font-weight-bold">Add List</span>
        </button>
        <div class="mt-4 w-100" style="height: max-content;" id="list-append">

        </div>
    </div>
</div>
<?= $this->include('master/imp/list') ?>
<?= $this->include('master/imp/sortable') ?>
<script>
    $('#add_list').on('click', function() {
        $.ajax({
            url: '<?= base_url('task/formAdd') ?>',
            type: 'post',
            success: function(res) {
                $('#list-append').html(res);
            }
        })
    });

    $('.tsid').each(function() {
        $(this).dblclick(function() {
            $.notify($(this).attr('tsid'))
        })
    });

    $('.btn-add').each(function() {
        $(this).on('click', function(ev) {
            var did = $(this).attr('tsid'),
                link = '<?= base_url('list/formAdd') ?>';

            $.ajax({
                url: link,
                type: 'post',
                dataType: 'json',
                success: function(res) {
                    $('#form-tlist').remove();
                    $(res.view).insertAfter(ev.currentTarget).msmarv
                    setTimeout(() => {
                        $('.tid').val(did);
                    }, 50);
                }
            })
        });
    });

    $('.taskedit').each(function() {
        $(this).on('click', function() {
            var did = $(this).attr('taskid'),
                link = "<?= base_url('list/editView') ?>" + '/' + did;

            $.ajax({
                url: link,
                type: 'post',
                dataType: 'json',
                success: function(res) {
                    $('#modalcrud').modal('toggle');
                    $('#modalbody').html(res.view);
                }
            })
        })
    })

    $('.delist').each(function() {
        $(this).on('click', function() {
            listDel('Task List', 'Anda yakin ingin hapus task ini ?', '<?= base_url('task/delete') ?>', $(this).attr('idt'));
        })
    });

    $('.deltasklist').each(function() {
        $(this).on('click', function() {
            listDel('Task List', 'Anda yakin ingin hapus task ini ?', '<?= base_url('list/delete') ?>', $(this).attr('dtid'));
        })
    })
</script>