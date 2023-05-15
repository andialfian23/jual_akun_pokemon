			
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<?= $this->session->flashdata('message');?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="card">
							<div class="card-body">					
								<form class="form-horizontal" method="post" action="<?= base_url("B/change_password")?>">
									<div class="form-group row">
										<label for="password" class="col-sm-5 text-right control-label col-form-label">Current Password</label>
										<div class="col-sm-7">
											<input type="password" class="form-control" name="password" id="password" placeholder="Current Password" autofocus>
											<?= form_error('password','<div class="col-12"><small class="text-danger">','</small></div>')?>
										</div>
									</div>
									<div class="form-group row">
										<label for="password1" class="col-sm-5 text-right control-label col-form-label">New Password</label>
										<div class="col-sm-7">
											<input type="password" class="form-control" name="password1" id="password1" placeholder="New Password">
											<?= form_error('password1','<div class="col-12"><small class="text-danger">','</small></div>')?>
										</div>
									</div>
									<div class="form-group row">
										<label for="password2" class="col-sm-5 text-right control-label col-form-label">Confirm New Password</label>
										<div class="col-sm-7">
											<input type="password" class="form-control" name="password2" id="password2" placeholder="Confirm New Password">
											<?= form_error('password2','<div class="col-12"><small class="text-danger">','</small></div>')?>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-12 text-center">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			