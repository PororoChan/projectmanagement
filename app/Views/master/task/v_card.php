<?php foreach ($task as $t) : ?>
    <div class="col-md-4 scol-lg-3 col-lg-2 list min-vh-100" tasid="<?= $t['taskid'] ?>">
        <div id="<?= $t['taskid'] ?>" class="bg-white shadow p-2 list-hover rounded">
            <div class="row d-flex handle justify-content-between">
                <div class="col-lg-10 text-start">
                    <div id="taskid" class="font-12 fw-bold p-1 text-dark tsid" tsid="<?= $t['taskid'] ?>" spellcheck="false" contenteditable="true">
                        <span id="taskname" class="font-12 me-2 sts" spellcheck="false"><?= $t['taskname'] ?></span>
                    </div>
                </div>
                <div class="col-lg-1 d-flex justify-content-end dropstart">
                    <a href="" id="dropdownlist" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-h text-secondary"></i>
                    </a>
                    <ul class="dropdown-menu p-1 m-0 shadow-sm" aria-labelledby="dropdownlist">
                        <li><a href="#" role="button" class="dropdown-item delist rounded" idt="<?= $t['taskid'] ?>"><i class="fas fa-trash text-danger fs-7 me-3"></i><span class="text-dark fw-bold fs-7">Delete</span></a></li>
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
                        <li class="portlet-card task-hover bg-white border rounded" tlid="<?= $list['id'] ?>">
                            <a href="#" class="text-decoration-none text-dark p-0 taskedit" lname="<?= $t['taskname'] ?>" tname="<?= $list['tasklistname'] ?>" taskid="<?= $list['id'] ?>">
                                <div class="p-3">
                                    <div class="portlet-card-header mb-0">
                                        <div class="text-dark fw-semibold d-flex justify-content-between">
                                            <span class="font-13" style="max-width: 215px; overflow-wrap: break-word;"><?= $list['tasklistname'] ?></span>
                                            <div class="btn_options top-0" style="height: 0px; display: none;">
                                                <button class="btn btn-sm btn-light deltasklist" dtid="<?= $list['id'] ?>" href="#">
                                                    <i class="fas fa-trash text-danger fs-7sep"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center pt-1" style="width: max-content;">
                                        <?php if ($list['description'] != '') { ?>
                                            <i class="fas fa-align-left font-11 text-secondary me-2" title="Task Description"></i>
                                        <?php } ?>
                                        <?php if ($comment->countAll($list['id']) > 0) { ?>
                                            <div title="Comments" class="pb-0 pt-0 mt-0 mb-0">
                                                <i class="far fa-comment font-11 text-secondary"></i>
                                                <span class="font-11 text-dark"><?= $comment->countAll($list['id']) ?></span>
                                            </div>
                                        <?php } else { ?>
                                            <div></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </a>
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
    $('.task-hover').hover(
        function() {
            $(this).closest('.task-hover').find('.btn_options').fadeIn('fast');
            $(this).addClass('task-hovered');
        },
        function() {
            $(this).closest('.task-hover').find('.btn_options').fadeOut('fast');
            $(this).removeClass('task-hovered');
        }
    );

    $('#add_list').on('click', function() {
        $.ajax({
            url: '<?= base_url('task/formAdd') ?>',
            type: 'POST',
            success: function(res) {
                $('#list-append').slideToggle('fast', function() {
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
        $(this).on('click', function(e) {
            e.preventDefault()
            var did = $(this).attr('taskid'),
                link = "<?= base_url('list/editView') ?>" + '/' + did;

            $.ajax({
                url: link,
                type: 'post',
                dataType: 'json',
                success: function(res) {
                    $('#modalcrud').modal('toggle');
                    $('#title-del').text(self.attr('tname'));
                    $('#title-list').text(self.attr('lname'));
                    $('#modalbody').html(res.view);
                }
            })
        })
    })

    $('.delist').each(function() {
        $(this).on('click', function() {
            listDel('Task List', 'Anda yakin ingin hapus list ini ?', '<?= base_url('task/delete') ?>', $(this).attr('idt'));
        })
    });

    $('.deltasklist').each(function() {
        $(this).on('click', function(el) {
            el.stopPropagation();
            listDel('Task List', 'Anda yakin ingin hapus task ini ?', '<?= base_url('list/delete') ?>', $(this).attr('dtid'));
        })
    })
</script>