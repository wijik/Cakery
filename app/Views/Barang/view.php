<?= $this->extend('barang/layout'); ?>
<?= $this->section('body'); ?>
<?php
$session = session();
?>
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(<?= base_url('images/bg/2.jpg'); ?>) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Detail barang</h2>
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="/barang">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb-item active">Detail Barang</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="htc__product__details pt--120 pb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="product__details__container">
                    <!-- Start Small images -->
                    <!-- <ul class="product__small__images" role="tablist">
                        <li role="presentation" class="pot-small-img active">
                            <a href="#img-tab-1" role="tab" data-toggle="tab">
                                <img src="<?= base_url('images/product-details/small-img/1.jpg'); ?>" alt="small-image">
                            </a>
                        </li>
                        <li role="presentation" class="pot-small-img">
                            <a href="#img-tab-2" role="tab" data-toggle="tab">
                                <img src="<?= base_url('images/product-details/small-img/2.jpg'); ?>" alt="small-image">
                            </a>
                        </li>
                        <li role="presentation" class="pot-small-img hidden-xs">
                            <a href="#img-tab-3" role="tab" data-toggle="tab">
                                <img src="<?= base_url('images/product-details/small-img/3.jpg'); ?>" alt="small-image">
                            </a>
                        </li>
                        <li role="presentation" class="pot-small-img hidden-xs hidden-sm">
                            <a href="#img-tab-4" role="tab" data-toggle="tab">
                                <img src="<?= base_url('images/product-details/small-img/2.jpg'); ?>" alt="small-image">
                            </a>
                        </li>
                    </ul> -->
                    <!-- End Small images -->
                    <div class="product__big__images">
                        <div class="portfolio-full-image tab-content">
                            <div role="tabpanel" class="tab-pane fade in active product-video-position" id="img-tab-1">
                                <img src="/uploads/<?= $bahan['gambar']; ?>" alt="full-image" class="img-real">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 smt-30 xmt-30">
                <div class="htc__product__details__inner">
                    <div class="pro__detl__title">
                        <h2><?= $bahan['nama_barang']; ?></h2>
                    </div>
                    <!-- rating produk -->
                    <!-- <div class="pro__dtl__rating">
                        <ul class="pro__rating">
                            <li><span class="ti-star"></span></li>
                            <li><span class="ti-star"></span></li>
                            <li><span class="ti-star"></span></li>
                            <li><span class="ti-star"></span></li>
                            <li><span class="ti-star"></span></li>
                        </ul>
                        <span class="rat__qun">(Based on 0 Ratings)</span>
                    </div> -->
                    <!-- end rating produk -->
                    <div class="pro__details">
                        <p><?= $bahan['deskripsi']; ?></p>
                    </div>
                    <ul class="pro__dtl__prize">
                        <li><?= "Rp." . number_format($bahan['harga'], 0, 0, '.'); ?></li>
                    </ul>
                    <!-- pilih warna -->
                    <!-- <div class="pro__dtl__color">
                        <h2 class="title__5">Choose Colour</h2>
                        <ul class="pro__choose__color">
                            <li class="red"><a href="#"><i class="zmdi zmdi-circle"></i></a></li>
                            <li class="blue"><a href="#"><i class="zmdi zmdi-circle"></i></a></li>
                            <li class="perpal"><a href="#"><i class="zmdi zmdi-circle"></i></a></li>
                            <li class="yellow"><a href="#"><i class="zmdi zmdi-circle"></i></a></li>
                        </ul>
                    </div> -->
                    <!-- end pilih warna -->
                    <!-- pilih ukura -->
                    <!-- <div class="pro__dtl__size">
                        <h2 class="title__5">Size</h2>
                        <ul class="pro__choose__size">
                            <li><a href="#">xl</a></li>
                            <li><a href="#">m</a></li>
                            <li><a href="#">ml</a></li>
                            <li><a href="#">lm</a></li>
                            <li><a href="#">xxl</a></li>
                        </ul>
                    </div> -->
                    <!-- end pilih ukuran -->
                    <h3 style="font-size: 25px;margin-bottom:5px;">Stok:<?= $bahan['stok']; ?></h3>
                    <!-- kuantiti -->
                    <form action="/cart/create/<?= $bahan['id']; ?>" method="POST">
                        <div class="product-action-wrap">
                            <div class="prodict-statas"><span>Quantity :</span></div>
                            <div class="product-quantity">
                                <div class="product-quantity">
                                    <div class="cart-plus-minus">
                                        <input type="number" name="jumlah" id="jumlah" class="cart-plus-minus-box" value="1" min="1" max="<?= $bahan['stok']; ?>">
                                        <div class="dec qtybutton">-</div>
                                        <div class="inc qtybutton">+</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end kuantiti -->
                        <ul class="pro__dtl__btn">
                            <li class="buy__now__btn"><a href="/barang/beli/<?= $bahan['id']; ?>">Beli Sekarang</a></li>
                            <li class="buy__now__btn">
                                <!-- <a href="/cart/create/<?= $bahan['id']; ?>">Tambah</a> -->
                                <input type="submit" name="submit" value="Tambah ke keranjang" class="btn-cart" alt="Tambah ke keranjang">
                            </li>
                            <!-- <li><a href="#"><span class="ti-heart"></span></a></li> -->
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="htc__product__details__tab bg__white pb--120">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <ul class="product__deatils__tab mb--60" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#reviews" role="tab" data-toggle="tab">Komentar</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product__details__tab__content">
                    <!-- Start Single Content -->
                    <div role="tabpanel" id="reviews" class="product__tab__content fade in active">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success col-12" role="alert" style="margin-top: 10px;">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!$komentar) : ?>
                            <h3 style="margin-bottom: 50px;font-size:25px;">Belum ada yang berkomentar, jadilah yang pertama untuk berkomentar</h3>
                        <?php endif ?>
                        <?php foreach ($komentar as $k) : ?>
                            <?php
                            $modelUser = new \App\Models\UserModel();
                            $nama_user =  $modelUser->find($k['id_user'])['username'];
                            $waktu = $modelUser->find($k['id_user'])['created_date'];
                            $gambar = $modelUser->find($k['id_user'])['avatar'];
                            ?>
                            <div class="review__address__inner">
                                <!-- Start Single Review -->
                                <div class="pro__review">
                                    <div class="review__thumb">
                                        <img src="/uploads/<?= $gambar; ?>" alt="review images" class="cmnt-image ">
                                    </div>
                                    <div class="review__details">
                                        <div class="review__info">
                                            <h4><a href="#"><?= $nama_user; ?></a></h4>
                                        </div>
                                        <div class="review__date">
                                            <span><?= date("d M Y", strtotime($k['created_date'])); ?></span>
                                        </div>
                                        <p><?= $k['komentar']; ?></p>
                                        <?php if ($k['id_user'] == session()->get('id')) : ?>
                                            <form action="/komentar/deleteKmn/<?= $k['id']; ?>" method="POST" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="barang" value="<?= $bahan['id']; ?>">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn-delete-kmn-bhn" onclick="return confirm('apakah anda yakin ingin mengahpus komentar ini?');">Hapus komentar</button>
                                            </form>
                                        <?php endif ?>
                                    </div>
                                </div><br>
                            </div>
                        <?php endforeach ?>
                        <!-- Start RAting Area -->
                        <div class="rating__wrap">
                            <h2 class="rating-title">Tulis Komentar</h2>
                        </div>
                        <?php if (!session()->isLoggedIn) : ?>
                            <h3><a href="/auth/login">Login</a> terlebih dahulu untuk bisa membuat komentar</h3>
                        <?php endif ?>
                        <!-- End RAting Area -->
                        <?php if (session()->isLoggedIn) : ?>
                            <div class="review__box">
                                <form id="review-form" action="/komentar/create/<?= $bahan['id']; ?>" method="POST">
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
                    <!-- End Single Content -->
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<!-- <script src="<?= base_url('ckeditor5-build-classic/ckeditor.js'); ?>" type="text/javascript"></script>
<style>
    .ck-editor__editable_inline {
        min-height: 200px;

    }
</style>
<script>
    ClassicEditor
        .create(document.querySelector('#komentar'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script> -->
<?= $this->endSection(); ?>