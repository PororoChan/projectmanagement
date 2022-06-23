<form id="form-tlist" method="POST" ftype="<?= $form_type ?>">
    <div class="row <?= (($form_type == 'Edit') ? 'm-1' : '') ?>">
        <div class="form-group <?= (($form_type == 'Edit') ? 'col-lg-8' : '') ?>">
            <input type="hidden" name="id" id="id" value="<?= (($form_type == 'Edit') ? $row['id'] : '') ?>">
            <input type="hidden" class="tid" name="tid" id="tid">
            <?= (($form_type == 'Edit') ? '<i class="fas fa-hashtag fs-6 text-dark me-2"></i><label class="mt-2 fs-7 fw-semibold text-secondary" for="taskname">Task Name <span class="text-danger">*</span></label>' : '') ?>
            <input type="text" class="form-control form-control-sm mx-4 mt-2 rounded" name="taskname" id="taskname" placeholder="Enter new task" value="<?= (($form_type == 'Edit') ? $row['tasklistname'] : '') ?>">
        </div>
        <?php if ($form_type == 'Edit') { ?>
            <div class="form-group col-lg-8">
                <i class="fas fa-align-left fs-6 text-dark me-2"></i><label class="mt-2 fw-semibold fs-7 text-secondary" for="desc">Description <span class="text-danger">*</span></label>
                <textarea rows="10" cols="6" class="form-control form-control-sm mx-4 mt-2 pt-3 pb-3 rounded" name="desc" id="desc" placeholder="Task Description"><?= (($form_type == 'Edit') ? $row['description'] : '') ?></textarea>
            </div>
        <?php } ?>
        <div class="form-group mb-1 <?= (($form_type == 'Edit') ? 'col-lg-8 mx-4' : '') ?> d-flex align-items-center justify-content-end">
            <a id="btn-close" <?= (($form_type == 'Edit') ? 'data-bs-dismiss="modal"' : '') ?> class="bc"><i class="fas fa-close fs-5 me-4 text-secondary"></i></a><button type="submit" class="btn btn-primary" id="list-add"><span><?= (($form_type == "Edit") ? 'Update' : 'Save') ?></span></button>
        </div>
        <?php if ($form_type == 'Edit') { ?>
            <div class="col-lg-8 mt-0">
                <i class="fas fa-list-check fs-6 me-2 text-dark"></i><label class="m-1 fw-semibold fs-7 text-secondary" for="comment">Activity</label>
            </div>
            <div class="col-lg-8 d-flex justify-content-between mx-4 m-2">
                <img src="<?= base_url('public/assets/images/faces/avatar-1.png') ?>" class="rounded-circle" width="45" height="45">
                <textarea class="form-control form-control-sm rounded" name="comment-input" id="comment-input" placeholder="Write a comment"></textarea>
            </div>
            <div style="border-left: 1px solid #000;"></div>
        <?php } ?>
    </div>
</form>

<?= $this->include('master/imp/list') ?>
<script>
    var editor;
    $('#btn-close').on('click', function() {
        $('#modalcrud').hide()
        $('#form-tlist').remove()
    });

    editor = ClassicEditor
        .create(document.querySelector('#comment-input'))
        .catch(error => {
            console.error(error);
        });
</script>