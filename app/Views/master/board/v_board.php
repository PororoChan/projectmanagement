<?= $this->include('inc_template/header') ?>

<div class="content-wrapper pb-0">
    <div class="main-panel p-1">
        <div class="main-content" id="loadcont">
            <div class="container">
                <section class="section col-lg-4 w-100">
                    <div class="section-header pb-3 pt-2">
                        <div class="d-flex justify-content-between">
                            <h2 class="text-dark fs-5 text-start">
                                <i class="fas fa-chalkboard-teacher me-2"></i> Board
                            </h2>
                            <button class="btn btn-inverse-secondary shadow-sm" id="create_board">
                                <i class="fas fa-plus fs-7 fw-bold me-2"></i>
                                <span class="text-center">Create New Board</span>
                            </button>
                        </div>
                    </div>
                    <div class="section-body p-4 bg-white border border-opacity-25 rounded">
                        <div class="board">
                            <div class="board-head">
                                <span class="text-secondary fs-7 font-weight-normal">Showing <span class="count"></span> of <span class="count"></span> boards</span>
                            </div>
                            <div class="board-body">
                                <div class="row" id="bbody">
                                    <?= $this->include('master/board/v_card') ?>
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
                    $(this).html('...');
                    setTimeout(() => {
                        $(this).html(res);
                    }, 200);
                })
            }
        })
    }

    function modalB() {
        $('#formboard').modal('toggle');
    }

    function scaleCard() {
        $('.board-card').each(function() {
            $(this).on('mouseenter', function() {
                $(this).css('transition', 'all 0.2s ease-in-out')
                $(this).css('transform', 'scale(1.02)')
            })
            $(this).on('mouseleave', function() {
                $(this).css('transition', 'all 0.2s ease-in-out')
                $(this).css('transform', 'scale(1)')
            })
        })
    }

    $(window).on('load', function() {
        count();
    });

    // Board On Hover
    $(document).ready(function() {
        scaleCard();
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
                    setTimeout(() => {
                        $('#bbody').load('<?= base_url('board/b') ?>', function() {
                            scaleCard();
                        })
                    }, 300);
                    $('#form_board')[0].reset();
                    modalB();
                    count();
                }
            })
        })
    })
</script>