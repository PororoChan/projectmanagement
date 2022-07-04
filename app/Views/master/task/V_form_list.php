<form id="formlist" method="POST">
    <div class="form-group mb-2">
        <input type="hidden" name="taskid" id="taskid" value="<?= (($form_type == 'Edit') ? $row['taskid'] : '') ?>">
        <input type="hidden" name="bid" id="bid" value="<?= session()->get('idb') ?>">
        <input type="text" class="form-control form-control-sm" name="taskname" placeholder="Create new list" id="taskname" value="<?= (($form_type == 'Edit') ? $row['taskname'] : '') ?>">
    </div>
    <div class="form-group mb-0 d-flex align-items-center justify-content-end">
        <button type="button" id="btn-close-list" class="btn btn-sm me-2"><i class="fas fa-close fs-6 text-secondary"></i></button>
        <button type="submit" class="btn btn-primary" id="savelist"><span><?= (($form_type == "Edit") ? 'Edit' : 'Save') ?></span></button>
    </div>
</form>

<?= $this->include('master/imp/process') ?>
<script>
    $('#btn-close-list').each(function() {
        $(this).on('click', function() {
            $('#list-append').slideToggle('fast');
        })
    });
</script>