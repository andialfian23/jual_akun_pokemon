<?php if ($this->uri->segment(2) == "detail_account") { ?>
    <script src="<?= base_url('matrix/') ?>assets/carousel/jquery/jquery.min.js"></script>
    <script src="<?= base_url('matrix/') ?>assets/carousel/bootstrap/js/bootstrap.js"></script>
<?php } else { ?>
    <script src="<?= base_url('matrix/') ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('matrix/') ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<?php } ?>

<script>
    $("#form-buy").hide();
    $('#to-form-buy').on("click", function() {
        $("#form-buy").fadeIn();
        $("#buy").hide();
    });
    $('#to-close').click(function() {
        $("#form-buy").hide();
        $("#buy").fadeIn();
    });
</script>

<script src="<?= base_url('matrix/') ?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="<?= base_url('matrix/') ?>assets/extra-libs/sparkline/sparkline.js"></script>
<script src="<?= base_url('matrix/') ?>dist/js/waves.js"></script>
<script src="<?= base_url('matrix/') ?>dist/js/custom.min.js"></script>
<script src="<?= base_url('matrix/') ?>assets/libs/jquery-validation/dist/jquery.validate.min.js"></script>