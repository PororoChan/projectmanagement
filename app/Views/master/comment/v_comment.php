<style>
    .com-field {
        border-radius: 0px 10px 10px 10px;
    }

    .com-field p {
        padding: 5px;
        margin: 5px;
    }

    .com-field ol,
    .com-field ul {
        margin: 8px;
        width: max-content;
        height: max-content;
    }


    .ck-editor__editable {
        min-width: 665px;
        max-width: 665px;
        word-wrap: break-word;
    }

    .ck-editor__top {
        min-width: 665px;
        max-width: 665px;
        word-wrap: break-word;
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
                            <div class="col-lg-8 bg-secondary bg-opacity-10 com-field" id="com-field" comid="<?= $c['commentid'] ?>" style="width: max-content; max-width: 500px; word-wrap: break-word; height: max-content;">
                                <?= $c['message'] ?>
                            </div>
                        </div>
                        <?php if ($c['userid'] == session()->get('id_user')) { ?>
                            <div class="act-comment mt-1 mb-0" id="act-comment" style="display: none;">
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
                    <div class="mb-3 w-100">
                        <div class="fs-7 text-secondary text-decoration-none mb-1">
                            <i class="fas fa-reply me-1"></i><a href="#" class="text-secondary btn-rep me-2">Reply</a>
                            <a href="#" role="button" class="text-secondary fs-7 btn-see" id="btn-see">View Replies</a>
                        </div>
                        <div class="replies" id="replies" style="display: none;">
                            <input type="hidden" class="commentid" name="commentid" id="commentid" value="<?= $c['commentid'] ?>">
                            <input type="hidden" class="idds" name="idds" id="idds" value="<?= $c['taskid'] ?>">
                            <textarea class="form-control form-control-sm replies-field" id="replies-field" name="replies-field" style="width: 425px; max-width: 425px;" placeholder="Reply to this comment"></textarea>
                            <div class="col-lg-8 d-flex justify-content-end">
                                <button class="btn btn-inverse-primary btn_replies mt-2" id="btn_replies"><span class="fw-semibold">Send</span></button>
                            </div>
                        </div>
                        <div class="col-lg-12 reply-load field-hover mx-5 mt-1" id="reply-load" style="display: none;">
                            <?php foreach ($reply->getReply($c['commentid']) as $r) : ?>
                                <div class="mb-1">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <span class="fw-bold text-dark fs-7">
                                                <?= $r['createdby'] ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 d-flex field-hover" style="height: max-content;">
                                            <div class="mb-1 me-2">
                                                <div class="col-lg-8 fs-7 bg-secondary bg-opacity-10 com-field" id="com-field" comid="<?= $r['commentid'] ?>" style="width: max-content; max-width: 500px; word-wrap: break-word; height: max-content;">
                                                    <?= $r['message'] ?>
                                                </div>
                                            </div>
                                            <?php if ($r['userid'] == session()->get('id_user')) { ?>
                                                <div class="act-comment mt-1 mb-0" id="act-comment" style="display: none;">
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
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
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
            var i = $('.btn-see').index($(this));

            $('.reply-load').eq(i).slideToggle('fast');
            $('.replies').slideUp('fast');
        })
    });

    $('.btn-rep').each(function() {
        $(this).on('click', function() {
            var x = $('.btn-rep').index($(this));

            $('.replies').eq(x).slideToggle('fast');
        })
    });

    $('.btn_replies').each(function() {
        $(this).on('click', function() {
            var y = $('.btn_replies').index($(this)),
                txt = $('.replies-field').eq(y).val(),
                taskid = $('#idds').val(),
                id = $('.commentid').eq(y).val(),
                link = '<?= base_url('comment/addReply') ?>',
                pros = 'added';

            $.ajax({
                url: link,
                type: 'post',
                dataType: 'json',
                data: {
                    id: id,
                    taskid: taskid,
                    reply: txt,
                },
                success: function(res) {
                    if (res.success == 1) {
                        $.notify('Reply ' + pros, 'success');
                        $('#com-load').html(res.view);
                    } else {
                        $.notify('Reply not ' + pros, 'error');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    $.notify(thrownError, 'error');
                }
            })
        })
    });

    $('.com-edit').each(function() {
        $(this).on('click', function() {
            var id = $(this).attr('cid');
            comment.setData($(this).attr('msg'));

            // Button Appear
            $('#btn-com').slideDown('fast');
            $('#btn-cancel').slideDown('fast');
            $('#comid').val(id);
            $('#btn-com').html('Edit');
            $("#modalcrud").animate({
                scrollTop: 0,
            }, 'slow');
        })
    });

    $('#btn-cancel').on('click', function() {
        comment.setData("");

        $(this).slideUp('fast');
        $('#btn-com').slideUp('fast');
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