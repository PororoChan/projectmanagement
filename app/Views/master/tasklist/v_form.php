<form id="form-tlist" method="POST">
    <div class="form-group">
        <input type="hidden" name="id" id="id" value="<?= (($form_type == 'Edit') ? $row['id'] : '') ?>">
        <input type="hidden" class="tid" name="tid" id="tid">
        <input type="text" class="form-control form-control-sm" name="taskname" id="taskname" placeholder="Enter new task" value="<?= (($form_type == 'Edit') ? $row['tasklistname'] : '') ?>">
    </div>
    <div class="form-group d-flex justify-content-end">
        <a id="btn-close" class="bc"><i class="fas fa-close fs-5 me-4 text-secondary"></i></a><button type="submit" class="btn btn-primary" id="list-add"><span><?= (($form_type == "Edit") ? 'Edit' : 'Save') ?></span></button>
    </div>
</form>

<?= $this->include('master/imp/list') ?>
<script>
    $('#btn-close').on('click', function() {
        $('#form-tlist').remove()
    })
</script>