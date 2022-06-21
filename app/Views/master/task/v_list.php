<?= $this->include('inc_template/header') ?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">
<div class="content-wrapper pb-0" style="max-height: 100vh;">
    <div class="main-panel p-0">
        <div class="main-content">
            <section class="section">
                <a class="btn btn-inverse-primary me-2" id="bt-board" href="<?= base_url('board/cleanUser') ?>">
                    <i class="fas fa-chalkboard-teacher fw-bold fs-7 me-2"></i><span class="text-start fw-bold fs-7">BOARD</span>
                </a>
                <button class="btn btn-inverse-primary" disabled>
                    <i class="fas fa-fire fs-7 me-2"></i><span class="text-start fs-7"><?= session()->get('bname') ?></span>
                    <input type="hidden" name="boardid" id="boardid" value="<?= session()->get('idb') ?>">
                </button>
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
<?= $this->include('master/imp/list') ?>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<!-- Task Draggable -->
<script>
    var id = '',
        oldSeq = '',
        newSeq = '';

    var sort = new Sortable(list_board, {
        draggable: '.list',
        swapThreshold: 0.60,
        animation: 250,
        onChoose: function(evt) {
            oldSeq = evt.oldIndex;
        },
        onChange: function(evt) {
            newSeq = evt.newIndex;
            id = evt.item.getAttribute('tasid');

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
        }
    })
</script>