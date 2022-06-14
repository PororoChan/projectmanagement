<?= $this->include('inc_template/header') ?>

<div class="content-wrapper pb-0">
    <div class="main-panel p-1">
        <div class="main-content" id="loadcont">
            <div class="container">
                <section class="section col-lg-4 w-100">
                    <div class="section-header pb-3 pt-2">
                        <h2 class="text-dark fs-5 text-start">
                            <i class="fas fa-chalkboard-teacher me-2"></i> Board
                        </h2>
                    </div>
                    <div class="section-body p-4 bg-white border border-opacity-25 rounded">
                        <div class="board">
                            <div class="board-head">
                                <span class="text-secondary fs-7 font-weight-normal">Showing <span class="count"></span> of <span class="count"></span> boards</span>
                            </div>
                            <div class="board-body">
                                <div class="row" id="bbody">
                                    <div class="col-lg-3 col-md-4">
                                        <div class="board-card-add pt-2 pb-2">
                                            <div class="card bg-secondary bg-opacity-25 btn btn-secondary" id="create_board" style="min-height: 85px;">
                                                <div class="card-body text-center">
                                                    <i class="fas fa-plus fs-7 fw-bold text-secondary me-2"></i><span class="text-secondary fs-7 fw-bold">Create New Board</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php foreach ($board as $b) : ?>
                                        <div class="col-lg-3 col-md-4">
                                            <div class="board-card pt-2 pb-2">
                                                <a role="button" href="<?= base_url('board/b/' . $b['boardid'] . '') ?>" class="card btn btn-secondary bg-light w-100 board_each" style="min-height: 85px; border-left: 5px solid #0033C4;" id="board">
                                                    <div class="card-body text-start" id="board_each">
                                                        <span class="text-secondary fs-7 fw-semibold"><?= $b['boardname'] ?></span>
                                                    </div>
                                                </a>
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

    function modalB() {
        $('#formboard').modal('toggle');
    }

    $(window).on('load', function() {
        count();
    });

    // Board On Hover
    $(document).ready(function() {
        $('.board-card').each(function() {
            $(this).on('mouseenter', function() {
                $(this).css('transition', 'all 0.2s ease-in-out')
                $(this).css('transform', 'scale(1.1)')
            })
            $(this).on('mouseleave', function() {
                $(this).css('transition', 'all 0.2s ease-in-out')
                $(this).css('transform', 'scale(1)')
            })
        })

        $('#create_board').on('click', function() {
            modalB();
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
                    modalB();
                    setTimeout(() => {
                        $('#bbody').load(' #bbody > *')
                        setTimeout(() => {
                            count();
                        }, 500);
                    }, 300);
                }
            })
        })
    })
</script>