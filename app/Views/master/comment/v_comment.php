<style>
    .com-field p,
    .com-reply p {
        padding: 5px;
        margin: 5px;
    }

    .com-field ol,
    .com-field ul,
    .com-reply ol,
    .com-reply ul {
        margin: 8px;
        width: max-content;
        height: max-content;
    }
</style>
<?php
if ($count > 0) { ?>
    <?php foreach ($comment as $c) : ?>
        <div class="row mt-1">
            <div class="col-sm-1 mx-3 me-0">
                <img class="rounded-circle shadow-sm" title="<?= (($c['createdby'] == session()->get('name') ? 'You' : 'By ' . $c['createdby'])) ?>" src="<?= base_url('public/assets/images/faces/avatar-1.png') ?>" width="35" height="35">
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
                    <div class="col-lg-12 d-flex field-hover" style="height: max-content;">
                        <div class="mb-1 me-2">
                            <div class="col-lg-8 bg-secondary bg-opacity-10 shadow-sm com-field" id="com-field" comid="<?= $c['commentid'] ?>" style="width: max-content; max-width: 500px; word-wrap: break-word; height: max-content;">
                                <?= $c['message'] ?>
                            </div>
                        </div>
                        <?php if ($c['userid'] == session()->get('id_user')) { ?>
                            <div class="act-comment mt-2 mb-0" id="act-comment" style="display: none;">
                                <div class="d-flex">
                                    <button class="btn btn-sm btn-inverse-warning d-flex align-items-center text-center com-edit me-1" msg="<?= $c['message'] ?>" cid="<?= $c['commentid'] ?>" sid="<?= $c['taskid'] ?>">
                                        <i class="fas fa-pencil-alt text-center fs-7"></i>
                                    </button>
                                    <button class="btn btn-sm btn-inverse-danger d-flex align-items-center text-center com-delete" cid="<?= $c['commentid'] ?>" sid="<?= $c['taskid'] ?>">
                                        <i class="fas fa-trash-alt text-center fs-7"></i>
                                    </button>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div></div>
                        <?php } ?>
                    </div>
                    <div class="mb-3">
                        <div class="fs-7 text-secondary text-decoration-none">
                            <i class="fas fa-reply me-1"></i><a href="#" class="text-secondary btn-rep me-2">Reply</a>
                            <a href="#" role="button" class="text-secondary fs-7 btn-see" id="btn-see">View Replies</a>
                        </div>
                        <div class="reply-load mx-5 mt-2" id="reply-load" style="display: none;">
                            <?php foreach ($reply->getReply($c['commentid']) as $r) : ?>
                                <div class="col-lg-4">
                                    <span class="fw-bold text-dark fs-7"><?= $r['createdby'] ?></span>
                                </div>
                                <div class="bg-secondary bg-opacity-10 shadow-sm com-reply" coid="<?= $r['commentid'] ?>" style="width: max-content; max-width: 200px; word-wrap: break-word; height: max-content;">
                                    <?= $r['message'] ?>
                                </div>
                                <?php if ($r['userid'] == session()->get('id_user')) { ?>
                                    <div class="act-comment mt-2 mb-0" id="act-comment" style="display: none;">
                                        <div class="d-flex">
                                            <button class="btn btn-sm btn-inverse-warning d-flex align-items-center text-center com-edit me-1" msg="<?= $r['message'] ?>" cid="<?= $r['commentid'] ?>" sid="<?= $r['taskid'] ?>">
                                                <i class="fas fa-pencil-alt text-center fs-7"></i>
                                            </button>
                                            <button class="btn btn-sm btn-inverse-danger d-flex align-items-center text-center com-delete" cid="<?= $r['commentid'] ?>" sid="<?= $r['taskid'] ?>">
                                                <i class="fas fa-trash-alt text-center fs-7"></i>
                                            </button>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div></div>
                                <?php } ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php } ?>
    <script>
        $('.field-hover').hover(
            function() {
                $(this).closest('.field-hover').find('.act-comment').fadeIn('fast');
            },
            function() {
                $(this).closest('.field-hover').find('.act-comment').fadeOut('fast');
            }
        );

        $('.btn-see').each(function() {
            $(this).on('click', function() {
                $('.reply-load').slideToggle('fast');
            })
        })

        $('.com-edit').each(function() {
            $(this).on('click', function() {
                var id = $(this).attr('cid');
                comment.setData($(this).attr('msg'));

                // Button Appear
                $('#btn-com').fadeIn('fast');
                $('#btn-cancel').fadeIn('fast');
                $('#comid').val(id);
                $('#btn-com').html('Edit');
                $("#modalcrud").animate({
                    scrollTop: 0,
                }, 'slow');
            })
        });

        $('#btn-cancel').on('click', function() {
            comment.setData("");

            $(this).fadeOut('fast');
            $('#btn-com').fadeOut('fast');
            $('#btn-com').html('Send');
        });

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
                        if (res.success == 1) {
                            $('#com-load').html(res.view);
                        } else {
                            $.notify('Data not loaded!', 'error');
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        $.notify(thrownError, 'error');
                    }
                })
            });
        });
    </script>