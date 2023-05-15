			<div class="row">
				<div class="col-sm-6 col-md-6 col-lg-3 col-xlg-3">
					<div class="card card-hover">
						<div class="box bg-success text-center">
							<h1 class="font-light text-white"><i class="mdi mdi-earth"></i></h1>
							<h6 class="text-white"><?= $browser; ?> </h6>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3 col-xlg-3">
					<div class="card card-hover">
						<div class="box bg-primary text-center">
							<h1 class="font-light text-white"><i class="mdi mdi-access-point-network"></i></h1>
							<h6 class="text-white"><?= $ip; ?> </h6>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3 col-xlg-3">
					<div class="card card-hover">
						<div class="box bg-danger text-center">
							<h1 class="font-light text-white"><i class="mdi mdi-widgets"></i></h1>
							<h6 class="text-white"><?= $so; ?> </h6>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3 col-xlg-3">
					<div class="card card-hover">
						<div class="box bg-warning text-center">
							<h1 class="font-light text-white"><i class="mdi mdi-border-inside"></i></h1>
							<h6 class="text-white"><?= number_format($jml_account) ?> Accounts</h6>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 m-b-10 m-t-10">
					<h4>New Accounts Release for SALE</h4>
				</div>
			</div>

			<div class="row el-element-overlay">
				<?php foreach ($acn as $t) { ?>
					<div class="col-4">
						<div class="card">
							<div class="el-card-item">
								<div class="el-card-avatar el-overlay-1">
									<img src="<?= base_url("img/" . $t->ss) ?>" alt="user" />
									<div class="el-overlay">
										<ul class="list-style-none el-info">
											<li class="el-item">
												<a class="btn default btn-outline el-link" href="<?= base_url("B/detail_account/" . $t->id_acn) ?>">
													View
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="el-card-content">
									<h4 class="m-b-0"><?= $t->title ?></h4>
									<span class="text-primary"><?= $t->team ?></span>
									<span class="text-danger">Lvl.<?= $t->level ?></span>
									<span class="text-success">$<?= number_format($t->price) ?>,00</span>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 m-b-10 text-center">
					<a href="<?= base_url("B/list_account") ?>" class="btn btn-info">View More...</a>
				</div>
			</div>