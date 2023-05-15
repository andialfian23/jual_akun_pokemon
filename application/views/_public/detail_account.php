<div class="row">
	<div class="col-12">
		<?= $this->session->flashdata('message'); ?>
		<?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<img src="<?= base_url("img/" . $account->ss) ?>" width="100%" />
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12">
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
					</td>
					<table width="100%">
						<tr>
							<td width="50%">Pokemon Shiny</td>
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
				</div>
			</div>
			<div class="card-footer bg-dark">
				<div id="buy">
					<?php if ($account->status != '2') { ?>
						<button id="to-form-buy" class="btn btn-success float-right">Buy</button>
					<?php } else { ?>
						<button class="btn btn-success float-right">On Purchase Process </button>
					<?php } ?>
				</div>
				<div id="form-buy">
					<form method="post" action="<?= base_url("A/detail_account/" . $account->id_acn) ?>">
						<div class="form-group row text-white">
							<div class="col-12">
								<p align="center">Enter your Email correctly, because we will contact you for the purchase proses, and send the account information that has been purchased via Email.</p>
							</div>
						</div>
						<div class="form-group row text-white">
							<div class="col-lg-8 col-md-8 col-sm-8 text-right">
								<input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email" />
								<input type="hidden" name="id_acn" value="<?= $account->id_acn ?>" />
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 text-center">
								<input type="submit" class="btn btn-primary" value="Submit" />
								<a href="#" id="to-close" class="btn btn-success"> Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row justify-content-center m-t-15">
	<div class="col-lg-6 col-md-6 col-sm-12 ">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">

			<?php
			$max_height = $this->ss_model->max_height($account->id_acn);
			?>
			<div class="carousel-inner" style="height:<?= $max_height; ?>px;" role="listbox">
				<?php $no = 0;
				foreach ($ss->result() as $s) { ?>
					<div class="item <?= ($no == 0) ? "active" : ''; ?>">
						<img src="<?= base_url("img/" . $s->ss) ?>" />
					</div>
				<?php $no++;
				} ?>
			</div>
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</div>