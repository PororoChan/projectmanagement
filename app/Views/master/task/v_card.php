<?php foreach ($task as $t) : ?>
    <div class="col-md-4 scol-lg-3 list min-vh-100" tasid="<?= $t['taskid'] ?>" seq="<?= $t['seq'] ?>">
        <div id="<?= $t['taskid'] ?>" class="bg-white shadow p-2 list-hover rounded">
            <div class="row d-flex handle justify-content-between">
                <div class="col-lg-10 text-start">
                    <div id="taskid" class="fs-7 fw-bold p-1 text-dark tsid" tsid="<?= $t['taskid'] ?>" spellcheck="false" contenteditable="true">
                        <span id="taskname" class="me-2 sts" spellcheck="false"><?= $t['taskname'] ?></span>
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
            <hr class="text-secondary fw-bolder mt-1 mb-2 rounded" style="height: 0.05rem;">
            <button class="btn btn-inverse-light mb-0 border w-100 btn-add" tsid="<?= $t['taskid'] ?>" style="min-height: 45px;">
                <i class="fas fa-plus fs-7 text-primary me-2"></i>
                <span class="text-primary text-center fs-7 font-weight-bold new">
                    New Task
                </span>
            </button>
            <div tid="<?= $t['taskid'] ?>" class="task-item">
                <ul class="portlet-card-list list-unstyled overflow-auto mt-1 mb-0" sts="<?= $t['taskid'] ?>" style="min-height: 35px; max-height: 55vh;">
                    <?php foreach ($tasklist->getAll($t['taskid']) as $list) : ?>
                        <li class="portlet-card bg-white border p-3 rounded" tlid="<?= $list['id'] ?>">
                            <div class="portlet-card-header mb-0">
                                <div class="text-dark fw-semibold font-14 me-2 d-flex justify-content-between">
                                    <span class="w-100 fs-7" style="overflow-wrap: break-word;"><?= $list['tasklistname'] ?></span>
                                    <div>
                                        <a href="#" data-bs-toggle="dropdown" id="dropdownMenu" data-target="#dropdownMenu">
                                            <i class="fas fa-ellipsis-v fs-5 text-secondary"></i>
                                        </a>
                                        <ul class="dropdown-menu shadow-sm" id="dropdownMenu">
                                            <li><a class="dropdown-item taskedit" tname="<?= $list['tasklistname'] ?>" taskid="<?= $list['id'] ?>" href="#"><i class="fas fa-pencil-alt text-warning fs-7 me-2"></i><span class="text-secondary fs-7 fw-bolder">Edit</span></a></li>
                                            <li><a class="dropdown-item deltasklist" dtid="<?= $list['id'] ?>" href="#"><i class="fas fa-trash text-danger fs-7 me-2"></i><span class="text-secondary fs-7 fw-bolder">Delete</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php if ($list['description'] != '') { ?>
                                <div class="portlet-card-body">
                                    <div class="text-secondary text-start fw-semibold font-13" style="overflow-wrap: break-word;">
                                        <?= $list['description'] ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<div class="col-md-4 scol-lg-3 add">
    <div id="row" class="board-portlet bg-white shadow p-2 rounded">
        <button class="btn btn-success w-100 add_list" style="height: 40px;" id="add_list">
            <i class="fas fa-plus fs-7 me-2"></i>
            <span class="text-center font-weight-bold">Add List</span>
        </button>
        <div class="mt-2 w-100" style="height: max-content; display: none;" id="list-append">

        </div>
    </div>
</div>
<?= $this->include('master/imp/process') ?>
<?= $this->include('master/imp/sortable') ?>
<script>
    $('#add_list').on('click', function() {
        $.ajax({
            url: '<?= base_url('task/formAdd') ?>',
            type: 'POST',
            success: function(res) {
                $('#list-append').fadeToggle('fast', function() {
                    $(this).html(res);
                })
            }
        })
    });

    $('.tsid').each(function() {
        var self = $(this);
        $(this).focusin(function(elem) {
            elem.currentTarget.classList.add('edit-active');
            // Select All
            setTimeout(function() {
                document.execCommand('selectAll', false, null)
            }, 0);
        });
        $(this).focusout(function(el) {
            el.currentTarget.classList.remove('edit-active');
        });
        $(this).keydown(function(e) {
            if (e.keyCode == 13) {
                e.preventDefault()
                var id = $(this).attr('tsid'),
                    dt = $(this).text().trim();

                $.ajax({
                    url: '<?= base_url('task/editData') ?>',
                    type: 'post',
                    data: {
                        id: id,
                        dt: dt,
                    },
                    dataType: 'json',
                    success: function(res) {
                        if (res.success == 1) {
                            // FocusOut 
                            $.notify('Taskname Updated', 'success');
                            self.blur();
                        } else {
                            $.notify(res.msg, 'error')
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        $.notify(thrownError, 'error');
                    }
                })
            }
        });
    })

    $('.btn-add').each(function() {
        var self = $(this);
        $(this).on('click', function(ev) {
            var did = $(this).attr('tsid'),
                link = '<?= base_url('list/formAdd') ?>';

            $.ajax({
                url: link,
                type: 'post',
                dataType: 'json',
                success: function(res) {
                    $('#form-tlist').remove();
                    $(res.view).insertAfter(self)
                    setTimeout(() => {
                        $('.tid').val(did);
                    }, 50);
                }
            })
        });
    });

    $('.taskedit').each(function() {
        var self = $(this);
        $(this).on('click', function() {
            var did = $(this).attr('taskid'),
                link = "<?= base_url('list/editView') ?>" + '/' + did;

            $.ajax({
                url: link,
                type: 'post',
                dataType: 'json',
                success: function(res) {
                    $('#modalcrud').modal('toggle');
                    $('#title-del').text(self.attr('tname'));
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