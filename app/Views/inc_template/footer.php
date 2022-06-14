<!-- <footer class="footer">
    <div class="container">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021 </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="fas fa-heart text-danger"></i></span>
        </div>
    </div>
</footer> -->
</div>
</div>

<!-- Additional JS -->
<script src="<?= base_url('public/assets/js/custom.js') ?>"></script>
<script src="<?= base_url('public/assets/js/off-canvas.js') ?>"></script>

<!-- Import JS -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
        sort();
        var sts = '',
            ids = '';

        $('#add_list').on('click', function() {
            $('#list-append').load('board/formAddList');
        });

        $('.portlet-card').addClass('pb-1 pt-1');
        $('.list').addClass('pb-1 pt-1');

        function sort() {
            $('.list').sortable({
                placeholder: "bg-secondary bg-opacity-10 rounded",
                connectWith: $('.list'),
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
        }

        $('#savelist').on('click', function() {
            var title = $('#titlelist').val(),
                link = "<?= base_url('list/addList') ?>",
                ftype = 'Add';

            $.ajax({
                url: link,
                type: 'post',
                data: {
                    title: title
                },
                dataType: 'json',
                success: function(res) {
                    // Refresh Content
                    setTimeout(() => {
                        sort();
                        $('#formlist')[0].reset();
                    }, 500);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    $.notify(thrownError, 'error');
                }
            })
        });

        $('#btn-close-list').each(function() {
            $(this).on('click', function() {
                $('#formlist').remove();
            })
        })
    })
</script>
</body>

</html>