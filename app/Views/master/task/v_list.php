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
                    <div class="row board-list flex-nowrap" style="height: max-content;" id="list-board">
                        <?= $this->include('master/task/v_card') ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?= $this->include('inc_template/footer') ?>
<?= $this->include('master/imp/list') ?>