<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>No</th>
                                <th>ID Account</th>
                                <th>Email Client</th>
                                <th>Status</th>
                                <th>--</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($client->result() as $t) { ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td>
                                        <a href="<?= base_url("account/detail_account/" . $t->id_acn) ?>" target="_blank">
                                            <?= $t->id_acn ?>
                                        </a>
                                    </td>
                                    <td><?= $t->email_cl ?></td>
                                    <td>
                                        <a href="<?= base_url("client/status_purchase/" . $t->no_process . "/" . $t->id_acn) ?>" class="btn btn-warning" onclick="return confirm('Are you sure???')">On Process</a>
                                    </td>
                                    <td>
                                        <a href="<?= base_url("client/cancel_purchase/" . $t->no_process . "/" . $t->id_acn) ?>" class="btn btn-danger">Cancel</a>
                                    </td>
                                </tr>
                            <?php $no++;
                            } ?>
                        </tbody>
                        <?php if ($no > 7) { ?>
                            <tfoot class="bg-dark text-white">
                                <tr>
                                    <th>No</th>
                                    <th>ID Account</th>
                                    <th>Email Client</th>
                                    <th>Status</th>
                                    <th>--</th>
                                </tr>
                            </tfoot>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>