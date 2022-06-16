<?= $this->include('inc_template/header') ?>

<div class="content-wrapper pb-0">
    <div class="main-panel p-1">
        <div class="main-content" id="loadcont">
            <div class="container">
                <section class="section col-lg-4 w-100">
                    <div class="section-header pb-3 pt-2">
                        <div class="d-flex justify-content-between">
                            <h2 class="text-dark fs-5 text-start">
                                <i class="fas fa-chalkboard-teacher text-primary me-2"></i> Board
                            </h2>
                            <button class="btn btn-primary shadow-sm" id="create_board">
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
                                <div class="row" id="bbody" draggable="false">
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
<?= $this->include('inc_template/footer') ?>
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
            var link = "<?= base_url('board/FormViews') ?>",
                type = 'Add',
                pros = 'added',
                form = $('#form_board')[0],
                dt = new FormData(form);

            $.ajax({
                url: link,
                type: 'post',
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(res) {
                    modalB();
                    $('#mobody').html(res.view);
                }
            })
        });
    })
</script>