<?php if ($roles != '' && $roles != '1' || $roles != '1' && $roles != '2') { ?>
    <script>
        "use strict";
        $(document).ready(function() {

            var idt = '',
                idl = '';

            $('.portlet-card').addClass('mt-1');

            var sort = $('.portlet-card-list').sortable({
                placeholder: "bg-secondary bg-opacity-10 mt-2 rounded",
                connectWith: ".portlet-card-list",
                cursor: "grabbing",
                items: ".portlet-card",
                start: function(ev, ui) {
                    ui.item.css('transform', 'rotate(3deg)');
                    ui.placeholder.height(ui.item.height());
                    ui.placeholder.css('visibility', 'visible');

                    idt = $(this).attr('sts');
                },
                stop: function(ev, ui) {
                    ui.item.css('transform', 'rotate(0deg)');

                    idl = ui.item.attr('tlid');

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
                },
            }).disableSelection();
        })
    </script>
<?php } else { ?>
    <script></script>
<?php } ?>