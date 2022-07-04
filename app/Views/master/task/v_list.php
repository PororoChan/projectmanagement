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
        background-color: #FFFFFF;
        border-radius: 2px;
    }

    .task-hovered {
        cursor: pointer;
    }
</style>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">
<div class="content-wrapper pb-0" style="max-height: 100vh;">
    <div class="main-panel p-0">
        <div class="main-content">
            <section class="section">
                <div class="row">
                    <div class="col-lg-6">
                        <button class="btn btn-inverse-primary" disabled>
                            <i class="fas fa-fire fs-7 me-2"></i><span class="text-start fs-7"><?= session()->get('bname') ?></span>
                            <input type="hidden" name="boardid" id="boardid" value="<?= session()->get('idb') ?>">
                        </button>
                        <div class="vr align-middle mx-2 me-2" style="height: 20px;"></div>
                        <a class="btn btn-inverse-primary me-auto" id="bt-board" href="<?= base_url('board/cleanUser') ?>">
                            <i class="fas fa-chalkboard-teacher fw-bold fs-7 me-2"></i><span class="text-start fw-bold fs-7">Boards</span>
                        </a>
                        <button class="btn btn-inverse-dark" title="Masih Rencana">
                            <i class="fas fa-user-plus fs-7 me-2"></i><span class="fw-bold fs-7">Share</span>
                        </button>
                    </div>
                </div>
                <div class="pt-4">
                    <div class="row board-list flex-nowrap" style="height: max-content;" id="list_board">
                        <?= $this->include('master/task/v_card') ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?= $this->include('inc_template/footer') ?>
<?= $this->include('master/imp/process') ?>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
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
            })

        }
    })
</script>