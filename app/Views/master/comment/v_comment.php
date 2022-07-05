<style>
    .com-field,
    .rep-field {
        border-radius: 0px 10px 10px 10px;
    }

    .com-field p,
    .rep-field p {
        font-size: 13px;
        padding: 5px;
        margin: 5px;
    }

    .com-field ol,
    .com-field ul {
        font-size: 13px;
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
function getCom($commentid, $headerid, $data = [], $margin)
{
    $html = "<div class='row mt-1' style='margin-left: " . $margin . "'>
                <div class='col-sm-1 mx-3 me-0'>
                    <img class='rounded-circle shadow-sm' src=" . base_url('public/assets/images/faces/avatar-1.png') . " style='width: 35px; height: 35px;'>
                </div>
                <div class='col-lg-7 text-start'>
                    <div class='row'>
                        <div class='col-lg-4'>
                            <span class='fw-bold text-dark fs-7 me-2'>
                                " . $data['createdby'] . "
                            </span>
                            <span class='fw-semibold text-secondary font-11'>
                                " . date('d M Y H:i', strtotime($data['createddate'])) . "
                            </span>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-lg-12 d-flex field-hover' style='height: max-content;'>
                            <div class='mb-1 me-2'>
                                <div class='col-lg-8 bg-secondary bg-opacity-10 com-field' id='com-field' comid=" . $data['commentid'] . " style='width: max-content; max-width: 500px; height: max-content;'>
                                " . $data['message'] . "
                                </div>
                            </div>
                            " . (($data['userid'] == session()->get('id_user') ? '
                                <div class="act-comment mt-1 mb-0" id="act-comment" style="display: none;">
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-sm btn-inverse-warning d-flex align-items-center text-center com-edit me-1" msg="' . $data['message'] . '" cid="' . $data['commentid'] . '" sid="' . $data['taskid'] . '">
                                            <i class="fas fa-pencil-alt text-center fs-7"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-inverse-danger d-flex align-items-center text-center com-delete" cid="' . $data['commentid'] . '" sid="' . $data['taskid'] . '">
                                            <i class="fas fa-trash-alt text-center fs-7"></i>
                                        </button>
                                    </div>
                                </div>
                            ' : '<div></div>')) . "
                        </div>
                        <div class='mb-3 w-100'>
                            <div class='fs-7 text-secondary text-decoration-none mb-1'>
                                <i class='fas fa-reply me-1'></i><a href='#' class='text-secondary btn-rep me-2'>Reply</a>
                                <a href='#' class='text-secondary fs-7 btn-see' id='btn-see'>View Replies</a>
                            </div>
                        </div>
                        <div class='replies' id='replies' style='display: none;'>
                            <input type='hidden' class='commentid' name='commentid' id='commentid' value='" . $data['commentid'] . "'>
                            <input type='hidden' class='idds' name='idds' id='idds' value='" . $data['taskid'] . "'>
                            <textarea class='form-control form-control-sm replies-field' id='replies-field' name='replies-field' style='width:425px; max-width: 425px;' placeholder='Reply to this comment'></textarea>
                            <div class='col-lg-8 d-flex justify-content-end'>
                                <button class='btn btn-inverse-primary btn_replies mt-2' id='btn_replies'><span class='fw-semibold'>Send</span></button>
                            </div>
                        </div>
                        <div class='col-lg-12 reply-load field-hover mx-5 mt-auto' id='reply-load' style='display: none;'>
                            
                        </div>
                    </div>
                </div>
            </div>
            ";

    return $html;
}
?>
<?php if ($count > 0) { ?>
    <div class="row">
        <?php
        foreach ($comment as $c) {
            if ($c['headerid'] == '') {
                echo getCom($c['commentid'], $c['headerid'], $c, 50);
            }
        }
        ?>
    </div>
<?php } ?>
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

        $('.rep-edit').each(function() {
            $(this).on('click', function() {

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
    })
</script>