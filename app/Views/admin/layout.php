<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Dimas Bayu">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title><?= $title; ?></title>

    <!-- Fontfaces CSS-->
    <link href="<?= base_url('admin/css/font-face.css'); ?>" rel="stylesheet" media="all">
    <link href="<?= base_url('admin/vendor/font-awesome-4.7/css/font-awesome.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?= base_url('admin/vendor/font-awesome-5/css/fontawesome-all.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?= base_url('admin/vendor/mdi-font/css/material-design-iconic-font.min.css'); ?>" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?= base_url('admin/vendor/bootstrap-4.1/bootstrap.min.css'); ?>" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Vendor CSS-->
    <link href="<?= base_url('admin/vendor/animsition/animsition.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?= base_url('admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?= base_url('admin/vendor/wow/animate.css'); ?>" rel="stylesheet" media="all">
    <link href="<?= base_url('admin/vendor/css-hamburgers/hamburgers.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?= base_url('admin/vendor/slick/slick.css'); ?>" rel="stylesheet" media="all">
    <link href="<?= base_url('admin/vendor/select2/select2.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?= base_url('admin/vendor/perfect-scrollbar/perfect-scrollbar.css'); ?>" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?= base_url('admin/css/theme.css'); ?>" rel="stylesheet" media="all">

    <!-- Jquery Ui -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">


</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="/admin/index">
                            <img src="/images/logo/logo-cakery.png" alt="Cakery" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <?= $this->include('admin/sidebar'); ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?= $this->include('admin/topbar'); ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <?= $this->renderSection('content'); ?>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="<?= base_url('admin/vendor/jquery-3.2.1.min.js'); ?>"></script>
    <!-- Bootstrap JS-->
    <script src="<?= base_url('admin/vendor/bootstrap-4.1/popper.min.js'); ?>"></script>
    <script src="<?= base_url('admin/vendor/bootstrap-4.1/bootstrap.min.js'); ?>"></script>
    <!-- Vendor JS       -->
    <script src="<?= base_url('admin/vendor/slick/slick.min.js'); ?>">
    </script>
    <script src="<?= base_url('admin/vendor/wow/wow.min.js'); ?>"></script>
    <script src="<?= base_url('admin/vendor/animsition/animsition.min.js'); ?>"></script>
    <script src="<?= base_url('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js'); ?>">
    </script>
    <script src="<?= base_url('admin/vendor/counter-up/jquery.waypoints.min.js'); ?>"></script>
    <script src="<?= base_url('admin/vendor/counter-up/jquery.counterup.min.js'); ?>">
    </script>
    <script src="<?= base_url('admin/vendor/circle-progress/circle-progress.min.js'); ?>"></script>
    <script src="<?= base_url('admin/vendor/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>
    <script src="<?= base_url('admin/vendor/chartjs/Chart.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('admin/vendor/select2/select2.min.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Main JS-->
    <script src="<?= base_url('admin/js/main.js'); ?>"></script>

    <!-- Script from every view -->
    <?= $this->renderSection('script'); ?>

    <!-- Jquery Ui -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

    <script>
        function previewImg() {
            const gambar = document.querySelector('#gambar');
            const gambarLable = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            gambarLable.textContent = gambar.files[0].name;

            const fileGambar = new FileReader();
            fileGambar.readAsDataURL(gambar.files[0]);

            fileGambar.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function previewAvatar() {
            const avatar = document.querySelector('#avatar');
            const avatarLable = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            avatarLable.textContent = avatar.files[0].name;

            const fileAvatar = new FileReader();
            fileAvatar.readAsDataURL(avatar.files[0]);

            fileAvatar.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>

</body>

</html>
<!-- end document-->