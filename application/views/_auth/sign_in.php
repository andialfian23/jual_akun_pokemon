<div class="main-wrapper">
	<div class="preloader">
		<div class="lds-ripple">
			<div class="lds-pos"></div>
			<div class="lds-pos"></div>
		</div>
	</div>
	<div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
		<div class="auth-box bg-dark border-top border-secondary">
			<div class="text-center p-t-5 p-b-5">
				<span class="db"><img src="<?= base_url("my_assets/images/logo.png") ?>" alt="logo" /></span>
			</div>
			<form class="form-horizontal m-t-20" method="POST" action="<?= base_url("Door") ?>">
				<div class="row m-b-5">
					<div class="col-lg"> <?= $this->session->flashdata('message'); ?></div>
				</div>
				<div class="row p-b-30 border-bottom border-secondary">
					<div class="col-12">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
							</div>
							<input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Username" aria-describedby="basic-addon1">
							<?= form_error('username', '<div class="col-12"><small class="text-warning">', '</small></div>') ?>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
							</div>
							<input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password" aria-describedby="basic-addon1">
							<?= form_error('password', '<div class="col-12"><small class="text-warning">', '</small></div>') ?>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group text-center">
							<div class="p-t-5">
								<button class="btn btn-block btn-success float-right" type="submit">Login</button>
							</div>
						</div>
					</div>
				</div>
				<div class="row p-t-10">
					<a class="text-white" href="<?= base_url("A") ?>">Home Page</a>
				</div>
			</form>
		</div>
	</div>
</div>