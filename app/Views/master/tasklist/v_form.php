<form id="form-tlist" method="POST" ftype="<?= $form_type ?>">
    <div class="form-group">
        <input type="hidden" name="id" id="id" value="<?= (($form_type == 'Edit') ? $row['id'] : '') ?>">
        <input type="hidden" class="tid" name="tid" id="tid">
        <?= (($form_type == 'Edit') ? '<label for="taskname">Task Name</label>' : '') ?>
        <input type="text" class="form-control form-control-sm" name="taskname" id="taskname" placeholder="Enter new task" value="<?= (($form_type == 'Edit') ? $row['tasklistname'] : '') ?>">
    </div>
    <?php if ($form_type == 'Edit') { ?>
        <div class="form-group">
            <label for="desc">Description</label>
            <textarea rows="10" cols="6" class="form-control form-control-sm pt-3 pb-3" name="desc" id="desc" placeholder="Task Description"><?= (($form_type == 'Edit') ? $row['description'] : '') ?></textarea>
        </div>
    <?php } ?>
    <div class="form-group d-flex justify-content-end">
        <a id="btn-close" <?= (($form_type == 'Edit') ? 'data-bs-dismiss="modal"' : '') ?> class="bc"><i class="fas fa-close fs-5 me-4 text-secondary"></i></a><button type="submit" class="btn btn-primary" id="list-add"><span><?= (($form_type == "Edit") ? 'Update' : 'Save') ?></span></button>
    </div>
</form>

<?= $this->include('master/imp/list') ?>
<script>
    $('#btn-close').on('click', function() {
        $('#form-tlist').remove()
    })
</script>