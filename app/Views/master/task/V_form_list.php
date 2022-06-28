<form id="formlist" method="POST">
    <div class="form-group">
        <input type="hidden" name="taskid" id="taskid" value="<?= (($form_type == 'Edit') ? $row['taskid'] : '') ?>">
        <input type="hidden" name="bid" id="bid" value="<?= session()->get('idb') ?>">
        <input type="text" class="form-control form-control-sm" name="taskname" placeholder="Enter new list" id="taskname" value="<?= (($form_type == 'Edit') ? $row['taskname'] : '') ?>">
    </div>
    <div class="form-group d-flex align-items-center justify-content-end">
        <a id="btn-close-list"><i class="fas fa-close fs-5 me-4 pt-1 text-secondary"></i></a><button type="submit" class="btn btn-primary" id="savelist"><span><?= (($form_type == "Edit") ? 'Edit' : 'Save') ?></span></button>
    </div>
</form>

<?= $this->include('master/imp/process') ?>
<script>
    $('#btn-close-list').each(function() {
        $(this).on('click', function() {
            $('#formlist').remove();
        })
    });
</script>