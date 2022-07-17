<!-- Modal Board -->
<div class="modal fade" id="formboard" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="mobody">
            </div>
        </div>
    </div>
</div>

<!-- Modal Global -->
<div class="modal h-100 fade" id="modalcrud" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header font-18 d-flex justify-content-between">
                <div>
                    <i class="fas fa-tag fs-6 me-2 text-secondary"></i><span class="text-secondary fw-bold" id="title-del"></span>
                </div>
                <button type="button" class="btn-close font-13" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body m-2" id="modalbody">
            </div>
        </div>
    </div>
</div>

<!-- Modal Board -->
<div class="modal fade" id="deleteBoard" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex justify-content-between">
                    <h5 class="text-start fw-bold font-14" id="titledel"></h5>
                    <button type="button" class="btn btn-sm fs-7" data-bs-dismiss="modal"><i class="fas fa-close fs-7"></i></button>
                </div>
                <span id="text-del" class="font-weight-semibold text-secondary fs-7">

                </span>
                <div id="data-id">

                </div>
                <div id="data-link">

                </div>
                <div class="d-flex justify-content-end mt-4">
                    <button type="button" class="btn btn-inverse-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-inverse-primary" id="delB">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete Task -->
<div class="modal fade" id="deleteTask" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex justify-content-between">
                    <h5 class="text-start fw-bold font-14">Task List</h5>
                    <button class="btn btn-sm fs-7" data-bs-dismiss="modal"><i class="fas fa-close fs-7"></i></button>
                </div>
                <span class="text-secondary font-weight-semibold fs-7" id="text-del-task">

                </span>
                <div id="data-id-task">

                </div>
                <div id="data-link-task">

                </div>
                <div class="d-flex justify-content-end mt-4">
                    <button type="button" class="btn btn-inverse-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-inverse-primary" id="delL">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>

<script>
    $('.nav-btn').each(function() {
        $(this).hover(
            function() {
                $(this).closest('.nav-btn').find('.nav-icon').addClass('nav_icon_hovered');
            },
            function() {
                $(this).closest('.nav-btn').find('.nav-icon').removeClass('nav_icon_hovered');
            }
        )
    });

    $('#btn-drop').click(function() {
        $('#nav-drop').toggleClass('rotate_elem');
    });

    function modalB() {
        $('#formboard').modal('toggle');
    }

    function modalDel(title, msg, link, id) {
        $('#deleteBoard').modal('toggle');
        $('#titledel').text(title);
        $('#text-del').text(msg);
        $('#data-id').html("<input type='hidden' name='idbo' id='idbo' value='" + id + "'>")
        $('#data-link').html("<input type='hidden' name='linked' id='linked' value='" + link + "'>")
    }

    function listDel(title, msg, link, id) {
        $('#deleteTask').modal('toggle');
        $('#deltask').text(title);
        $('#text-del-task').text(msg);
        $('#data-id-task').html("<input type='hidden' name='idl' id='idl' value='" + id + "'>")
        $('#data-link-task').html("<input type='hidden' name='linkl' id='linkl' value='" + link + "'>")
    }

    $('#delL').on('click', function() {
        var link = $('#linkl').val(),
            id = $('#idl').val();
        $.ajax({
            url: link,
            type: 'post',
            dataType: 'json',
            data: {
                id: id,
            },
            success: function(res) {
                if (res == 1) {
                    setTimeout(() => {
                        $('#list_board').load('<?= base_url('task/t') ?>')
                        $('#deleteTask').modal('toggle')
                    }, 50);
                }
            }
        })
    })

    $('#delB').on('click', function() {
        var link = $('#linked').val(),
            id = $('#idbo').val();
        $.ajax({
            url: link,
            type: 'post',
            dataType: 'json',
            data: {
                id: id,
            },
            success: function(res) {
                if (res == 1) {
                    $.notify("Board Deleted!", "success");
                    setTimeout(() => {
                        $('#bbody').load('<?= base_url('board/b') ?>', function() {
                            scaleCard();
                            count();
                            $('#deleteBoard').modal('toggle');
                        })
                    }, 50);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                $.notify(thrownError, 'error');
            }
        })
    })
</script>

</html>