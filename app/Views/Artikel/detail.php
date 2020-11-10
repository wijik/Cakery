<?= $this->extend('barang/layout'); ?>
<?= $this->section('body'); ?>
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(<?= base_url('images/bg/2.jpg'); ?>) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title"><?= $artikel['judul']; ?></h2>
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="/">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb-item active"><?= $artikel['judul']; ?></span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="blog-details-wrap ptb--120 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                <div class="blog-details-left-sidebar">
                    <div class="blog-details-top">
                        <!--Start Blog Thumb -->
                        <div class="blog-details-thumb-wrap">
                            <div class="blog-details-thumb">
                                <img src="/uploads/<?= $artikel['gambar']; ?>" alt="blog images">
                            </div>
                            <div class="upcoming-date">
                                <?= date("d", strtotime($artikel['created_date'])); ?><span class="upc-mth"><?= date("M", strtotime($artikel['created_date'])); ?>,<?= date("Y", strtotime($artikel['created_date'])); ?></span>
                            </div>
                        </div>
                        <!--End Blog Thumb -->
                        <?php
                        $modelUser = new \App\Models\UserModel();
                        $by = $modelUser->find($artikel['by'])['username'];
                        ?>
                        <h2><?= $artikel['judul']; ?></h2>
                        <div class="blog-admin-and-comment">
                            <p>BY : <a href="#"><?= $by; ?></a></p>
                            <p class="separator">|</p>
                            <p>3 COMMENTS</p>
                        </div>
                        <!-- Start Blog Pra -->
                        <div class="blog-details-pra">
                            <p><?= $artikel['isi']; ?></p>
                        </div>
                        <!-- End Blog Pra -->
                        <!-- Start Blog Tags -->
                        <!-- End Blog Tags -->
                        <!-- Start Blog Comment Area -->
                        <div class="our-blog-comment mt--20">
                            <div class="blog-comment-inner">
                                <h2 class="section-title-2">Komen</h2>
                                <!-- Start Single Comment -->
                                <?php if (!$komentar) : ?>
                                    <h3 style="margin-top: 10px;">Belum ada Berkomentar, jadilah yang pertama untuk berkomentar</h3>
                                <?php endif ?>
                                <?php foreach ($komentar as $k) : ?>
                                    <?php
                                    $modelUser = new \App\Models\UserModel();
                                    $nama_user =  $modelUser->find($k['id_user'])['username'];
                                    $waktu = $modelUser->find($k['id_user'])['created_date'];
                                    $gambar = $modelUser->find($k['id_user'])['avatar'];
                                    ?>
                                    <div class="single-blog-comment">
                                        <div class="blog-comment-thumb">
                                            <img src="/uploads/<?= $gambar; ?>" alt="comment images">
                                        </div>
                                        <div class="blog-comment-details">
                                            <div class="review__info">
                                                <h4><a href="#"><?= $nama_user; ?></a></h4>
                                            </div>
                                            <div class="review__date">
                                                <span><?= date("d M Y", strtotime($waktu)); ?></span>
                                            </div>
                                            <p style="max-width: 100%;"><?= $k['komentar']; ?></p>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                                <!-- End Single Comment -->
                            </div>
                        </div>
                        <!-- End Blog Comment Area -->
                        <!-- Start Reply Form -->
                        <div class="our-reply-form-area mt--20">
                            <h2 class="section-title-2">TINGGALKAN KOMENTAR</h2>
                            <?php if (!session()->isLoggedIn) : ?>
                                <h3 style="margin-top: 10px;"><a href="/auth/login">Login</a> terlebih dahulu untuk bisa berkomentar</h3>
                            <?php endif ?>
                            <?php if (session()->isLoggedIn) : ?>
                                <div class="reply-form-inner mt--40">
                                    <form id="review-form" action="/komentar/komen/<?= $artikel['id']; ?>" method="POST">
                                        <div class="single-review-form">
                                            <div class="review-box message">
                                                <textarea placeholder="Tulis Komentar" id="komentar" name="komentar"></textarea>
                                            </div>
                                        </div>
                                        <div class="review-btn">
                                            <!-- <a class="fv-btn" href="#">submit review</a> -->
                                            <input type="submit" name="submit" class="btn-cmnt" style="width: 100%;" value="Kirim">
                                        </div>
                                    </form>
                                </div>
                            <?php endif ?>
                        </div>
                        <!-- End Reply Form -->
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 smt-30 xmt-40">
                <div class="blod-details-right-sidebar">
                    <div class="category-search-area">
                        <form action="/artikel/index" method="POST">
                            <input placeholder="Cari..." type="text" name="keyword">
                            <button class="srch-btn" type="submit" name="submit"><i class="zmdi zmdi-search"></i></button>
                        </form>
                    </div>
                    <!-- Start Category Area -->
                    <!-- End Category Area -->
                    <!-- Start Letaest Blog Area -->
                    <div class="our-recent-post mt--60">
                        <h2 class="section-title-2">LATEST POST</h2>
                        <div class="our-recent-post-wrap">
                            <?php $no = 0; ?>
                            <?php foreach ($latest as $l) : ?>
                                <!-- Start Single Post -->
                                <div class="single-recent-post">
                                    <div class="recent-thumb">
                                        <a href="/artikel/<?= $latest[$no]['slug']; ?>"><img src="/uploads/<?= $latest[$no]['gambar']; ?>" alt="post images"></a>
                                    </div>
                                    <div class="recent-details">
                                        <div class="recent-post-dtl">
                                            <h6><a href="/artikel/<?= $latest[$no]['slug']; ?>"><?= $latest[$no]['judul'] ?></a></h6>
                                            <!-- <p><?= substr($latest[$no]['isi'], 0, 30); ?></p> -->
                                        </div>
                                        <div class="recent-post-time">
                                            <p><?= date("d M Y", strtotime($latest[$no]['created_date'])); ?></p>
                                            <p class="separator">|</p>
                                            <p><?= date("H A", strtotime($latest[$no]['created_date'])); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php $no++ ?>
                            <?php endforeach ?>
                            <!-- End Single Post -->
                        </div>
                    </div>
                    <!-- End Letaest Blog Area -->
                    <!-- Start Tag -->
                    <!-- End Tag -->
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>