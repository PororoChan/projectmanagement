<form id="formlist" method="POST">
    <div class="form-group">
        <input type="hidden" name="titleid" id="titleid" value="<?= (($form_type == 'Edit') ? $row['titleid'] : '') ?>">
        <input type="text" class="form-control form-control-sm" name="titlelist" placeholder="Title" id="titlelist" value="<?= (($form_type == 'Edit') ? $row['titlename'] : '') ?>">
    </div>
    <div class="form-group d-flex justify-content-end">
        <a id="btn-close-list"><i class="fas fa-close fs-5 me-4 pt-1 text-secondary"></i></a><button type="button" class="btn btn-primary" id="savelist"><span><?= (($form_type == "Edit") ? 'Edit' : 'Save') ?></span></button>
    </div>
</form>

<?= $this->include('inc_template/footer') ?>