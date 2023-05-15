			<div class="row">
				<div class="col-12">
					<?= form_error('gmail', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12">
					<div class="card">
						<div class="card-header text-white bg-dark">
							<h4><?= $_SESSION['name'] ?></h4>
						</div>
						<div class="card-body text-left">
							<i class="text-danger mdi mdi-gmail font-20"></i> <?= $_SESSION['email'] ?><br>
							<i class="mdi mdi-access-point-network font-20"></i> <?= $ip; ?><br>
							<i class="mdi mdi-earth font-20"></i> <?= $browser; ?><br>
							<i class="mdi mdi-widgets font-20"></i> <?= $so; ?><br>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12">
					<div class="card">
						<div class="card-header bg-dark text-white">
							<h4>Contact Us</h4>
						</div>
						<div class="card-body">
							<table cellpadding="3" width="80%">
								<tr>
									<td><i class="text-danger mdi mdi-gmail font-20"></i></td>
									<td><?= $contact->gmail ?></td>
								</tr>
								<tr>
									<td><i class="text-info fab fa-paypal font-20"></i></td>
									<td><?= $contact->paypal ?></td>
								</tr>
								<tr>
									<td><i class="text-info font-bold">Ebay</i></td>
									<td><?= $contact->ebay ?></td>
								</tr>
								<tr>
									<td><i class="text-info font-bold">G2g</i></td>
									<td><?= $contact->g2g ?></td>
								</tr>
								<tr>
									<td><i class="text-info fab fa-discord font-20"></i></td>
									<td><?= $contact->discord ?></td>
								</tr>
								<tr>
									<td><i class="text-primary fab fa-facebook font-20"></i></td>
									<td><?= $contact->fb ?></td>
								</tr>
								<tr>
									<td><i class="text-danger mdi mdi-instagram font-20"></i></td>
									<td><?= $contact->instagram ?></td>
								</tr>
							</table>
						</div>
						<div class="card-footer text-right">
							<a href="<?= base_url("B/change_contact_us") ?>" class="btn btn-block btn-success"><i class="mdi mdi-pencil"></i> Edit Contact Us</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12">
					<div class="card">
						<div class="card-header bg-dark text-white">
							<h4>Setting</h4>
						</div>
						<div class="card-body p-b-2">
							<a href="<?= base_url("B/change_username") ?>" class="btn btn-block btn-info mb-3"><i class="mdi mdi-account-edit"></i> Change Username</a>
							<a href="<?= base_url("B/change_password") ?>" class="btn btn-block btn-primary mb-3"><i class="mdi mdi-key"></i> Change Password</a>
							<a href="" class="btn btn-block btn-danger mb-3" data-toggle="modal" data-target="#Modal2"><i class="mdi mdi-gmail"></i> Change Email Admin</a>
						</div>
						<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content bg-dark text-white">
									<form action="<?= base_url("B/change_gmail") ?>" method="post">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Change Email Admin</h5>
											<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="form-group row">
												<div class="col-sm">
													<p align="center">Enter your Email correctly,<br> because We will send to The Email for Next Process.</p>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-9">
													<input type="text" name="gmail" id="gmail" class="form-control" placeholder="Enter Your Email">
												</div>
												<div class="col-sm-3">
													<button type="submit" class="btn btn-block btn-danger">Send</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header bg-dark text-white">
							<h4>Last Login</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered">
									<thead class="bg-dark text-white">
										<tr>
											<th>Datetime</th>
											<th>IP Address</th>
											<th>Browser</th>
											<th>Platform</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($login as $t) {
											if ($no > 1) {
										?>
												<tr>
													<td><?= $t->dt ?></td>
													<td><?= $t->ip_address ?></td>
													<td><?= $t->browser ?></td>
													<td><?= $t->platform ?></td>
												</tr>
										<?php
											}
											$no++;
										}
										?>
										<tr>
											<td colspan="4" align="center">
												<a href="<?= base_url("B/history_login") ?>" class="btn btn-dark">View more</a>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>