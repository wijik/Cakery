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
                        <h2 class="bradcaump-title">Checkout</h2>
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb-item active">Checkout</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="our-checkout-area ptb--120 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8">
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-danger col-12" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="ckeckout-left-sidebar">
                    <!-- Start Checkbox Area -->
                    <div class="checkout-form">
                        <h2 class="section-title-3">Pengiriman</h2>
                        <div class="checkout-form-inner">
                            <div class="single-checkout-box select-option mt--40" style="margin-bottom:-20px;">
                                <label for="provinsi">Provinsi</label>
                                <select id="provinsi" style="width: 100%;">
                                    <option>Pilih Provnisi</option>
                                    <?php foreach ($provinsi as $p) : ?>
                                        <option value="<?= $p->province_id; ?>"><?= $p->province; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="single-checkout-box select-option mt--40" margin-bottom:-20px;>
                                <label for="provinsi">Kabupaten/Kota</label>
                                <select id="kabupaten" style="width: 100%;">
                                    <option>Pilih kabupaten/Kota</option>
                                </select>
                            </div>
                            <div class="single-checkout-box select-option mt--40" margin-bottom:-20px;>
                                <label for="provinsi">Service</label>
                                <select id="service" style="width: 100%;">
                                    <option>Pilih Service</option>
                                </select>
                            </div><br>
                            <div class="single-checkout-box">
                                <strong>Estimasi : <span id="estimasi"></span></strong>
                            </div><br>
                            <form action="/cart/beli" method="POST">
                                <input type="hidden" name="id_pembeli" id="id_pembeli" value="<?= session()->get('id'); ?>">
                                <div class="single-checkout-box">
                                    <label for="ongkir">Ongkir</label><br>
                                    <input type="text" placeholder="Ongkir" name="ongkir" id="ongkir" readonly style="width: 100%;">
                                </div>
                                <div class="single-checkout-box">
                                    <label for="total_harga">Total Harga</label><br>
                                    <input type="text" placeholder="Total harga" name="total_harga" id="total_harga" readonly style="width: 100%;">
                                </div>
                                <div class="single-checkout-box">
                                    <textarea name="alamat" id="alamat" placeholder="Alamat"></textarea>
                                </div>
                                <div class="single-checkout-box">
                                    <input type="submit" name="submit" id="submit" value="Beli" class="btn-dana" style="width: 100%;">
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- End Checkbox Area -->
                    <!-- Start Payment Box -->
                    <!-- <div class="payment-form">
                        <h2 class="section-title-3">payment details</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur kgjhyt</p>
                        <div class="payment-form-inner">
                            <div class="single-checkout-box">
                                <input type="text" placeholder="Name on Card*">
                                <input type="text" placeholder="Card Number*">
                            </div>
                            <div class="single-checkout-box select-option">
                                <select>
                                    <option>Date*</option>
                                    <option>Date</option>
                                    <option>Date</option>
                                    <option>Date</option>
                                    <option>Date</option>
                                </select>
                                <input type="text" placeholder="Security Code*">
                            </div>
                        </div>
                    </div> -->
                    <!-- End Payment Box -->
                    <!-- Start Payment Way -->
                    <!-- <div class="our-payment-sestem">
                        <h2 class="section-title-3">We Accept :</h2>
                        <ul class="payment-menu">
                            <li><a href="#"><img src="images/payment/1.jpg" alt="payment-img"></a></li>
                            <li><a href="#"><img src="images/payment/2.jpg" alt="payment-img"></a></li>
                            <li><a href="#"><img src="images/payment/3.jpg" alt="payment-img"></a></li>
                            <li><a href="#"><img src="images/payment/4.jpg" alt="payment-img"></a></li>
                            <li><a href="#"><img src="images/payment/5.jpg" alt="payment-img"></a></li>
                        </ul>
                        <div class="checkout-btn">
                            <a class="ts-btn btn-light btn-large hover-theme" href="#">CONFIRM &amp; BUY NOW</a>
                        </div>
                    </div> -->
                    <!-- End Payment Way -->
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="checkout-right-sidebar">
                    <div class="our-important-note">
                        <h2 class="section-title-3" style="margin-bottom:10px;"><?= $model['nama_barang']; ?></h2>
                        <img src="/uploads/<?= $model['gambar']; ?>" alt="">
                        <p class="note-desc">Harga:<?= "Rp."  . number_format($model['harga'], 0, 0, '.'); ?><br>
                            <?= "Stok barang: " . $model['stok']; ?><br>
                            <?= $model['deskripsi']; ?>
                        </p>
                    </div>
                    <div class="puick-contact-area mt--60">
                        <h2 class="section-title-3">Kontak kami</h2>
                        <a href="phone:+8801722889963">+62 888 0202 0831 </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
<?= $this->Section('script'); ?>
<script>
    $('document').ready(function() {
        var jumlah_pembelian = 1;
        var harga = <?= $model['harga']; ?>;
        var ongkir = 0;

        $("#provinsi").on('change', function() {
            $("#kabupaten").empty();
            var id_province = $(this).val();
            console.log(id_province);
            $.ajax({
                url: "<?= site_url('barang/getCity'); ?>",
                type: 'GET',
                data: {
                    'id_province': id_province,
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var results = data["rajaongkir"]["results"];
                    for (var i = 0; i < results.length; i++) {
                        $("#kabupaten").append($('<option>', {
                            value: results[i]["city_id"],
                            text: results[i]["city_name"]
                        }));
                    }
                }
            })
        });

        $("#kabupaten").on('change', function() {
            $("#service").empty();
            var id_city = $(this).val();
            $.ajax({
                url: "<?= site_url('barang/getCost'); ?>",
                type: 'GET',
                data: {
                    'origin': 154,
                    'destination': id_city,
                    'weight': 1000,
                    'courier': 'jne'
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var results = data["rajaongkir"]["results"][0]["costs"];
                    for (var i = 0; i < results.length; i++) {
                        var text = results[i]["description"] + "(" + results[i]["service"] + ")";
                        $("#service").append($('<option>', {
                            value: results[i]["cost"][0]["value"],
                            text: text,
                            etd: results[i]["cost"][0]["etd"]
                        }))
                    }
                },
            });
        });

        $("#service").on('change', function() {
            var estimasi = $('option:selected', this).attr('etd');
            ongkir = parseInt($(this).val());
            $("#ongkir").val(ongkir);
            $("#estimasi").html(estimasi + "Hari");
            var total_harga = (jumlah_pembelian * harga) + ongkir;
            $("#total_harga").val(total_harga);
        });

        $("#jumlah").on('change', function() {
            jumlah_pembelian = $("#jumlah").val();
            var total_harga = (jumlah_pembelian * harga) + ongkir;
            $("#total_harga").val(total_harga);
        });
    });
</script>
<?= $this->endSection(); ?>