<?php foreach ($board as $b) : ?>
    <div class="col-lg-3 col-md-4">
        <div class="board-card pt-2 pb-2" id="board-pit">
            <a role="button" href="<?= base_url('board/b/' . $b['boardid'] . '') ?>" bid="<?= $b['boardid'] ?>" class="card btn btn-secondary bg-light w-100 board_each" style="min-height: 85px; border-left: 5px solid #0033C4;" id="boardbtn">
                <div class="card-body" id="board_each">
                    <div class="d-flex justify-content-between">
                        <span class="text-start text-secondary fs-7 fw-semibold"><?= $b['boardname'] ?></span>
                    </div>
                </div>
            </a>
        </div>
    </div>
<?php endforeach; ?>
<div class="dropdown-menu dropdown-menu-sm" id="context-menu">
    <a class="dropdown-item btne" bid="<?= session()->get('idb') ?>" href="#">Edit</a>
    <a class="dropdown-item btne" bid="<?= session()->get('idb') ?>" href="#">Delete</a>
</div>
<script>
    $('.board_each').each(function() {
        $(this).on('contextmenu', function(ev) {
            ev.preventDefault();
            var top = ev.pageY,
                left = ev.pageX;
            console.log($('#btn').attr('bid'))
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
    })
</script>