<?= $this->include('inc_template/header') ?>

<div class="content-wrapper pb-0">
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Form</h1>
            </div>
            <div class="section-body d-flex justify-content-center">
                <div class="card full-height w-50">
                    <div class="card-header">
                        <h5>coba form</h5>
                    </div>
                    <div class="card-body">
                        <form id="formtask" method="POST">
                            <div class="form-group">
                                <label for="taskname">Task Name</label>
                                <input type="text" class="form-control form-control-sm" name="taskname" id="taskname">
                            </div>
                            <div class="form-group">
                                <label for="taskdesc">Task Description</label>
                                <input type="text" class="form-control form-control-sm" name="taskdesc" id="taskdesc">
                            </div>
                            <div class="form-group">
                                <label for="taskbadge">Task Badge</label>
                                <input type="text" class="form-control form-control-sm" name="taskbadge" id="taskbadge">
                            </div>
                            <div class="form-group">
                                <label for="datefinish">Deadline</label>
                                <input type="date" class="form-control form-control-sm" name="datefinish" id="datefinish">
                            </div>
                            <div class="form-group">
                                <label for="taskstatus">Task Status</label>
                                <input type="text" class="form-control form-control-sm" name="taskstatus" id="taskstatus">
                            </div>
                            <div class="form-group text-end">
                                <button class="btn btn-primary" id="btn-proses"><span>Save</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?= $this->include('inc_template/footer') ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#btn-proses').on('click', function() {
            var form = $('#formtask')[0];
            var dt = new FormData(form);
            var link = "<?= base_url('board/addData') ?>";

            $.ajax({
                url: link,
                type: 'post',
                data: dt,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(res) {
                    console.log(res);
                }
            })
        });
    });
</script>