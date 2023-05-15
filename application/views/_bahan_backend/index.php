<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="PokemonGoShop">
    <meta name="author" content="NaCl Squad">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("my_assets/images/favicon.png") ?>">
    <title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('matrix/') ?>assets/extra-libs/multicheck/multicheck.css">
    <link rel="stylesheet" href="<?= base_url('matrix/') ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?= base_url('matrix/') ?>dist/css/style.min.css">
</head>

<body>

    <?php $this->load->view("page_loader"); ?>

    <div id="main-wrapper">

        <?php $this->load->view("_bahan_backend/navbar"); ?>

        <?php $this->load->view("_bahan_backend/sidebar"); ?>

        <div class="page-wrapper">

            <?php $this->load->view("_bahan_backend/breadcrumb"); ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                </div>

                <?php $this->load->view($view); ?>

            </div>

            <footer class="footer text-center">
                2020 &copy All Rights Reserved by Matrix-admin. Designed and Developed by WrapPixel</a> and reBuild by NaCl Radhs.<br>
                v.1.0.0
            </footer>
        </div>
    </div>

    <?php $this->load->view("_bahan_backend/js"); ?>

</body>

</html>