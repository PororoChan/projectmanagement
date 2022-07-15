<form method="POST" id="shareBoard">
    <div class="form-group mb-2 d-flex justify-content-between align-items-center">
        <div class="d-flex justify-content-start">
            <i class="fas fa-share-alt fs-6 text-secondary me-2"></i><label class="fw-bold text-secondary fs-6">Share board</label>
        </div>
        <button type="button" class="btn btn-sm" data-bs-dismiss="modal"><i class="fas fa-close fs-7"></i></button>
    </div>
    <div class="form-group mb-0">
        <input type="hidden" id="bidd" name="bidd" value="<?= $id ?>">
        <input type="hidden" id="uid" name="uid" value="<?= $user ?>">
        <input type="hidden" id="bname" name="bname" value="<?= $board ?>">
        <div class="row d-flex justify-content-evenly px-2">
            <div class="w-75 me-0 px-1">
                <input type="text" class="form-control form-control-sm" id="username" name="username" placeholder="Enter Username" spellcheck="false">
            </div>
            <div class="w-25 mb-3 px-1">
                <select class="form-control form-control-sm" name="roles" id="roles">
                    <option value="1">View Only</option>
                    <option value="2">Edit</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="w-100 d-flex justify-content-end">
                <button type="button" id="scancel" class="btn btn-inverse-secondary me-2" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="button" id="bshare" class="btn btn-inverse-primary">
                    Share
                </button>
            </div>
        </div>
    </div>
    </div>
</form>
<script>
    $(document).ready(function() {
        $('#bshare').on('click', function() {
            var link = '<?= base_url('board/share/add') ?>';
            let data = $('#shareBoard').serialize();

            $.ajax({
                url: link,
                type: 'post',
                dataType: 'json',
                data: data,
                success: function(res) {
                    if (res.success == 1) {
                        $.notify(res.msg, 'success');
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
</script>