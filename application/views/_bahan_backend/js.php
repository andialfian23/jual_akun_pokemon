		<script src="<?= base_url('matrix/') ?>assets/libs/jquery/dist/jquery.min.js"></script>
		<script src="<?= base_url('matrix/') ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
		<script>
			$("#del-ss").hide();
			$("#form-ss").hide();
			$("#to-close").hide();
			$('#to-form-ss').on("click", function() {
				$("#tombol").slideUp();
				$("#form-ss").fadeIn();
			});
			$('#to-tombol').click(function() {
				$("#form-ss").hide();
				$("#tombol").fadeIn();
			});
			$('#to-tombol-del').click(function() {
				$("#list-ss").hide();
				$("#to-tombol-del").hide();
				$("#del-ss").fadeIn();
				$("#to-close").fadeIn();
			});
			$('#to-close').click(function() {
				$("#del-ss").hide();
				$("#list-ss").fadeIn();
				$("#to-tombol-del").fadeIn();
				$("#to-close").hide();
			});
		</script>
		<script src="<?= base_url('matrix/') ?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
		<script src="<?= base_url('matrix/') ?>assets/extra-libs/sparkline/sparkline.js"></script>
		<script src="<?= base_url('matrix/') ?>dist/js/waves.js"></script>
		<script src="<?= base_url('matrix/') ?>dist/js/sidebarmenu.js"></script>
		<script src="<?= base_url('matrix/') ?>dist/js/custom.min.js"></script>

		<?php if ($this->uri->segment(2) == 'list_account' || $this->uri->segment(2) == 'history_login' || $this->uri->segment(2) == 'list_purchased' || $this->uri->segment(2) == 'list_purchase') { ?>
			<script src="<?= base_url('matrix/') ?>assets/extra-libs/DataTables/datatables.min.js"></script>
			<script>
				$('#zero_config').DataTable();
			</script>
		<?php } ?>