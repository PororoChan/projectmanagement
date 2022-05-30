<footer class="footer">
    <div class="container">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="fas fa-heart text-danger"></i></span>
        </div>
    </div>
</footer>
</div>
</div>

<script src="<?= base_url('public/assets/js/custom.js') ?>"></script>
<script src="<?= base_url('public/assets/js/off-canvas.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript Proses -->
<script type="text/javascript">
    $('#add-todo').keyup(function(e) {
        var title = $('#add-todo').val();
        if (e.keyCode == 13) {
            $('#todo-list').append(
                "<h5>" + title + "</h5>"
            )
        }
    })
</script>
</body>

</html>