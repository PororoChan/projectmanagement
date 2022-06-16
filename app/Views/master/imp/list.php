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
                    $.notify('Added new list', 'success');
                    $('#formlist')[0].reset();
                    $('#formlist').remove();
                    setTimeout(() => {
                        $('#list-board').load('<?= base_url('task/t') ?>')
                    }, 100);
                } else {
                    $.notify(res.msg, 'error');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                $.notify(thrownError, 'error');
            }
        })
    }

    function addTask() {
        var link = '<?= base_url('list/addData') ?>',
            form = $('#form-tlist')[0],
            dt = new FormData(form);

        $.ajax({
            url: link,
            type: 'post',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: dt,
            success: function(res) {
                setTimeout(() => {
                    $.notify("Added new task", "success")
                    $('#form-tlist')[0].reset();
                }, 50);
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