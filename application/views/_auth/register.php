
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
				<div class="text-center p-b-5">
					<span class="db"><h3 class="text-white">REGISTRATION</h3></span>
				</div>
				<form class="form-horizontal m-t-5" method="POST" action="<?= base_url("Door/registration")?>">
					<div class="row m-b-5">
							<div class="col-lg">
								<?= $this->session->flashdata('message');?>
							</div>
						</div>
					<div class="row p-b-30 border-bottom border-secondary">
						<div class="col-12">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
								</div>
								<input type="text" name="email" id="email" class="form-control form-control-lg" placeholder="Enter your Email" aria-describedby="basic-addon1" value="<?= set_value('email')?>">
								<?= form_error('email','<div class="col-12"><small class="text-warning">','</small></div>')?>
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text bg-warning text-white" id="basic-addon1"><i class="ti-user"></i></span>
								</div>
								<input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Full Name" aria-describedby="basic-addon1" value="<?= set_value('name')?>">
								<?= form_error('name','<div class="col-12"><small class="text-warning">','</small></div>')?>
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
								</div>
								<input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Username" aria-describedby="basic-addon1" value="<?= set_value('username')?>">
								<?= form_error('username','<div class="col-12"><small class="text-warning">','</small></div>')?>
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text bg-primary text-white" id="basic-addon2"><i class="ti-key"></i></span>
								</div>
								<input type="password" name="password1" id="password1" class="form-control form-control-lg" placeholder="Password" aria-describedby="basic-addon1">
								<?= form_error('password1','<div class="col-12"><small class="text-warning">','</small></div>')?>
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text bg-info text-white" id="basic-addon2"><i class="ti-key"></i></span>
								</div>
								<input type="password" name="password2" id="password2" class="form-control form-control-lg" placeholder="Repeat Password" aria-describedby="basic-addon1">
								<?= form_error('password2','<div class="col-12"><small class="text-warning">','</small></div>')?>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group text-center">
								<div class="p-t-5">
									<button class="btn btn-block btn-primary float-right" type="submit">Register</button>
								</div>
							</div>
						</div>
					</div>
					<div class="row p-t-10">
						<a class="text-white" href="<?= base_url("Door")?>">Back to Login</a>
					</div>
				</form>
            </div>
        </div>
    </div>
   