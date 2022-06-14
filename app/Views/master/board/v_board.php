<?= $this->include('inc_template/header') ?>

<div class="content-wrapper pb-0">
    <div class="main-panel p-1">
        <div class="main-content">
            <div class="container">
                <section class="section col-lg-4 w-100">
                    <div class="section-header pb-3 pt-2">
                        <h2 class="text-dark text-start">
                            Board
                        </h2>
                    </div>
                    <div class="section-body p-4 bg-white border border-opacity-25 rounded">
                        <div class="board">
                            <div class="board-head">
                                <span class="text-secondary fs-7 font-weight-normal">Showing <span class="count"></span> of <span class="count"></span> boards</span>
                            </div>
                            <div class="board-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4">
                                        <div class="board-card-add pt-4">
                                            <div class="card bg-secondary bg-opacity-25 btn btn-secondary" id="create_board" style="min-height: 85px;">
                                                <div class="card-body text-center">
                                                    <i class="fas fa-plus fs-7 fw-bold text-secondary me-2"></i><span class="text-secondary fs-7 fw-bold">Create New Board</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php foreach ($board as $b) : ?>
                                        <div class="col-lg-3 col-md-4">
                                            <div class="board-card pt-4">
                                                <div role="button" class="card btn btn-secondary bg-light w-100 board_each" data-bid="<?= $b['boardid'] ?>" style="min-height: 85px; border-left: 5px solid #3D722B;" id="board">
                                                    <div class="card-body text-start" id="board_each">
                                                        <span class="text-secondary fs-7 fw-semibold"><?= $b['boardname'] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formboard" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
                <span class="text-dark fs-7"> --- Create Board --- </span>
            </div>
            <div class="modal-body">
                <?= $this->include('master/board/v_form') ?>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="add_board">Save</button>
            </div>
        </div>
    </div>
</div>

<?= $this->include('inc_template/footer') ?>
<script type="text/javascript">
    function count() {
        $.ajax({
            url: "<?= base_url('board/count') ?>",
            type: 'post',
            success: function(res) {
                $('.count').each(function() {
                    $(this).html(res);
                })
            }
        })
    }

    $(window).on('load', function() {
        count();
    });

    $('#create_board').on('click', function() {
        $('#formboard').modal('toggle')
    });

    $('.board_each').each(function() {
        $(this).on('click', function() {
            var bid = $(this).attr('data-bid');
            $.ajax({
                url: '<?= base_url('board/bid') ?>' + '/' + bid,
                data: {
                    bid: bid,
                },
                type: 'post'
            })
        })
    });

    $('#add_board').on('click', function() {
        var link = "<?= base_url('board/addBoard') ?>",
            form = $('#boardtitle').val();

        $.ajax({
            url: link,
            type: 'post',
            data: {
                dt: form,
            },
            success: function(res) {
                $('#formboard').modal('toggle');
                setTimeout(() => {
                    count();
                }, 500);
            }
        })
    })
</script>