<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-12">
		<div class="card">
			<div class="card-body">
				<form method="post" action="<?= base_url("account/add_account") ?>" enctype="multipart/form-data">
					<h4>Account Overview</h4>
					<div class="form-group row">
						<label for="title" class="col-sm-3  control-label col-form-label">Title</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="title" id="title" placeholder="Title" autofocus value="<?= set_value('title') ?>">
							<?= form_error('title', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="name" class="col-sm-3  control-label col-form-label">Team</label>
						<div class="col-sm-9">
							<select id="name" name="name" class="form-control custom-select">
								<option value="--">--</option>
								<option value="Valor">Valor</option>
								<option value="Mystic">Mystic</option>
								<option value="Instinct">Instinct</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="lvl" class="col-sm-3  control-label col-form-label">Level</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="lvl" id="lvl" placeholder="Level Account" value="<?= set_value('level') ?>">
							<?= form_error('lvl', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="coin" class="col-sm-3  control-label col-form-label">Pokecoins</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="coin" id="coin" placeholder="Pokecoins" value="<?= set_value('coin') ?>">
							<?= form_error('coin', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="sd" class="col-sm-3  control-label col-form-label">Stardust</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="sd" id="sd" placeholder="Stardust" value="<?= set_value('sd') ?>">
							<?= form_error('sd', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="sdt" class="col-sm-3  control-label col-form-label">Start Date</label>
						<div class="col-sm-9">
							<input type="date" class="form-control" name="sdt" id="sdt" value="<?= set_value('sdt') ?>">
							<?= form_error('sdt', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="item" class="col-sm-3  control-label col-form-label">Items Bag</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="item" id="item" placeholder="Item Bag" value="<?= set_value('item') ?>">
							<?= form_error('item', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="login" class="col-sm-3  control-label col-form-label">Login Method</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="login" id="login" placeholder="Login Method" value="<?= set_value('login') ?>">
							<?= form_error('login', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="price" class="col-sm-3  control-label col-form-label">Price</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="price" id="price" placeholder="Price Account" value="<?= set_value('price') ?>">
							<?= form_error('price', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="ss" class="col-sm-3  control-label">ScreenShot</label>
						<div class="col-sm-9">
							<input type="file" class="form-control" id="ss" name="ss" />
						</div>
					</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12">
		<div class="card">
			<div class="card-body">
				<h4>Pokemon Overview</h4>
				<div class="form-group row">
					<label for="p_shi" class="col-sm-4 control-label col-form-label">Pokemon Shiny</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="p_shi" id="p_shi" placeholder="Pokemon Shiny" value="<?= set_value('p_shi') ?>">
						<?= form_error('p_shi', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="p_leg" class="col-sm-4 control-label col-form-label">Pokemon Legendary</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="p_leg" id="p_leg" placeholder="Pokemon Legendary" value="<?= set_value('p_leg') ?>">
						<?= form_error('p_leg', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="p_myt" class="col-sm-4 control-label col-form-label">Pokemon Mythical</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="p_myt" id="p_myt" placeholder="Pokemon Mythical" value="<?= set_value('p_myt') ?>">
						<?= form_error('p_myt', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="p_shi_b" class="col-sm-4 control-label col-form-label">Pokemon Shiny Baby</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="p_shi_b" id="p_shi_b" placeholder="Pokemon Shiny Baby" value="<?= set_value('p_shi_b') ?>">
						<?= form_error('p_shi_b', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="p_iv" class="col-sm-4 control-label col-form-label">Pokemon with IV 100</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="p_iv" id="p_iv" placeholder="Pokemon with IV 100" value="<?= set_value('p_iv') ?>">
						<?= form_error('p_iv', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="p_3k" class="col-sm-4 control-label col-form-label">Pokemon with 3K+</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="p_3k" id="p_3k" placeholder="Pokemon with 3K+" value="<?= set_value('p_3k') ?>">
						<?= form_error('p_3k', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="pokemon" class="col-sm-4 control-label col-form-label">Pokemon Bag</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="pokemon" id="pokemon" placeholder="Pokemon Bag" value="<?= set_value('pokemon') ?>">
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