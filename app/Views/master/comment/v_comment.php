<style>
    .com-field {
        border-radius: 0px 10px 10px 10px;
    }

    .com-field p {
        font-size: 13px;
        padding: 1px;
        margin: 1px;
    }

    .com-field ol,
    .com-field ul {
        font-size: 13px;
        margin: 5px;
        width: max-content;
        height: max-content;
    }

    .ck-editor__editable,
    .ck-editor__top {
        min-width: 665px;
        max-width: 665px;
        word-wrap: break-word;
    }

    .wrapper-comment {
        position: relative;
        border-left: 3px solid #2E58CE;
        word-wrap: break-word;
        border-radius: 0px 10px 10px 0px;
    }

    .wrapper-comment:hover {
        cursor: pointer;
    }
</style>
<?php
if ($count > 0) {
    function loadComment($data = [], $reply, $margin)
    {
        echo "<div class='row' style='margin-left: " . $margin . "px;'>";
        foreach ($data as $dt) {
            echo "
            <div class='col-sm-1 mx-0 me-4'>
                <img class='rounded-circle shadow-sm' title=" . (($dt['userid'] == session()->get('id_user') ? 'You' : 'By ' . $dt['createdby'])) . " src=" . base_url('public/assets/images/faces/avatar-1.png') . " style='width: 40px; height: 40px;'>
            </div>
            <div class='col-lg-8 text-start wrapper-comment bg-white bg-opacity-10 shadow-sm pt-1 pb-1 px-2 mb-4 mx-2'>
                <div class='row'>
                    <div class='d-flex align-items-center'>
                        <span class='fw-bold text-dark fs-7'>
                            " . $dt['createdby'] . "
                        </span>
                        <span class='fw-bold text-secondary fs-8 me-1 mx-1'>•</span>
                        <span class='text-secondary font-11'>
                            " . date('j F Y H:i', strtotime($dt['createddate'])) . "
                        </span>
                    </div>
                </div>
                <div class='row'>
                    <div class='d-flex justify-content-between field-hover' style='height: max-content;'>
                        <div class='mb-0 me-2'>
                            <div class='com-field pt-1 pb-1' id='com-field' comid=" . $dt['commentid'] . " style='width: max-content; max-width: 350px; word-wrap: break-word; font-size: 13px; padding: 5px; margin: 5px; height: max-content;'>
                                " . $dt['message'] . "
                            </div>
                        </div>
                            " . (($dt['userid'] == session()->get('id_user') ? '
                            <div class="act-comment mt-1 mb-0" id="act-comment" style="display: none;">
                            <div class="d-flex align-items-center">
                            ' . (($dt['headerid'] != '' ? '
                                    <button type="button" class="btn btn-sm btn-warning shadow-sm d-flex align-items-center text-center rep-edit me-1" cid=' . $dt['commentid'] . '>
                                        <input type="hidden" class="rep_field_content" value="' . $dt['message'] . '">
                                        <i class="fas fa-pencil-alt text-center fs-7set"></i>
                                    </button>
                                    ' : '
                                    <button type="button" class="btn btn-sm btn-warning shadow-sm d-flex align-items-center text-center com-edit me-1" cid=' . $dt['commentid'] . '>
                                        <input type="hidden" id="field-content" class="field-content" value="' . $dt['message'] . '">
                                        <i class="fas fa-pencil-alt text-center fs-7set"></i>
                                    </button>
                                    ')) . '
                                    <button type="button" class="btn btn-sm btn-danger shadow-sm d-flex align-items-center text-center com-delete" cid=' . $dt['commentid'] . ' sid=' . $dt['taskid'] . '>
                                        <i class="fas fa-trash text-center fs-7set"></i>
                                    </button>
                                </div>
                            </div>
                        ' : '<div></div>')) . "
                    </div>
                    <div class='mb-0 mt-0 w-100'>
                        <div class='fs-7 text-secondary d-flex justify-content-end align-items-center'>
                            <a href='#' class='text-secondary btn-rep me-2'>Reply</a>
                        </div>
                    </div>
                    <div class='replies mt-2 w-100' id='replies' style='display: none;'>
                        <input type='hidden' class='commentid' name='commentid' id='commentid' value='" . $dt['commentid'] . "'>
                        <input type='hidden' class='idds' id='idds' name='idds' value='" . $dt['taskid'] . "'>
                        <textarea class='form-control form-control-sm replies-field' spellcheck='false' id='replies-field' name='replies-field' placeholder='Reply to this comment'></textarea>
                        <div class='d-flex justify-content-end'> 
                            <button type='button' class='btn btn-inverse-warning mt-2 mb-1 me-1 btn_replies_cancel' id='btn_replies_cancel'><span class='fw-semibold'>Cancel</span></button>
                            <button class='btn btn-inverse-primary btn_replies mt-2 mb-1' id='btn_replies'><span class='fw-semibold'>Send</span></button>
                        </div>
                    </div>
                </div>
            </div>
            ";
            loadComment($reply->getReply($dt['commentid']), $reply, $margin + 15);
        }
        echo "</div>";
    }
}
?>
<div class="row comments__load">
    <?php if ($count > 0) { ?>
        <div class="col-lg-8 mb-3">
            <i class="far fa-comments fs-7 me-1 text-secondary"></i><label class="m-1 fw-semibold fs-7 text-secondary">Comments</label>
        </div>
        <?= loadComment($comment, $reply, 0) ?>
    <?php } else { ?>
        <div></div>
    <?php } ?>
