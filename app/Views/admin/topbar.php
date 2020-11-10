<?php
$session = session();
?>
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <!-- <form class="form-header" action="" method="POST">
                    <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form> -->
                <div class="header-button">
                    <div class="account-wrap" style="margin-left:900px;">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="/uploads/<?= $user['avatar']; ?>" alt="<?= session()->get('username'); ?>" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#"></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="/uploads/<?= $user['avatar']; ?>" alt="<?= session()->get('username'); ?>" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#"><?= session()->get('username'); ?></a>
                                        </h5>
                                        <!-- <span class="email"></span> -->
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="/admin/akun">
                                            <i class="zmdi zmdi-account"></i>Account</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="<?= site_url('auth/logout'); ?>">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>