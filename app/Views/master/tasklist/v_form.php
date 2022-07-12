<style>
    .ck-editor__editable {
        min-height: 50px;
        min-width: 650px;
        max-width: 650px;
        word-wrap: break-word;
    }
</style>
<div class="row">
    <div class="<?= (($form_type == 'Edit' ? 'col-lg-8' : '')) ?>">
        <div id="form-load">
            <form id="form-tlist" <?= (($form_type == 'Add' ? 'class="mt-2"' : '')) ?> method="POST" ftype="<?= $form_type ?>">
                <div class="row <?= (($form_type == 'Edit') ? '' : '') ?>">
                    <div class="form-group mb-2">
                        <input type="hidden" name="id" id="id" value="<?= (($form_type == 'Edit') ? $row['id'] : '') ?>">
                        <input type="hidden" class="tid" name="tid" id="tid">
                        <?= (($form_type == 'Edit') ? '
                        <div class="d-flex align-items-start">
                            <i class="fas fa-hashtag fs-7 text-secondary me-2"></i>
                            <label class="fs-7 fw-semibold text-secondary" for="taskname">Task Name <span class="text-danger">*</span></label>
                        </div>' : '') ?>
                        <input type="text" class="form-control form-control-sm <?= (($form_type == 'Edit') ? 'mx-4' : '') ?> rounded" name="taskname" id="taskname" spellcheck="false" placeholder="Create new task" value="<?= (($form_type == 'Edit') ? $row['tasklistname'] : '') ?>">
                    </div>
                    <?php if ($form_type == 'Edit') { ?>
                        <div class="form-group">
                            <i class="fas fa-align-left fs-7 text-secondary me-2"></i><label class="mt-2 mb-0 fw-semibold fs-7 text-secondary" for="desc">Description</label>
                            <textarea rows="10" cols="6" class="form-control form-control-sm mx-4 mt-2 pt-3 pb-3 rounded" name="desc" id="desc" spellcheck="false" placeholder="Task Description"><?= (($form_type == 'Edit') ? $row['description'] : '') ?></textarea>
                        </div>
                    <?php } ?>
                    <div class="form-group mb-0 <?= (($form_type == 'Edit') ? 'mx-4' : '') ?> d-flex align-items-center justify-content-end">
                        <?= (($form_type == 'Edit') ? '' : '<a id="btn-close" class="bc"><i class="fas fa-close fs-5 me-4 text-secondary"></i></a>') ?><button type="<?= (($form_type == 'Edit') ? 'button' : 'submit') ?>" id="btn-upt" class="btn btn-<?= (($form_type == 'Edit') ? 'inverse-primary' : 'primary') ?>" <?= (($form_type == 'Edit') ? 'style="display: none;"' : '') ?>><span><?= (($form_type == 'Edit') ? 'Update' : 'Save') ?></span></button>
                    </div>
            </form>
        </div>
        <!-- Comment Form -->
        <?php if ($form_type == 'Edit') { ?>
            <form id="form-comment" class="mt-0" method="POST">
                <div>
                    <i class="fas fa-list-check fs-7 me-2 text-secondary"></i><label class="m-1 fw-semibold fs-7 text-secondary">Activity</label>
                </div>
                <div class="form-group mx-3 me-1 mt-3 d-flex justify-content-between">
                    <img src="<?= base_url('public/assets/images/faces/avatar-1.png') ?>" class="rounded-circle shadow-sm me-3" width="40" height="40">
                    <input type="hidden" id="task" name="task" value="<?= $row['id'] ?>">
                    <textarea class="form-control" spellcheck="false" name="comment-input" id="comment-input" placeholder="Write a comment"></textarea>
                </div>
                <div class="form-group w-100 d-flex justify-content-end mx-3 mb-0">
                    <input type="hidden" name="comid" id="comid" value="">
                    <button type="button" id="btn-cancel" style="display: none;" class="btn btn-inverse-warning me-1">Cancel</button>
                    <button type="button" id="btn-com" style="display: none;" class="btn btn-inverse-primary">Send</button>
                </div>
            </form>
        <?php } ?>
        <?php if ($form_type == 'Edit') { ?>
            <div id="com-load" class="overflow-auto">
                <?= $this->include('master/comment/v_comment') ?>
            </div>
        <?php } ?>
    </div>
</div>
<?php if ($form_type == 'Edit') { ?>
    <div class="col-lg-4 px-4 mt-0">
        <div class="label_btn">
            <label class="fw-semibold text-secondary fs-7">Button Places</label>
        </div>
        <div class="btn__form pt-1">
            <!-- List Button Here! -->
        </div>
    </div>
<?php } ?>
</div>
<?= $this->include('master/imp/process') ?>
<script>
    var type = '<?= $form_type ?>',
        comment;
    $('#btn-close').on('click', function() {
        $('#modalcrud').hide();
        $('#form-tlist').remove();
    });

    $('#desc').focusin(function() {
        $('#btn-upt').slideDown('fast');
    })

    $('#desc').focusout(function() {
        $('#btn-upt').slideUp('fast');
    })

    if (type == 'Edit') {
        ClassicEditor
            .create(document.querySelector('#comment-input'), {
                toolbar: ['bold', 'italic', '|', 'undo', 'redo', '|', 'numberedList', 'bulletedList'],
            })
            .then(editor => {
                comment = editor;
                editor.ui.focusTracker.on('change:isFocused', (evt, name, isFocused) => {
                    if (isFocused) {
                        $('#btn-com').slideDown('fast');
                    } else if (!isFocused) {
                        if ($('#btn-com').html() == 'Send') {
                            $('#btn-com').slideUp('fast');
                        } else if ($('#btn-com').html() == 'Edit') {
                            // Do Nothing
                        }
                    }
                })
            })
            .catch(error => {
                $.notify(error, 'error');
            })
    }
</script>