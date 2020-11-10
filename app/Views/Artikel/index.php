<?= $this->extend('barang/layout'); ?>
<?= $this->section('body'); ?>
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(<?= base_url('images/bg/2.jpg'); ?>) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Artikel</h2>
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="/">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb-item active">Artikel</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="htc__blog__area bg__white ptb--120">
    <div class="container">
        <div class="row">
            <div class="blog__wrap blog--page clearfix">
                <!-- <h5>Kategori:</h5><br>
                <a href="/article" class="btn-menu">Semua</a>
                
                <hr> -->
                <div class="category-search-area">
                    <form action="/artikel" method="POST">
                        <div class="input-group mb-3" style="width: 100%;">
                            <input type="text" class="form-control" placeholder="Masukan keyword pencarian..." name="keyword">
                            <button class="srch-btn" type="submit" name="submit"><i class="zmdi zmdi-search"></i></button>
                        </div>
                    </form>
                </div>
                <!-- Start Single Blog -->
                <?php foreach ($artikel as $a) : ?>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="blog foo" data-sr-id="1" style=" visibility: visible;  -webkit-transform: translateY(0) scale(1); opacity: 1;transform: translateY(0) scale(1); opacity: 1;-webkit-transition: -webkit-transform 0.8s cubic-bezier(0.6, 0.2, 0.1, 1) 0s, opacity 0.8s cubic-bezier(0.6, 0.2, 0.1, 1) 0s; transition: transform 0.8s cubic-bezier(0.6, 0.2, 0.1, 1) 0s, opacity 0.8s cubic-bezier(0.6, 0.2, 0.1, 1) 0s; ">
                            <div class="blog__inner">
                                <div class="blog__thumb">
                                    <a href="/artikel/<?= $a['slug']; ?>">
                                        <img src="/uploads/<?= $a['gambar']; ?>" alt="blog images">
                                    </a>
                                    <div class="blog__post__time">
                                        <div class="post__time--inner">
                                            <span class="date"><?= date("d", strtotime($a['created_date'])); ?></span>
                                            <span class="month"><?= date("M", strtotime($a['created_date'])); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $modelUser = new \App\Models\UserModel();
                                $by = $modelUser->find($a['by'])['username'];

                                ?>
                                <div class="blog__hover__info">
                                    <div class="blog__hover__action">
                                        <p class="blog__des"><a href="blog-details.html"><?= $a['judul']; ?></a></p>
                                        <ul class="bl__meta">
                                            <li>By :<a href="#"><?= $by; ?></a></li>
                                        </ul>
                                        <div class="blog__btn">
                                            <a class="read__more__btn" href="/artikel/<?= $a['slug']; ?>">Baca</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                <!-- End Single Blog -->
            </div>
        </div>
        <!-- Start Load More BTn -->
        <div class="row mt--60">
            <div class="col-md-12">
                <div class="htc__loadmore__btn">
                    <!-- <a href="#">load more</a> -->
                </div>
            </div>
        </div>
        <!-- End Load More BTn -->
    </div>
</div>
<?= $this->endSection(); ?>