<script>
    var sts = '',
        ids = '';

    $('.portlet-card').addClass('pb-1 pt-1');
    $('.list').addClass('pb-1 pt-1');

    $('.list').sortable({
        placeholder: "bg-secondary bg-opacity-10 rounded",
        cursor: 'grabbing',
        start: function(ev, ui) {
            // Rotate
            ui.item.css('transform', 'rotate(3deg)');
            // Placeholder
            ui.placeholder.height(ui.item.height());
            ui.placeholder.css('visibility', 'visible');
        },
        stop: function(ev, ui) {
            ui.item.css('transform', 'rotate(0deg)')
        }
    });
    $('.list').disableSelection();

    $('.portlet-card-list').sortable({
        placeholder: "bg-secondary bg-opacity-10 rounded",
        connectWith: $('.portlet-card-list'),
        items: ".portlet-card",
        cursor: "grabbing",
        start: function(ev, ui) {
            // Rotate
            ui.item.css('transform', 'rotate(3deg)');

            // PlaceHolder
            ui.placeholder.height(ui.item.height());
            ui.placeholder.css('visibility', 'visible');

            sts = $(this).attr('sts');
        },
        stop: function(ev, ui) {
            ui.item.css('transform', 'rotate(0deg)');

            code = ui.item.attr('data-id');

            $.ajax({
                url: "<?= base_url('board/switch') ?>",
                type: 'post',
                data: {
                    code: code,
                    status: sts,
                },
                dataType: 'json',
                error: function(xhr, ajaxOptions, thrownError) {
                    $.notify(thrownError, 'error')
                }
            });
        },
        receive: function(ev, ui) {
            sts = $(this).attr('sts');
        }
    });
</script>