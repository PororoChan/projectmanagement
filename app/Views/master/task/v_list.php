<?= $this->include('inc_template/header') ?>
<style>
    .tsid {
        cursor: pointer;
    }

    .edit-active {
        cursor: text;
    }

    [contenteditable]:focus {
        outline: 3px solid #8EA4E5;
        border-radius: 2px;
        background-color: #FFFFFF;
    }

    .task-hovered {
        cursor: pointer;
    }
</style>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">
<div class="w-100 position-fixed text-center top-50 mt-0" id="loading">
    <img class="position" id="loading-image" src="<?= base_url('public/assets/images/loading/loading.gif') ?>">
</div>
<div class="main-panel" id="wrapper" style="display: none;">
    <div class="content-wrapper pb-0" style="max-height: 100vh;">
        <div class="row">
            <div class="col-lg-6 px-2 position-sticky" style="left: 15px;">
                <button class="btn btn-inverse-primary" disabled>
                    <i class="fas fa-fire fs-7 me-2"></i><span class="text-start fs-7"><?= session()->get('bname') ?></span>
                    <input type="hidden" name="boardid" id="boardid" value="<?= session()->get('idb') ?>">
                </button>
                <div class="vr align-middle mx-2 me-2" style="height: 25px;"></div>
                <a class="btn btn-inverse-primary me-2" id="bt-board" href="<?= base_url('board/out') ?>">
                    <i class="fas fa-chalkboard-teacher fw-bold fs-7 me-2"></i><span class="text-start fw-semibold fs-7">Boards</span>
                </a>
                <button class="btn btn-inverse-dark me-1" id="btn_share" idb="<?= session()->get('idb') ?>">
                    <i class="fas fa-user-plus fs-7 me-2"></i><span class="fw-semibold fs-7">Share</span>
                </button>
                <button class="btn btn-outline-danger" id="view__only" style="border: none; display: none;" disabled>
                    <i class="fas fa-info-circle text-danger rounded-circle shadow-sm fs-6 me-2"></i><span class="text-secondary fw-semibold fs-7">View Only Mode</span>
                </button>
            </div>
        </div>
        <div class="row container pt-4 px-2 board-list flex-nowrap" style="height: max-content;" id="list_board">
            <?= $this->include('master/task/v_card') ?>
        </div>
    </div>
</div>
<?= $this->include('inc_template/footer') ?>
<?= $this->include('master/imp/process') ?>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<?php if ($roles != '' && $roles == '2' || $roles != '1' && $roles != '2') { ?>
    <script>
        var newSeq = '';

        var sort = new Sortable(list_board, {
            draggable: '.list',
            swapThreshold: 0.60,
            animation: 250,
            onEnd: function(evt) {
                $('.list').each(function(i, e) {
                    var id = $(this).attr('tasid'),
                        newSeq = i;

                    $.ajax({
                        url: '<?= base_url('task/swap') ?>',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            seq: newSeq,
                            tsid: id,
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            $.notify(thrownError, 'error');
                        }
                    })
                });
            }
        });

        var btn = $('#btn_share').each(function() {
            $(this).on('click', function() {
                var id = $(this).attr('idb'),
                    link = "<?= base_url('board/shares') ?>";

                $.ajax({
                    url: link,
                    type: 'post',
                    data: {
                        bid: id,
                    },
                    dataType: 'json',
                    success: function(res) {
                        if (res.success == 1) {
                            $('#formboard').modal('show');
                            $('#mobody').html(res.view);
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        $.notify(thrownError, 'error');
                    }
                })
            })
        });
    </script>
<?php } else if ($roles == '1') { ?>
    <script>
        $('#btn_share').off('click').removeClass('btn-inverse-dark').addClass('btn-dark');
        $('.btn-add').each(function() {
            $(this).off('click');
        });
        $('.add_list').each(function() {
            $(this).off('click');
        });
        $('.deltasklist').each(function() {
            $(this).off('click');
        });
        $('.tsid').each(function() {
            $(this).attr('contenteditable', 'false');
        });
        $('.taskedit').each(function() {
            $(this).off('click');
        });
        $('.btn-dropdelete').each(function() {
            $(this).removeAttr('data-bs-toggle');
        });
        $('#view__only').fadeIn('fast');
    </script>
<?php } ?>
<script>
    $(window).on('load', function() {
        setTimeout(() => {
            $('#loading').fadeOut('fast');
            $('#wrapper').fadeIn('slow');
        }, 200);
    });
</script>