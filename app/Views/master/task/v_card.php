<?php foreach ($task as $t) : ?>
    <div class="col-md-4 col-lg-3 col-xl-3 list">
        <div id=" row-<?= $t['taskid'] ?>" class="bg-white shadow p-3 rounded">
            <div class="row">
                <div class="col-lg-10 text-start">
                    <div id="taskid" class="font-14 fw-bold text-dark tsid" tsid="<?= $t['taskid'] ?>">
                        <span id="taskname" class="me-2 sts"><?= $t['taskname'] ?></span>
                    </div>
                </div>
                <div class="col-lg-1 text-end dropstart">
                    <a href="#" id="dropdownlist" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-h text-secondary"></i>
                    </a>
                    <ul class="dropdown-menu" style="z-index: 1;" aria-labelledby="dropdownlist">
                        <li><a href="#" role="button" class="dropdown-item delist" idt="<?= $t['taskid'] ?>"><i class="fas fa-trash-alt fs-7 me-2"></i><span class="text-secondary fs-7">Delete</span></a></li>
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
            <div id="task-list-<?= $t['taskname'] ?>" style="height: max-content;" tid="<?= $t['taskid'] ?>" class="task-item">
                <ul id="list-<?= $t['taskname'] ?>" class="portlet-card-list ui-sortable list-unstyled listtask" sts="<?= $t['taskname'] ?>" style="min-height: 75px;">
                </ul>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<div class="col-md-4 col-lg-3 col-xl-3 add">
    <div id="row" class="board-portlet bg-white shadow p-3 rounded">
        <button class="btn btn-inverse-secondary w-100" style="height: 40px;" id="add_list">
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
    $('.tsid').each(function() {
        $(this).dblclick(function() {
            $.notify($(this).attr('tsid'))
        })
    });

    $('.btn-add').each(function() {
        var id = '';
        $(this).on('click', function(ev) {
            var did = $(this).attr('tsid');
            $.ajax({
                url: '<?= base_url('list/formAdd') ?>',
                type: 'post',
                dataType: 'json',
                success: function(res) {
                    $('#form-tlist').remove();
                    $(res.view).insertAfter(ev.currentTarget)
                    setTimeout(() => {
                        $('.tid').val(did);
                    }, 50);
                }
            })
        });
    });

    $('.delist').each(function() {
        $(this).on('click', function() {
            listDel('Task List', 'Anda yakin ingin hapus task ini ?', '<?= base_url('task/delete') ?>', $(this).attr('idt'));
        })
    });
</script>