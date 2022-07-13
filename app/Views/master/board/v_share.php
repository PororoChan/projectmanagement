<form method="POST" id="shareBoard">
    <div class="form-group mb-2 d-flex justify-content-between align-items-center">
        <div class="d-flex justify-content-start">
            <i class="fas fa-share-alt fs-6 text-secondary me-2"></i><label class="fw-bold text-secondary fs-6">Share board</label>
        </div>
        <button type="button" class="btn btn-sm" data-bs-dismiss="modal"><i class="fas fa-close fs-7"></i></button>
    </div>
    <div class="form-group">
        <input type="hidden" id="bidd" name="bidd" value="<?= $id ?>">
        <div class="row d-flex justify-content-around">
            <div class="col-lg-8">
                <label for="usershare" class="fw-semibold text-secondary fs-7">Username :</label>
                <input type="text" class="form-control form-control-sm" id="address_share" name="address_share" placeholder="Enter Username" spellcheck="false">
            </div>
            <div class="col-lg-4">
                <label for="roles" class="fw-semibold text-secondary fs-7">Roles :</label>
                <select class="form-control form-control-sm" name="roles" id="roles">
                    <option value="1">Admin</option>
                    <option value="2">Member</option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group d-flex justify-content-end mb-0">
        <button type="button" class="btn btn-inverse-secondary me-2" data-bs-dismiss="modal">
            Cancel
        </button>
        <button type="button" id="bshare" class="btn btn-inverse-primary">
            Share
        </button>
    </div>
</form>
<script>
    $(document).ready(function() {
        $('#bshare').on('click', function() {
            var address = $('#roles').val();
            $.notify('Board has been shared to ' + address, 'success');
        });
    });
</script>