</div>
<script>
    $(document).ready(function() {
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
            })
        });

        $('.btn-rep').each(function() {
            $(this).on('click', function() {
                var x = $('.btn-rep').index($(this));

                $('.replies').eq(x).slideToggle('fast');
            })
        });

        $('#btn-cancel').on('click', function() {
            comment.setData("");

            $(this).slideUp('fast');
            $('#btn-com').slideUp('fast');
            $('#btn-com').html('Send');
        });

        $('.com-edit').each(function() {
            $(this).on('click', function() {
                var id = $(this).attr('cid'),
                    com = $(this).closest('.com-edit').find('.field-content').val();
                comment.setData(com);

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

        $('.rep-edit').each(function() {
            $(this).on('click', function() {
                var id = $(this).attr('cid'),
                    idx = $('.rep-edit').index($(this)),
                    msg = $(this).closest('.rep-edit').find('.rep_field_content').val();

                $('.replies').eq(idx).slideToggle('fast', function() {
                    $(this).closest('.replies').find('.replies-field').val(msg);
                    $(this).closest('.replies').find('.commentid').val(id);
                });

                $('.btn_replies').eq(idx).html('Edit');
            })
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
                            $('#list_board').load('<?= base_url('task/t') ?>')
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

        $('.btn_replies').each(function() {
            $(this).on('click', function() {
                var y = $('.btn_replies').index($(this)),
                    txt = $('.replies-field').eq(y).val(),
                    taskid = $('.idds').eq(y).val(),
                    id = $('.commentid').eq(y).val(),
                    link = '<?= base_url('comment/addReply') ?>',
                    pros = 'added';

                if ($(this).html() == 'Edit') {
                    pros = 'updated';
                    link = '<?= base_url('comment/editReply') ?>';
                }

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
                            $('#com-load').html(res.view)
                            $('#list_board').load('<?= base_url('task/t') ?>')
                        } else {
                            $.notify(res.msg, 'warn');
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        $.notify(thrownError, 'error');
                    }
                })
            })
        });

        $('.btn_replies_cancel').each(function() {
            $(this).on('click', function() {
                var i = $('.btn_replies_cancel').index($(this));

                $('.replies').eq(i).slideToggle('fast', function() {
                    $('.replies-field').eq(i).val("");
                    $('.btn_replies').eq(i).html('Send');
                })
            })
        });
    });
</script>