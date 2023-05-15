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
                                <th>DateTime</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($purchased as $t) { ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td>
                                        <a href="<?= base_url("account/detail_account/" . $t->id_acn) ?>" target="_blank">
                                            <?= $t->id_acn ?>
                                        </a>
                                    </td>
                                    <td><?= $t->email_cl ?></td>
                                    <td><?= $t->dt_purchased ?></td>
                                </tr>
                            <?php $no++;
                            } ?>
                        </tbody>
                        <?php if ($no > 10) { ?>
                            <tfoot class="bg-dark text-white">
                                <tr>
                                    <th>No</th>
                                    <th>ID Account</th>
                                    <th>Email Client</th>
                                    <th>DateTime</th>
                                </tr>
                            </tfoot>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>