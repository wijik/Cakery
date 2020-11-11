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
                        <h2 class="bradcaump-title">Product Details</h2>
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="/barang">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb-item active">Product Details</span>
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
                    <!-- End Small images -->
                    <div class="product__big__images">
                        <div class="portfolio-full-image tab-content">
                            <div role="tabpanel" class="tab-pane fade in active product-video-position" id="img-tab-1">
                                <?php
                                $bahanModel = new \App\Models\BahanModel();
                                $gambar = $bahanModel->find($cart['id_barang'])['gambar'];
                                $nama_kue = $bahanModel->find($cart['id_barang'])['nama_barang'];
                                $harga = $bahanModel->find($cart['id_barang'])['harga'];
                                $deskripsi = $bahanModel->find($cart['id_barang'])['deskripsi'];
                                ?>
                                <img src="/uploads/<?= $gambar; ?>" alt="full-image" style="height: auto;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 smt-30 xmt-30">
                <div class="htc__product__details__inner">
                    <div class="pro__detl__title">
                        <h2><?= $nama_kue; ?></h2>
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
                        <p><?= $deskripsi; ?></p>
                    </div>
                    <ul class="pro__dtl__prize">
                        <li><?= "Rp." . $harga; ?></li>
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
                    <!-- kuantiti -->
                    <form action="/cart/update/<?= $cart['id']; ?>" method="POST">
                        <input type="hidden" name="id" id="id" value="<?= $cart['id']; ?>">
                        <div class="product-action-wrap">
                            <div class="prodict-statas"><span>Quantity :</span></div>
                            <div class="product-quantity">
                                <div class="product-quantity">
                                    <div class="cart-plus-minus">
                                        <input type="number" name="jumlah" id="jumlah" class="cart-plus-minus-box" value="<?= $cart['jumlah']; ?>" min="1">
                                        <div class="dec qtybutton">-</div>
                                        <div class="inc qtybutton">+</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end kuantiti -->
                        <ul class="pro__dtl__btn">
                            <li class="buy__now__btn">
                                <input type="submit" name="submit" id="submit" class="btn-edit" value="Ubah">
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>