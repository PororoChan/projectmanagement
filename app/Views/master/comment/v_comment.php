<style>
    .com-field p {
        padding: 0;
        margin: 0;
    }
</style>
<?php if ($count > 0) { ?>
    <?php foreach ($comment as $c) : ?>
        <div class="row mt-1">
            <div class="col-sm-1 mx-3">
                <img class="rounded-circle shadow-sm" title="By <?= $c['createdby'] ?>" src="<?= base_url('public/assets/images/faces/avatar-1.png') ?>" width="35" height="35">
            </div>
            <div class="col-lg-7 text-start">
                <div class="row">
                    <div class="col-lg-4">
                        <span class="fw-bold text-dark fs-7">
                            <?= $c['createdby'] ?>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="mt-1 mb-3">
                        <div class="bg-secondary position-relative bg-opacity-10 shadow-sm d-flex rounded" id="com-field" style="width: max-content; height: max-content;" spellcheck="false">
                            <div class="text-start m-2 fs-5 com-field">
                                <?= $c['message'] ?>
                            </div>
                        </div>
                        <div class="act-comment mt-1" style="width: max-content; height: max-content;">
                            <div class="row d-flex text-center" style="width: max-content;">
                                <a href="#" role="button" cid="<?= $c['commentid'] ?>" class="col-sm-1 fs-7 com-edit">Edit</a>
                                <a href="#" role="button" cid="<?= $c['commentid'] ?>" sid="<?= $c['taskid'] ?>" class="col-sm-1 fs-7 com-delete">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php } ?>
<script>
    $('.com-edit').each(function() {
        $(this).on('click', function() {

        })
    })

    $('.com-delete').each(function() {
        $(this).click(function(el) {
            var link = '<?= base_url('comment/delete') ?>',
                comid = $(this).attr('cid'),
                tid = $(this).attr('sid');

            $.ajax({
                url: link,
                type: 'post',
                data: {
                    id: comid,
                    taskid: tid,
                },
                dataType: 'json',
                success: function(res) {
                    $('#com-load').html(res.view)
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    $.notify(thrownError, 'error');
                }
            })
        })
    })
</script>