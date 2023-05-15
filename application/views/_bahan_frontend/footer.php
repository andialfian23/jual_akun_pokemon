<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-3 col-md-6">
            <a href="<?= base_url() ?>"><span class="logo-text">
                    <img src="<?= base_url("my_assets/images/pokego.png") ?>" alt="homepage" width="100%" height="auto" class="light-logo" />
                </span></a>
            <br>
            <br>
        </div>
        <div class="col-sm-12 col-lg-3 col-md-6">
            <b>Navigation</b></br>
            <a href="<?= base_url() ?>" class="btn"><i class="mdi mdi-home font-20"></i> <b>Home</b></a><br>
            <a href="<?= base_url("A/accounts/new") ?>" class="btn"><i class="mdi mdi-border-inside font-20"></i> <b>Accounts</b></a>
            <br>
            <br>
        </div>
        <div class="col-sm-12 col-lg-3 col-md-6">
            <b>Contact Us</b><br>
            <?php $co = $this->mydb->contact_us()->row(); ?>
            <table cellpadding="3" width="60%">
                <tr>
                    <td><i class="mdi mdi-gmail font-20"></i></td>
                    <td><?= $co->gmail ?></td>
                </tr>
                <tr>
                    <td><i class="text-info fab fa-paypal font-20"></i></td>
                    <td><?= $co->paypal ?></td>
                </tr>
                <tr>
                    <td><i class="text-warning font-bold">ebay</i></td>
                    <td><?= $co->ebay ?></td>
                </tr>
                <tr>
                    <td><i class="text-info font-bold">G2g</i></td>
                    <td><?= $co->g2g ?></td>
                </tr>
                <tr>
                    <td><i class="text-info fab fa-discord font-20"></i></td>
                    <td><?= $co->discord ?></td>
                </tr>
                <tr>
                    <td><i class="text-primary fab fa-facebook font-20"></i></td>
                    <td><?= $co->fb ?></td>
                </tr>
                <tr>
                    <td><i class="text-warning mdi mdi-instagram font-20"></i></td>
                    <td><?= $co->instagram ?></td>
                </tr>
            </table>
            <br>
            <br>
        </div>
        <div class="col-sm-12 col-lg-3 col-md-6">
            <b>PokeGo.epizy.com</b></br>
            Powered by <b>
                <font color="#ff0">[NaCl]</font>Radhs
            </b><br>
            &copy 2020 - All Right Reserved<br>
            v.1.5.7
        </div>
    </div>
</div>