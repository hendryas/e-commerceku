<!--
    Item Name: Erratum - 404 Error pages + Coming soon + login
    Author: Ashish Maraviya
    Version: 3
    Copyright 2023
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Erratum – Multi purpose error page template for Service, corporate, agency, Consulting, startup.">
    <meta name="keywords" content="Error page 404, page not found design, wrong url, login, coming soon">
    <meta name="author" content="Ashishmaraviya">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
    <title>Acces Block</title>
    <!--Google font-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300&display=swap" rel="stylesheet">
    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href=" <?= base_url('assets/assets_error/assets/css/bootstrap.css') ?>">
    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/assets_error/assets/css/error-page.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/assets_error/assets/css/error-page-responsive.css') ?>">
</head>

<body>
    <!-- 01 Preloader -->
    <div class="loader-wrapper" id="loader-wrapper">
        <div class="loader"></div>
    </div>
    <!-- Preloader end -->
    <!-- 02 Main page -->
    <section class="page-section">
        <div class="full-width-screen">
            <div class="container-fluid">
                <div class="content-detail">
                    <h1 class="global-title"><span>4</span><span>0</span><span>4</span></h1>

                    <h4 class="sub-title">Oops!</h4>

                    <p class="detail-text">Maaf,<br> Halaman yang kamu cari tidak ditemukan.</p>

                    <div class="back-btn">

                        <?php if ($role_id == 1 || $role_id == 2) : ?>
                            <a href="<?= base_url('admin') ?>" class="btn">Back to Home</a>
                        <?php elseif ($role_id == 3) : ?>
                            <a href="<?= base_url('home') ?>" class="btn">Back to Home</a>
                        <?php elseif ($role_id == 4) : ?>
                            <a href="<?= base_url('home') ?>" class="btn">Back to Home</a>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- latest jquery-->
    <script src="<?= base_url('assets/assets_error/assets/js/jquery-3.5.1.min.js') ?>"></script>
    <!-- Theme js-->
    <script src="<?= base_url('assets/assets_error/assets/js/script.js') ?>"></script>
</body>

</html>