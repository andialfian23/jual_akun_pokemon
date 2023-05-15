<div class="row">
	<div class="col-md-6 col-sm-12 col-lg-6">
		<div class="card">
			<div class="card-body">
				<form method="post" action="<?= base_url("account/edit_account/" . $account->id_acn) ?>" enctype="multipart/form-data">
					<h4>Account Overview</h4>
					<div class="form-group row">
						<label for="title" class="col-sm-3 text-right control-label col-form-label">Title</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="title" id="title" value="<?= $account->title ?>">
							<?= form_error('title', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="name" class="col-sm-3 text-right control-label col-form-label">Team</label>
						<div class="col-sm-9">
							<select id="name" name="name" class="form-control custom-select" required>
								<option value="<?= $account->team ?>" hidden><?= $account->team ?></option>
								<option value="--">--</option>
								<option value="Valor">Valor</option>
								<option value="Mystic">Mystic</option>
								<option value="Instinct">Instinct</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="lvl" class="col-sm-3 text-right control-label col-form-label">Level</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="lvl" id="lvl" value="<?= $account->level ?>">
							<?= form_error('lvl', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="coin" class="col-sm-3 text-right control-label col-form-label">Pokecoins</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="coin" id="coin" value="<?= $account->pokecoins ?>">
							<?= form_error('coin', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="sd" class="col-sm-3 text-right control-label col-form-label">Stardust</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="sd" id="sd" value="<?= $account->star_dust ?>">
							<?= form_error('sd', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="sdt" class="col-sm-3 text-right control-label col-form-label">Start Date</label>
						<div class="col-sm-9">
							<input type="date" class="form-control" name="sdt" id="sdt" value="<?= $account->start_date ?>" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="item" class="col-sm-3 text-right control-label col-form-label">Items Bag</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="item" id="item" value="<?= $account->item ?>">
							<?= form_error('item', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="login" class="col-sm-3 text-right control-label col-form-label">Login Method</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="login" id="login" value="<?= $account->login ?>">
							<?= form_error('login', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="price" class="col-sm-3 text-right control-label col-form-label">Price</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="price" id="price" value="<?= $account->price ?>">
							<?= form_error('price', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
						</div>
					</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-12 col-lg-6">
		<div class="card">
			<div class="card-body">
				<h4>Pokemon Overview</h4>
				<div class="form-group row">
					<label for="p_shi" class="col-sm-4 control-label col-form-label">Pokemon Shiny</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="p_shi" id="p_shi" value="<?= $account->p_shiny ?>">
						<?= form_error('p_shi', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="p_leg" class="col-sm-4 control-label col-form-label">Pokemon Legendary</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="p_leg" id="p_leg" value="<?= $account->p_legendary ?>">
						<?= form_error('p_leg', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="p_myt" class="col-sm-4 control-label col-form-label">Pokemon Mythical</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="p_myt" id="p_myt" value="<?= $account->p_mythical ?>">
						<?= form_error('p_myt', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="p_shi_b" class="col-sm-4 control-label col-form-label">Pokemon Shiny Baby</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="p_shi_b" id="p_shi_b" value="<?= $account->p_shiny_baby ?>">
						<?= form_error('p_shi_b', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="p_iv" class="col-sm-4 control-label col-form-label">Pokemon with IV 100</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="p_iv" id="p_iv" value="<?= $account->p_iv100 ?>">
						<?= form_error('p_iv', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="p_3k" class="col-sm-4 control-label col-form-label">Pokemon with 3K+</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="p_3k" id="p_3k" value="<?= $account->p_3k ?>">
						<?= form_error('p_3k', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="pokemon" class="col-sm-4 control-label col-form-label">Pokemon Bag</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="pokemon" id="pokemon" value="<?= $account->pokemon ?>">
						<?= form_error('pokemon', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
					</div>
				</div>
				<div class="border-top">
					<div class="card-body text-center">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>