<?php
$session = session();
?>
<header id="header" class="htc-header header--3 bg__white">
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                    <div class="logo">
                        <a href="index.html">
                            <img src="<?= base_url('images/logo/logo-cakery.png'); ?>" alt="logo">
                        </a>
                    </div>
                </div>
                <!-- Start MAinmenu Ares -->
                <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                    <nav class="mainmenu__nav hidden-xs hidden-sm">
                        <ul class="main__menu">
                            <li class="drop"><a href="/">Home</a></li>
                            <li class="drop"><a href="/artikel">Artikel</a>
                            </li>
                            <li class="drop"><a href="/barang">Shop</a>
                            </li>
                            <li class="drop"><a href="/cart/index/<?= $session->get('id'); ?>">Cart</a>
                            </li>
                            <!-- End Single Mega MEnu -->
                            <!-- Start Single Mega MEnu -->
                            <!-- End Single Mega MEnu -->
                        </ul>
                    </nav>
                    <div class="mobile-menu clearfix visible-xs visible-sm">
                        <nav id="mobile_dropdown">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="#">portfolio</a>
                                    <ul>
                                        <li><a href="portfolio-card-box-2.html">portfolio</a></li>
                                        <li><a href="single-portfolio.html">Single portfolio</a></li>
                                    </ul>
                                </li>
                                <li><a href="blog.html">blog</a>
                                    <ul>
                                        <li><a href="blog.html">blog 3 column</a></li>
                                        <li><a href="blog-details.html">Blog details</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">pages</a>
                                    <ul>
                                        <li><a href="about.html">about</a></li>
                                        <li><a href="customer-review.html">customer review</a></li>
                                        <li><a href="shop.html">shop</a></li>
                                        <li><a href="shop-sidebar.html">shop sidebar</a></li>
                                        <li><a href="product-details.html">product details</a></li>
                                        <li><a href="cart.html">cart</a></li>
                                        <li><a href="wishlist.html">wishlist</a></li>
                                        <li><a href="checkout.html">checkout</a></li>
                                        <li><a href="team.html">team</a></li>
                                        <li><a href="login-register.html">login & register</a></li>
                                    </ul>
                                </li>
                                <li><a href="/cart/view/<?= $session->get('id'); ?>">Cart</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- End MAinmenu Ares -->
                <div class="col-md-2 col-sm-4 col-xs-3">
                    <ul class="menu-extra">
                        <li class="drop"><a href="/user/<?= session()->get('id'); ?>"><?= session()->get('username'); ?></a></li>
                        <ul class="dropdown">
                            <li><a href="<?= site_url('auth/logout'); ?>">Logout</a></li>
                        </ul>
                        <li class="toggle__menu hidden-xs hidden-sm"><span class="ti-menu"></span></li>
                        <!-- <li class="drop"><a href="#"><?= session()->get('username'); ?></a>
                            <ul class="dropdown">
                                <li><a href="<?= site_url('auth/logout'); ?>">Logout</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
            </div>
            <div class="mobile-menu-area"></div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>