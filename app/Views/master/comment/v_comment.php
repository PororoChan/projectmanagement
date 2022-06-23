<?php if ($count > 0) { ?>
    <?php foreach ($comment as $c) : ?>
        <div class="row mt-2">
            <div class="col-sm-1 mx-3">
                <img class="rounded-circle" src="<?= base_url('public/assets/images/faces/avatar-1.png') ?>" width="35" height="35">
            </div>
            <div class="col-lg-7 text-start">
                <div class="row">
                    <div class="col-lg-4">
                        <span class="fw-bold text-dark fs-7">
                            <?= $c['createdby'] ?>
                        </span>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col" style="height: 50px;">
                        <textarea class="form-control form-control-sm fs-6" style="height: max-content; overflow-wrap: break-word;" name="msg-com" id="msg-com" disabled><?= $c['message'] ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php } ?>