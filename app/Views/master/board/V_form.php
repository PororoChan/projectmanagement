<form method="POST" id="form_board">
    <div class="form-group mb-3">
        <input type="hidden" id="idboard" name="idboard" value="<?= $id ?>">
        <input type="text" class="form-control form-control-sm" id="boardtitle" placeholder="Enter board name" name="boardtitle" value="<?= (($form_type == 'Edit') ? $row['boardname'] : '') ?>">
    </div>
    <div class="form-group mb-0">
        <button type="submit" class="btn btn-primary w-100 mb-1" id="pros"><?= (($form_type == 'Edit') ? 'Update' : 'Save') ?></button>
    </div>
</form>
<?= $this->include('master/imp/list') ?>
<script>
    $('#form_board').on('submit', function(ev) {
        ev.preventDefault()
        var link = "<?= base_url('board/addBoard') ?>",
            ftype = "<?= $form_type ?>",
            form = $('#form_board').serialize();

        if (ftype == 'Edit') {
            link = "<?= base_url('board/editBoard') ?>"
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
                    $('#formboard').modal('toggle')
                    modalB()
                    count();
                } else {
                    $.notify(res.msg, 'error');
                }
            }
        })
    })
</script>