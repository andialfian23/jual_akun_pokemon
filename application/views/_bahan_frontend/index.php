<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>

    <?php $this->load->view("_bahan_frontend/head"); ?>

</head>

<body>
    <?php $this->load->view("page_loader"); ?>

    <div id="main-wrapper">
        <div class="luar">

            <?php $this->load->view("_bahan_frontend/navbar"); ?>

            <div class="tengah">
                <div class="container-fluid">

                    <?php $this->load->view("_public/" . $views); ?>

                </div>
            </div>
            <div class="bawah">

                <?php $this->load->view("_bahan_frontend/footer"); ?>

            </div>
        </div>
    </div>

    <?php $this->load->view("_bahan_frontend/js"); ?>

</body>

</html>