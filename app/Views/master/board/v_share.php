<form method="POST" id="shareBoard">
    <div class="form-group d-flex justify-content-between align-items-center">
        <div class="d-flex justify-content-start">
            <i class="fas fa-share-alt fs-6 text-secondary me-2"></i><label class="fw-bold text-secondary fs-6">Share board</label>
        </div>
        <button type="button" class="btn btn-sm" data-bs-dismiss="modal"><i class="fas fa-close fs-7"></i></button>
    </div>
    <div class="form-group">
        <input type="hidden" id="bidd" name="bidd" value="<?= $id ?>">
        <div class="row">
            <div>
                <input type="text" class="form-control form-control-sm" id="address_share" name="address_share" placeholder="Email address or name" spellcheck="false">
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
            var address = $('#address_share').val();
            $.notify('Board has been shared to ' + address, 'success');
        });

        $('#roles').select2({
            dropdownParent: $('#formboard'),
            ajax: {
                url: '<?= base_url('board/getUser') ?>',
                type: 'post',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term,
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true,
            }
        });
    });
</script>