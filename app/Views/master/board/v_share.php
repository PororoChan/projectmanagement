<form method="POST" id="shareBoard">
    <div class="form-group d-flex justify-content-between align-items-center">
        <div class="d-flex justify-content-start">
            <i class="fas fa-share-alt fs-6 text-secondary me-3"></i><label class="fw-bold text-secondary fs-6">Share board</label>
        </div>
        <button type="button" class="btn btn-sm" data-bs-dismiss="modal"><i class="fas fa-close fs-7"></i></button>
    </div>
    <div class="form-group">
        <input type="hidden" id="bidd" name="bidd" value="<?= $id ?>">
        <div class="row">
            <div class="col-lg-8">
                <input type="text" class="form-control form-control-sm" id="sharelink" name="sharelink" placeholder="Email address or name" spellcheck="false">
            </div>
            <div class="col-lg-4">
                <select class="form-control form-control" name="members" id="members">
                    <?php foreach ($user as $u) : ?>
                        <option value="<?= $u['userid'] ?>"><?= $u['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group d-flex justify-content-end mb-0">
        <button type="button" class="btn btn-inverse-secondary me-2" data-bs-dismiss="modal">
            Cancel
        </button>
        <button type="button" class="btn btn-inverse-primary">
            Share
        </button>
    </div>
</form>
<script>
    $(document).ready(function() {
        // $('#members').select2({
        //     ajax: {
        //         url: '<?= base_url('board/getUser') ?>',
        //         type: 'post',
        //         dataType: 'json',
        //         delay: 250,
        //         data: function(params) {
        //             return {
        //                 searchTerm: params.term
        //             };
        //         },
        //         processResults: function(res) {
        //             return {
        //                 results: res
        //             };
        //         },
        //         cache: true
        //     }
        // });
    });
</script>