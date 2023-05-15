			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="card">
							<div class="card-body">
								<form class="form-horizontal" method="POST" action="<?= base_url("B/change_contact_us") ?>">


									<div class="form-group row">
										<label for="gmail" class="col-sm-4 text-right control-label col-form-label">Gmail</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="gmail" id="gmail" value="<?= $contact->gmail ?>">
											<?= form_error('gmail', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="pw_gmail" class="col-sm-4 text-right control-label col-form-label">Password Gmail</label>
										<div class="col-sm-8">
											<input type="password" class="form-control" name="pw_gmail" id="pw_gmail" value="<?= $contact->pw_gmail ?>">
											<?= form_error('pw_gmail', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="paypal" class="col-sm-4 text-right control-label col-form-label">Paypal</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="paypal" id="paypal" value="<?= $contact->paypal ?>">
											<?= form_error('paypal', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="ebay" class="col-sm-4 text-right control-label col-form-label">ebay</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="ebay" id="ebay" value="<?= $contact->ebay ?>">
											<?= form_error('ebay', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="g2g" class="col-sm-4 text-right control-label col-form-label">g2g</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="g2g" id="g2g" value="<?= $contact->g2g ?>">
											<?= form_error('g2g', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="discord" class="col-sm-4 text-right control-label col-form-label">Discord</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="discord" id="discord" value="<?= $contact->discord ?>">
											<?= form_error('discord', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="fb" class="col-sm-4 text-right control-label col-form-label">Facebook</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="fb" id="fb" value="<?= $contact->fb ?>">
											<?= form_error('fb', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="ins" class="col-sm-4 text-right control-label col-form-label">Instagram</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="ins" id="ins" value="<?= $contact->instagram ?>">
											<?= form_error('ins', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
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