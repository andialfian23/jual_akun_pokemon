	<header class="topbar" data-navbarbg="skin5">
		<nav class="navbar top-navbar navbar-expand-md navbar-dark">
			<div class="navbar-header" data-logobg="skin5">
				<a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
				<a class="navbar-brand" href="<?= base_url("B") ?>">
					<b class="logo-icon p-l-10">
						<i class="wi wi-sunset"></i>
						<img src="<?= base_url("matrix/dist/images/logo-icon.png") ?>" alt="homepage" class="light-logo" />
					</b>
					<span class="logo-text">
						<img src="<?= base_url("matrix/dist/images/logo-text.png") ?>" alt="homepage" class="light-logo" />
					</span>
				</a>
				<a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<i class="ti-more"></i>
				</a>
			</div>
			<div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
				<ul class="navbar-nav float-left mr-auto">
					<li class="nav-item d-none d-md-block">
						<a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
							<i class="mdi mdi-menu font-24"></i>
						</a>
					</li>
				</ul>
				<ul class="navbar-nav float-right">

					<?php
					$data_client = $this->client_model->list_client();
					$jml = $data_client->num_rows();
					if ($jml > 0) { ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="font-24 mdi mdi-bell"></i>
								<span class="label-count"><?= $jml ?></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
								<ul class="list-style-none">
									<li>
										<div class="">
											<?php
											foreach ($data_client->result() as $c) { ?>
												<a href="<?= base_url("B/detail_account/" . $c->id_acn) ?>" class="link border-top">
													<div class="d-flex no-block align-items-center p-10">
														<span class="btn btn-danger btn-circle"><i class="ti-user"></i></span>
														<div class="m-l-10">
															<h5 class="m-b-0"><?= $c->email_cl ?></h5>
															<span class="mail-desc">Order a ID Account : 202007172115pm</span>
														</div>
													</div>
												</a>
											<?php } ?>
										</div>
									</li>
									<li>
										<div class="text-center">
											<a href="<?= base_url("B/list_purchase") ?>"> View More </a>
										</div>
									</li>
								</ul>
							</div>
						</li>
					<?php } ?>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img src="<?= base_url("matrix/dist/images/users/1.jpg") ?>" alt="user" class="rounded-circle" width="31">
						</a>
						<div class="dropdown-menu dropdown-menu-right user-dd animated">
							<a class="dropdown-item" href="<?= base_url("B/profile") ?>"><i class="ti-user m-r-5 m-l-5"></i> Profile</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?= base_url("Door/logout") ?>"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</header>