<script>
    function addList() {
        var link = "<?= base_url('task/addTask') ?>",
            form = $('#formlist')[0],
            dt = new FormData(form);

        $.ajax({
            url: link,
            type: 'post',
            data: dt,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(res) {
                if (res.success == 1) {
                    $.notify('New list added', 'success');
                    $('#formlist')[0].reset();
                    setTimeout(() => {}, 50);
                    $('#list_board').load('<?= base_url('task/t') ?>')
                } else {
                    $.notify(res.msg, 'warn');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                $.notify(thrownError, 'error');
            }
        })
    }

    function addTask() {
        var link = '<?= base_url('list/addData') ?>',
            ftype = $('#form-tlist').attr('ftype'),
            pros = 'Added',
            form = $('#form-tlist')[0],
            dt = new FormData(form);

        if (ftype == 'Edit') {
            dt.append('desc', desc.getData());
            link = '<?= base_url('list/editData') ?>';
            pros = "Updated";
        }

        $.ajax({
            url: link,
            type: 'post',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: dt,
            success: function(res) {
                if (res == 1) {
                    $.notify("Task " + pros, "success");
                    $('#list_board').load('<?= base_url('task/t') ?>', function() {
                        $('#btn-upt').slideUp('fast');
                    });
                } else {
                    $.notify("Taskname cannot be empty", "warn");
                    form.reset();
                }
            }
        })
    }

    function addComment() {
        var link = '<?= base_url('comment/add') ?>',
            pros = 'Added',
            tid = $('#task').val(),
            comm = comment.getData();

        $.ajax({
            url: link,
            type: 'post',
            dataType: 'json',
            data: {
                task: tid,
                comment: comm,
            },
            success: function(res) {
                if (res.success == 1) {
                    comment.setData("");
                    $('#com-load').html(res.view);
                    $('#list_board').load('<?= base_url('task/t') ?>')
                } else {
                    $.notify(res.msg, 'warn');
                    $('#btn-com').slideUp('fast');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                $.notify(thrownError, 'error');
            }
        })
    }

    function editComment() {
        var link = '<?= base_url('comment/edit') ?>',
            pros = 'Updated',
            taskid = $('#task').val(),
            id = $('#comid').val(),
            com = comment.getData();

        $.ajax({
            url: link,
            type: 'post',
            dataType: 'json',
            data: {
                id: id,
                task: taskid,
                com: com,
            },
            success: function(res) {
                if (res.success == 1) {
                    comment.setData("");
                    $('#btn-cancel').fadeOut('fast');
                    $('#btn-com').fadeOut('fast');
                    setTimeout(({}, 50));
                    $('#btn-com').html('Send');
                    $('#com-load').html(res.view);
                } else {
                    $.notify('Data not Updated', 'error');
                    $('#btn-com').slideUp('fast');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                $.notify(thrownError, 'error');
            }
        })
    }

    $('#formlist').on('submit', function(ev) {
        ev.preventDefault();
        ev.stopImmediatePropagation();
        addList();
    });

    $('#btn-upt').on('click', function(ev) {
        ev.preventDefault();
        ev.stopImmediatePropagation();
        addTask();
    });

    $('#btn-com').on('click', function(ev) {
        ev.preventDefault();
        ev.stopImmediatePropagation();
        if ($(this).html() == 'Send') {
            addComment();
        } else if ($(this).html() == 'Edit') {
            editComment();
        }
    });
</script>