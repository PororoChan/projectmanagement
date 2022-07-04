<style>
    .nav-items:hover {
        background-color: #E9E9EB;
        transition: 100ms ease-in-out;
    }

    #nav-drop {
        transition: 0.2s ease-in-out;
    }

    .rotate_elem {
        transform: rotate(-180deg);
        transition: 0.2s ease-in-out;
    }
</style>
<?= $this->include('inc_template/header') ?>
<div class="content-wrapper pb-0">
    <div class="main-panel p-1">
        <div class="main-content" id="loadcont">
            <div class="container d-flex">
                <!-- Board Sidebar -->
                <?= $this->include('inc_template/sidebar') ?>
                <!-- Board -->
                <section class="section w-100">
                    <div class="section-header pb-3 pt-2">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2 class="text-dark fs-6 text-start mb-0">
                                <i class="fas fa-chalkboard-teacher text-dark me-2"></i> Boards
                            </h2>
                            <button class="btn btn-primary shadow-sm" id="create_board">
                                <i class="fas fa-plus fw-semibold fs-7"></i>
                                <span id="btn_b_new" class="text-center font-12 mx-2">Create Board</span>
                            </button>
                        </div>
                    </div>
                    <div class=" section-body p-4 bg-white shadow-sm border-opacity-25 rounded">
                        <div class="board">
                            <div class="board-head">
                                <span class="text-secondary fs-7 font-weight-normal">Showing <span class="fw-semibold text-dark count"></span> of <span class="fw-semibold text-dark count"></span> boards</span>
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
    function reload() {
        $('#bbody').load('<?= base_url('board/b') ?>', function() {
            scaleCard()
        });
        count();
    }

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
                $(this).css('transition', 'all 0.2s ease-in-out');
                $(this).css('transform', 'scale(1.02)');
            })
            $(this).on('mouseleave', function() {
                $(this).css('transition', 'all 0.2s ease-in-out');
                $(this).css('transform', 'scale(1)');
            })
        })
    }

    $(window).on('load', function() {
        count();
    });

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
    });
</script>