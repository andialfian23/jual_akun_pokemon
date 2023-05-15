<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6">
		<div class="card">
			<div class="card-header text-white bg-dark">
				<h4><?= $account->title ?></h4>
			</div>
			<div class="card-body text-left">
				<div class="table-responsive">
					<h4>Account Overview</h4>
					<table width="100%">
						<tr>
							<td width="45%">Team</td>
							<td>: <?= $account->team ?></td>
						</tr>
						<tr>
							<td>Level</td>
							<td>: <?= $account->level ?></td>
						</tr>
						<tr>
							<td>Pokecoins</td>
							<td>: <?= $account->pokecoins ?></td>
						</tr>
						<tr>
							<td>Stardust</td>
							<td>: <?= $account->star_dust ?></td>
						</tr>
						<tr>
							<td>Start Date</td>
							<td>: <?= $account->start_date ?></td>
						</tr>
						<tr>
							<td>Items Bag</td>
							<td>: <?= $account->item ?></td>
						</tr>
						<tr>
							<td>Login Method</td>
							<td>: <?= $account->login ?></td>
						</tr>
						<tr>
							<td>Price</td>
							<td>: $<?= $account->price ?></td>
						</tr>
					</table>
					<h4 style="margin-top:3%;">Pokemons Overview</h4>
					<table width="100%">
						<tr>
							<td width="45%">Pokemon Shiny</td>
							<td>: <?= $account->p_shiny ?></td>
						</tr>
						<tr>
							<td>Pokemon Legendary</td>
							<td>: <?= $account->p_legendary ?></td>
						</tr>
						<tr>
							<td>Pokemon Mythical</td>
							<td>: <?= $account->p_mythical ?></td>
						</tr>
						<tr>
							<td>Pokemon Shiny Baby</td>
							<td>: <?= $account->p_shiny_baby ?></td>
						</tr>
						<tr>
							<td>Pokemon with IV100</td>
							<td>: <?= $account->p_iv100 ?></td>
						</tr>
						<tr>
							<td>Pokemon with 3K+</td>
							<td>: <?= $account->p_3k ?></td>
						</tr>
						<tr>
							<td>Pokemon Bag</td>
							<td>: <?= $account->pokemon ?></td>
						</tr>
					</table>
					<?php if ($account->status != '2') { ?>
						<h4 style="margin-top:3%;">Setting</h4>
						<table width="100%">
							<tr>
								<td>Status</td>
								<td>:
									<?php if ($account->status == '1') { ?>
										<a href="<?= base_url("account/status_account/0/" . $account->id_acn) ?>" class="btn btn-success">Activated</a>
									<?php } else { ?>
										<a href="<?= base_url("account/status_account/1/" . $account->id_acn) ?>" class="btn btn-danger">Deactivated</a>
									<?php } ?>
								</td>
							</tr>
							<tr>
								<td>Action</td>
								<td>:
									<a href="<?= base_url("account/edit_account/" . $account->id_acn) ?>" class="btn btn-info btn-circle">
										<i class="mdi mdi-pencil"></i>
									</a>
									<a href="<?= base_url("account/del/" . $account->id_acn) ?>" class="btn btn-danger btn-circle" onclick="return confirm('Are you sure???')">
										<i class="mdi mdi-delete"></i>
									</a>
									</br>
								</td>
							</tr>
						</table>
					<?php } ?>
				</div>
			</div>
			<?php if ($account->status != '2') { ?>
				<div class="card-footer bg-dark">
					<div id="tombol" class="text-center">
						<button id="to-form-ss" class="btn btn-primary"><i class="mdi mdi-file-image"></i> Add Picture </a></button>
						<?php
						if ($ss->num_rows() > 1) {
						?>
							<button id="to-tombol-del" class="btn btn-danger"><i class="mdi mdi-delete"></i> Delete Picture </a></button>
							<button id="to-close" class="btn btn-danger"><i class="mdi mdi-close"></i> Close </a></button>
						<?php } ?>
					</div>
					<div id="form-ss">
						<form method="post" action="<?= base_url("account/add_picture/" . $account->id_acn) ?>" enctype="multipart/form-data">
							<div class="form-group row">
								<div class="col-md-9 col-sm-8 text-right">
									<input type="file" class="form-control" id="ss" name="ss" />
								</div>
								<div class="col-md-3 col-sm-4 text-center">
									<input type="submit" class="btn btn-primary m-b-5" value="Upload" /></br>
									<a href="#" id="to-tombol" class="btn btn-danger"><i class="mdi mdi-close"></i> Close</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6">
		<div class="card">
			<div class="card-header bg-dark text-white">
				<h4>Images</h4>
			</div>
			<div id="list-ss" class="card-body">
				<?php foreach ($ss->result() as $s) { ?>
					<img src="<?= base_url("img/" . $s->ss) ?>" width="100%" />
				<?php } ?>
			</div>
			<div id="del-ss" class="card-body text-center">
				<?php $no = 1;
				foreach ($ss->result() as $s) { ?>
					<img src="<?= base_url("img/" . $s->ss) ?>" width="50%" />
					<div class="m-b-5">
						<?php if ($no == 1) { ?>
							<a href="#" class="btn btn-dark "><i class="mdi mdi-picture"></i> Del Disable </a>
						<?php } else { ?>
							<a href="<?= base_url("account/del_ss/" . $s->kd_ss . "/" . $s->id_acn) ?>" class="btn btn-danger"><i class="mdi mdi-picture"></i> Del Picture </a>
						<?php } ?>
					</div>
				<?php $no++;
				} ?>
			</div>
		</div>
	</div>
</div>