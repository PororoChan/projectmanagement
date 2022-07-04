<form method="POST" class="mb-0" id="form_board">
    <div class="form-group mb-3 d-flex justify-content-between">
        <div class="d-flex justify-content-start align-items-center">
            <i class="fas fa-chalkboard-teacher fs-6 me-2"></i>
            <span class="fw-bold fs-6">Board Workspaces</span>
        </div>
        <button type="button" class="btn btn-sm" data-bs-dismiss="modal"><i class="fas fa-close fs-7"></i></button>
    </div>
    <div class="form-group mb-3">
        <?= (($form_type == 'Add' ? '<label for="boardtitle" class="fs-7 fw-semibold me-2">Board Title <span class="text-danger fs-7">*</span></label>' : '')) ?>
        <input type="hidden" id="idboard" name="idboard" value="<?= $id ?>">
        <input type="text" class="form-control form-control-sm" id="boardtitle" placeholder="Create new board" name="boardtitle" value="<?= (($form_type == 'Edit') ? $row['boardname'] : '') ?>">
    </div>
    <div class="form-group d-flex justify-content-end mb-0">
        <?= (($form_type == 'Add' ? '<button type="button" class="btn btn-secondary me-2" id="btn_b_cancel">Clear</button>' : '')) ?>
        <button type="submit" class="btn btn-primary" id="pros"><?= (($form_type == 'Edit') ? 'Update' : 'Save') ?></button>
    </div>
</form>
<?= $this->include('master/imp/process') ?>
<script>
    $('#form_board').on('submit', function(ev) {
        ev.preventDefault()
        var link = "<?= base_url('board/addBoard') ?>",
            ftype = "<?= $form_type ?>",
            form = $('#form_board').serialize();

        if (ftype == 'Edit') {
            link = "<?= base_url('board/editBoard') ?>";
        }

        $.ajax({
            url: link,
            type: 'post',
            dataType: 'json',
            data: form,
            success: function(res) {
                if (res.success == 1) {
                    $('#bbody').load('<?= base_url('board/b') ?>', function() {
                        scaleCard();
                    })
                    $('#form_board')[0].reset();
                    $('#formboard').modal('toggle');
                    modalB();
                    count();
                } else {
                    $.notify(res.msg, 'warn');
                }
            }
        })
    });

    $('#btn_b_cancel').on('click', function() {
        $('#form_board')[0].reset();
    })
</script>