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
            link = '<?= base_url('list/editData') ?>';
            pros = "Updated"
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
                    setTimeout(() => {
                        $.notify("Task " + pros, "success")
                        setTimeout(() => {
                            $('#list_board').load('<?= base_url('task/t') ?>')
                        }, 55);
                    }, 50);
                } else {
                    $.notify("Taskname cannot be empty", "warn");
                    $('#form-tlist')[0].reset();
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
                comment.setData("")
                $('#com-load').html(res.view)
            },
            error: function(xhr, ajaxOptions, thrownError) {
                $.notify(thrownError, 'error');
            }
        })
    }

    $(document).ready(function() {
        $('#formlist').on('submit', function(ev) {
            ev.preventDefault()
            addList();
        });

        $('#btn-upt').on('click', function(ev) {
            ev.preventDefault()
            addTask();
        })

        $('#btn-com').on('click', function(ev) {
            addComment();
        })
    });
</script>