<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
    var idt = '',
        idl = '';

    var sort = new Sortable(list_board, {
        draggable: '.list',
        swapThreshold: 1,
        animation: 100,
        onStart: function(evt) {
            console.log(evt.item)
        },
        onEnd: function(evt) {
            alert("sampun");
        }
    })

    $('.portlet-card').addClass('mt-2');

    $('.portlet-card-list').sortable({
        placeholder: "bg-secondary bg-opacity-10 mt-2 rounded",
        connectWith: '.portlet-card-list',
        cursor: 'grabbing',
        items: ".portlet-card",
        start: function(ev, ui) {
            // Rotate
            ui.item.css('transform', 'rotate(3deg)');

            // PlaceHolder
            ui.placeholder.height(ui.item.height());
            ui.placeholder.css('visibility', 'visible');

            idt = $(this).attr('sts');
        },
        stop: function(ev, ui) {
            ui.item.css('transform', 'rotate(0deg)');

            idl = ui.item.attr('tlid')

            $.ajax({
                url: '<?= base_url('list/switch') ?>',
                type: 'post',
                dataType: 'json',
                data: {
                    listid: idl,
                    taskid: idt
                },
                success: function(res) {
                    if (res.success == 0) {
                        $.notify(res.msg, 'error');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    $.notify(thrownError, "error");
                }
            });
        },
        receive: function(ev, ui) {
            idt = $(this).attr('sts');
        }
    }).disableSelection();
</script>