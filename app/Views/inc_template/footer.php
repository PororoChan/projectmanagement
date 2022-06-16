<!-- Modal Board -->
<div class="modal fade" id="formboard" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
                <span class="text-dark fs-7"> --- Board Workspace --- </span>
            </div>
            <div class="modal-body" id="mobody">
            </div>
        </div>
    </div>
</div>

<!-- Modal Board -->
<div class="modal fade" id="deleteBoard" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-center" id="titledel"></h5>
            </div>
            <div class="modal-body">
                <span class="text-secondary font-weight-semibold fs-7" id="text-del">

                </span>
                <div id="data-id">

                </div>
                <div id="data-link">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="delB">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Global -->
<div class="modal fade" id="deleteTask" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-center" id="deltask"></h5>
            </div>
            <div class="modal-body">
                <span class="text-secondary font-weight-semibold fs-7" id="text-del-task">

                </span>
                <div id="data-id-task">

                </div>
                <div id="data-link-task">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="delL">Delete</button>
            </div>
        </div>
    </div>
</div>
</div>
</body>

<!-- Additional JS -->
<script src="<?= base_url('public/assets/js/custom.js') ?>"></script>
<?= $this->include('master/imp/sortable') ?>

<script>
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
                        $('#list-board').load('<?= base_url('task/t') ?>')
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
                    $.notify("Deleted Successfully!", "success");
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