<?php foreach ($board as $b) : ?>
    <div class="col-lg-3 col-md-4 col-sm-6 px-2">
        <div class="board-card pt-2 pb-2 mb-0" id="board-pit">
            <a role="button" href="<?= base_url('board/b/' . $b['boardid'] . '') ?>" bid="<?= $b['boardid'] ?>" class="card text-start p-0 btn btn-secondary bg-light w-100 board_each" style="min-height: 83px; border-left: 5px solid #0033C4;" id="boardbtn">
                <div class="card-body" id="board_each">
                    <span class="text-start text-secondary fs-7 fw-semibold"><?= $b['boardname'] ?></span>
                </div>
            </a>
        </div>
    </div>
    <div class="dropdown-menu dropdown-menu-sm p-1 mb-1 m-0 shadow-sm" style="width: 100px;" id="context-menu">
        <a class="dropdown-item btndel rounded align-middle" href="#">
            <i class="fas fa-trash text-danger fs-7 me-3"></i>
            <input type="hidden" id="bde">
            <span class="text-dark font-12 fw-bold">Delete</span>
        </a>
    </div>
<?php endforeach; ?>
<script>
    var id = '';
    $('.board_each').each(function() {
        $(this).on('contextmenu', function(ev) {
            ev.preventDefault();
            id = $(this).attr('bid');
            $('#bed').val(id);
            $('#bde').val(id);
            var top = ev.pageY,
                left = ev.pageX;
            $('#context-menu').css({
                display: "block",
                top: top,
                left: left,
            }).addClass("show");
            return false;
        }).on('click', function() {
            $('#context-menu').removeClass("show").hide();
        });

        $('body, html').on('click', function() {
            $('#context-menu a').parent().removeClass("show").hide();
        });

        $('#context-menu a').on('click', function() {
            $(this).parent().removeClass("show").hide();
        });
    });

    $('.btndel').each(function() {
        $(this).on('click', function() {
            modalDel('Board Workspace', 'Anda yakin ingin hapus board ini ?', '<?= base_url('board/share/delete') ?>', $('#bde').val());
        })
    })
</script>