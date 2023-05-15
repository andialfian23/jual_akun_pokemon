<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="zero_config" class="table table-striped table-bordered">
						<thead class="bg-dark text-white">
							<tr>
								<th>No</th>
								<th>Title</th>
								<th>Team</th>
								<th>Lvl.</th>
								<th>Pokemon</th>
								<th>Price</th>
								<th>Status</th>
								<th>--</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($acn->result() as $t) { ?>
								<tr>
									<td><?= $no ?></td>
									<td>
										<a href="<?= base_url("account/detail_account/" . $t->id_acn) ?>">
											<?= $t->title ?>
										</a>
									</td>
									<td><?= $t->team ?></td>
									<td><?= $t->level ?></td>
									<td><?= $t->pokemon ?></td>
									<td>$<?= $t->price ?></td>
									<td>
										<?php
										if ($t->purchased == '0') {
											if ($t->status == '1') {
										?>
												<a href="<?= base_url("account/status_account/0/" . $t->id_acn) ?>" class="btn btn-success">Activated</a>
											<?php } else if ($t->status == '0') { ?>
												<a href="<?= base_url("account/status_account/1/" . $t->id_acn) ?>" class="btn btn-danger">Deactivated</a>
										<?php } else {
												echo 'On Process';
											}
										} else {
											echo 'Purchased';
										} ?>
									</td>
									<td>
										<?php
										if (($t->purchased == '0') && ($t->status != '2')) {
										?>
											<a href="<?= base_url("account/edit_account/" . $t->id_acn) ?>" class="btn btn-info">
												<i class="mdi mdi-pencil"></i>
											</a>
											<a href="<?= base_url("account/del/" . $t->id_acn) ?>" class="btn btn-danger">
												<i class="mdi mdi-delete"></i>
											</a>
										<?php } ?>
									</td>
								</tr>
							<?php $no++;
							} ?>
						</tbody>
						<?php if ($no > 7) { ?>
							<tfoot class="bg-dark text-white">
								<tr>
									<th>No</th>
									<th>Title</th>
									<th>Lvl.</th>
									<th>Pokemon</th>
									<th>Star Dust</th>
									<th>Price</th>
									<th>Status</th>
									<th>--</th>
								</tr>
							</tfoot>
						<?php
						}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>