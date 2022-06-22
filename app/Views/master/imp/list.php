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
                        $('#form-tlist')[0].reset();
                        $('#modalcrud').modal('hide')
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

    $('#formlist').on('submit', function(ev) {
        ev.preventDefault()
        addList();
    });

    $('#form-tlist').on('submit', function(ev) {
        ev.preventDefault()
        addTask();
    })
</script>