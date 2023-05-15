			
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						 <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead class="bg-dark text-white">
                                            <tr>
                                                <th>No</th>
                                                <th>Datetime</th>
                                                <th>IP Address</th>
                                                <th>Browser</th>
                                                <th>Platform</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php $no=1; foreach($login as $t){ ?>
                                            <tr>
                                                <td><?= $no?></td>
                                                <td><?= $t->dt?></td>
                                                <td><?= $t->ip_address?></td>
                                                <td><?= $t->browser?></td>
                                                <td><?= $t->platform?></td>
                                            </tr>
											<?php $no++; } ?>
                                        </tbody>
                                        <tfoot  class="bg-dark text-white">
                                            <tr>
												<th>No</th>
												<th>Datetime</th>
                                                <th>IP Address</th>
                                                <th>Browser</th>
                                                <th>Platform</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
			