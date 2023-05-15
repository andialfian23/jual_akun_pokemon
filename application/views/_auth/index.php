<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Login Admin">
    <meta name="author" content="NaCl Squad">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("my_assets/images/favicon.png") ?>">
    <title><?= $title ?></title>
    <link href="<?= base_url('matrix/') ?>dist/css/style.min.css" rel="stylesheet">
</head>

<body>

    <?php $this->load->view('_auth/' . $view) ?>


    <script src="<?= base_url('matrix/') ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('matrix/') ?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url('matrix/') ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        $('[data-toggle="tooltip"]').tooltip();
        $(".preloader").fadeOut();
    </script>
</body>

</html>