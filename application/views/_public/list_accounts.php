<div class="row">
	<div class="col-12">
		<?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
	</div>
</div>
<div class="row m-b-10">
	<div class="col-12">
		<div class="btn-group">
			<button class="btn btn-dark">Sorting by : </button>
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $title; ?></button>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="<?= base_url("A/accounts/new") ?>">New Accounts Release</a>
				<a class="dropdown-item" href="<?= base_url("A/accounts/price_low_to_high") ?>">Price Low to High</a>
				<a class="dropdown-item" href="<?= base_url("A/accounts/price_high_to_low") ?>">Price High to Low</a>
				<a class="dropdown-item" href="<?= base_url("A/accounts/level_low_to_high") ?>">Level Low to High</a>
				<a class="dropdown-item" href="<?= base_url("A/accounts/level_high_to_low") ?>">Level High to Low</a>
				<a class="dropdown-item" href="<?= base_url("A/accounts/title_a_z") ?>">Title A to Z</a>
				<a class="dropdown-item" href="<?= base_url("A/accounts/title_z_a") ?>">Title Z to A</a>
				<a class="dropdown-item" href="<?= base_url("A/accounts/p_shiny") ?>">Shiny Pokemon</a>
				<a class="dropdown-item" href="<?= base_url("A/accounts/p_legendary") ?>">Legendary Pokemon</a>
				<a class="dropdown-item" href="<?= base_url("A/accounts/old") ?>">Old to New</a>
			</div>
		</div>
	</div>
</div>
<div class="row el-element-overlay p-t-10">
	<?php $no = 1;
	foreach ($account->result() as $t) { ?>
		<div class="col-sm-6 col-lg-4 col-md-6 m-t-10">
			<div class="card acn bg-dark text-white">
				<div class="card-header p-0">
					<div class="col-12 p-l-0">
						<p class="font-15"><span class="btn btn-success"><b>$<?= $t->price ?></span>
							<font color="pink"><?= $t->team ?></font>
							<font color="gold">Lvl.<?= $t->level ?></font></b>
						</p>
					</div>
					<div class="col-12 border-top p-t-5 text-white">
						<h5><?= $t->title ?></h5>
					</div>
				</div>
				<div class="el-card-item">
					<div class="el-card-avatar el-overlay-1">
						<img src="<?= base_url("img/" . $t->ss) ?>" class="brd" />
						<div class="el-overlay">
							<ul class="list-style-none el-info">
								<li class="el-item">
									<a class="btn default btn-outline el-link" href="<?= base_url("A/detail_account/" . $t->id_acn) ?>">
										View more
									</a>
								</li>
								<?php
								if ($t->status != '2') {
								?>
									<li class="el-item">
										<a class="btn default btn-outline el-link" href="javascript:void(0);" data-toggle="modal" data-target="#Modal<?= $no ?>">Buy</a>
									</li>
								<?php } ?>
							</ul>
						</div>
					</div>
					<div class="el-card-content" style="padding:1px;">
						<p class="btn btn-danger">
							<?= number_format($t->p_shiny) ?> Shiny Pokemons
						</p>
						<p class="btn btn-primary">
							<?= number_format($t->p_legendary) ?> Legendary Pokemons
						</p>
						<p class="btn btn-warning">
							<?= 'Start Date : ' . tanggal($t->start_date) ?>
						</p>
					</div>
				</div>

				<div class="modal fade" id="Modal<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<form method="post" action="<?= base_url("A/accounts/" . $this->uri->segment(3)) ?>">
								<div class="modal-header bg-dark text-white">
									<h5 class="modal-title" id="exampleModalLabel"><?= $t->title ?></h5>
								</div>
								<div class="modal-body">
									<div class="form-group row text-dark">
										<div class="col-12">
											<p align="center">Enter your Email correctly, because we will contact you for the purchase proses, and send the account information that has been purchased via Email.</p>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-12">
											<input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email" autofocus required>
											<input type="text" class="invisible" name="id_acn" value="<?= $t->id_acn ?>" />
										</div>
									</div>
								</div>
								<div class="modal-footer bg-dark">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php $no++;
	} ?>
</div>
<div class="row">
	<div class="col-12">
		<?php echo $pagination; ?>
	</div>
</div>