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

    $('#savelist').on('click', function() {
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
                if (res == 1) {
                    $.notify('Added new list', 'success');
                    $('#formlist')[0].reset();
                    $('#formlist').remove();
                    setTimeout(() => {
                        $('#list-board').load('<?= base_url('task/t') ?>')
                        setTimeout(() => {
                            $.ajax({
                                url: '<?= base_url('task/a') ?>',
                                type: 'post',
                                success: function(res) {
                                    if ($('.list').length <= 0) {
                                        $(res).insertAfter('.list:last')
                                    } else if ($('.list').length >= 1) {
                                        $(res).insertAfter('.list:last')
                                    }
                                }
                            })
                        }, 200);
                    }, 100);
                } else {
                    $.notify('Process data failed', 'error');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                $.notify(thrownError, 'error');
            }
        })
    })
</script>