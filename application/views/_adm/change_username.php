			
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
								<form class="form-horizontal" method="POST" action="<?= base_url("B/change_username")?>">
									<div class="form-group row">
										<label for="username1" class="col-sm-4 text-right control-label col-form-label">Current Username</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="username1" id="username1" placeholder="Current Username">
											<?= form_error('username1','<div class="col-12"><small class="text-danger">','</small></div>')?>
										</div>
									</div>
									<div class="form-group row">
										<label for="username2" class="col-sm-4 text-right control-label col-form-label">New Username</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="username2" id="username2" placeholder="New Username" value="<?= set_value('username2')?>">
											<?= form_error('username2','<div class="col-12"><small class="text-danger">','</small></div>')?>
										</div>
									</div>
									<div class="form-group row">
										<label for="password" class="col-sm-4 text-right control-label col-form-label">Password</label>
										<div class="col-sm-8">
											<input type="password" class="form-control" name="password" id="password" placeholder="Password">
											<?= form_error('password','<div class="col-12"><small class="text-danger">','</small></div>')?>
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
			