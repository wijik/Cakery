<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cakery</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('images/cake-icon.png'); ?>">
    <link rel="apple-touch-icon" href="<?= base_url('apple-touch-icon.png'); ?>">


    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Owl Carousel main css -->
    <link rel="stylesheet" href="<?= base_url('css/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/owl.theme.default.min.css'); ?>">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="<?= base_url('css/core.css'); ?>">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="<?= base_url('css/shortcode/shortcodes.css'); ?>">
    <!-- Theme main style -->
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
    <!-- Responsive css -->
    <link rel="stylesheet" href="<?= base_url('css/responsive.css'); ?>">
    <!-- User style -->
    <link rel="stylesheet" href="<?= base_url('css/custom.css'); ?>">
    <!-- Font -->
    <link rel="stylesheet" href="<?= base_url('css/material-design-iconic-font.min.css'); ?>">


    <!-- Modernizr JS -->
    <script src="<?= base_url('js/vendor/modernizr-2.8.3.min.js'); ?>"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
        <?= $this->include('template/navbar'); ?>
        <!-- End Header Style -->

        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="search__inner">
                                <form action="#" method="get">
                                    <input placeholder="Search here... " type="text">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
            <!-- Start Offset MEnu -->
            <div class="offsetmenu">
                <div class="offsetmenu__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="off__contact">
                        <div class="logo">
                            <a href="/">
                                <img src="<?= base_url('images/logo/logo-cakery.png'); ?>" alt="logo">
                            </a>
                        </div>
                        <p>Cakery adalah aplikasi jual online </p>
                    </div>
                    <div class="offset__sosial__share">
                        <h4 class="offset__title">Ikuti kami di media sosial</h4>
                        <ul class="off__soaial__link">
                            <li><a class="bg--instagram" href="https://www.instagram.com/dimaaasbayu/" title="Instagram"><i class="zmdi zmdi-instagram"></i></a></li>
                            <li><a class="bg--facebook" href="https://www.facebook.com/profile.php?id=100042861811713" title="Facebook"><i class="zmdi zmdi-facebook"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Offset MEnu -->
            <!-- Start Cart Panel -->
            <div class="shopping__cart">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="shp__cart__wrap">
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="<?= base_url('images/product/sm-img/1.jpg'); ?>" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html">BO&Play Wireless Speaker</a></h2>
                                <span class="quantity">QTY: 1</span>
                                <span class="shp__price">$105.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="<?= base_url('images/product/sm-img/2.jpg'); ?>" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html">Brone Candle</a></h2>
                                <span class="quantity">QTY: 1</span>
                                <span class="shp__price">$25.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                    </div>
                    <ul class="shoping__total">
                        <li class="subtotal">Subtotal:</li>
                        <li class="total__price">$130.00</li>
                    </ul>
                    <ul class="shopping__btn">
                        <li><a href="/cart/view/<?= session()->get('id'); ?>">View Cart</a></li>
                        <li class="shp__checkout"><a href="checkout.html">Checkout</a></li>
                    </ul>
                </div>
            </div>
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->

        <!-- Start Feature Product -->
        <!-- End Feature Product -->
        <!-- Banner -->
        <?= $this->include('template/banner'); ?>
        <!-- End Banner -->
        <!-- Start Our Product Area -->
        <section class="htc__product__area bg__white">
            <?= $this->renderSection('body') ?>
        </section>
        <!-- End Our Product Area -->

        <!-- Banner -->
        <!-- End Banner -->

        <!-- Start Blog Area -->

        <!-- End Blog Area -->

        <!-- Start Footer Area -->
        <?= $this->include('template/footer'); ?>
        <!-- End Footer Area -->
    </div>
    <!-- Body main wrapper end -->
    <!-- QUICKVIEW PRODUCT -->
    <?= $this->renderSection('modal'); ?>
    <!-- END QUICKVIEW PRODUCT -->
    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="<?= base_url('js/vendor/jquery-1.12.0.min.js'); ?>"></script>
    <!-- Bootstrap framework js -->
    <script src="<?= base_url('js/bootstrap.min.js'); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- All js plugins included in this file. -->
    <script src="<?= base_url('js/plugins.js'); ?>"></script>
    <script src="<?= base_url('js/slick.min.js'); ?>"></script>
    <script src="<?= base_url('js/owl.carousel.min.js'); ?>"></script>
    <!-- Waypoints.min.js. -->
    <script src="<?= base_url('js/waypoints.min.js'); ?>"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="<?= base_url('js/main.js'); ?>"></script>
    <!-- preview image -->

</body>

</html>