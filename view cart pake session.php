<?= $this->extend('barang/layout'); ?>
<?= $this->section('body'); ?>
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(<?= base_url('images/bg/2.jpg'); ?>) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Cart</h2>
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb-item active">Cart</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cart-main-area ptb--120 bg__white">
    <div class="container">
        <div class="row">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success col-12" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <form action="cart/update">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Gambar</th>
                                        <th class="product-name">Produk</th>
                                        <th class="product-price">Harga</th>
                                        <th class="product-quantity">Jumlah</th>
                                        <th class="product-remove" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($items) == 0) : ?>
                                        <td colspan="6" style="font-size: 30px; margin-bottom:5px;">Kamu belum memasukan barang ke keranjang, <a href="/barang" class="buttons-cart">Beli</a></td>
                                    <?php endif ?>
                                    <?php if (count($items) != 0) : ?>
                                        <?php foreach ($items as $key => $item) : ?>
                                            <tr id="cart-row">
                                                <td class="product-thumbnail"><a href="#"><img src="/uploads/<?= $item['photo']; ?>" alt=""></a></td>
                                                <td class="product-name"><?= $item['name']; ?></td>
                                                <td class="product-price"><span class="amount"><?= "Rp." . number_format($item['price'], 0, 0, '.'); ?></span></td>
                                                <td class="product-quantity">
                                                    <input type="number" name="quantity[]" min="1" value="<?= $item['quantity']; ?>">
                                                </td>
                                                <td class="product-remove">
                                                    <button type="submit" class="btn-edit"><span class="ti-pencil"></span></button>
                                                </td>
                                                <td class="product-remove">
                                                    <a href="cart/delete/<?= $item['id']; ?>" class="btn-edit" onclick="return confirm('Apakah Anda yakin ingin menghapus <?= $item['name']; ?> dari keranjang belanja?')">X</a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            <div class="buttons-cart">
                                <a href="/barang">Lanjut Belanja</a>
                            </div>
                            <?php if (count($items) != 0) : ?>
                                <section class="our-checkout-area ptb--120 bg__white">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            <?php endif ?>
                        </div>
                        <div class="col-md-4 col-sm-5 col-xs-12">
                            <div class="cart_totals">
                                <h2>Total keranjang</h2><br>
                                <table>
                                    <tbody>
                                        <tr class="order-total">
                                            <th>Sub Total</th>
                                            <td>
                                                <strong><span class="amount"><?= "Rp." . number_format($total, 0, 0, '.'); ?></span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="wc-proceed-to-checkout">
                                    <!-- <a href="/cart/beli">Proceed to Checkout</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $('document').ready(function() {
        var jumlah_pembelian = 1;
        var harga = <?= $total; ?>;
        var ongkir = 0;

        $("#provinsi").on('change', function() {
            $("#kabupaten").empty();
            var id_province = $(this).val();
            $.ajax({
                url: "<?= site_url('cart/getCity'); ?>",
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
                url: "<?= site_url('cart/getCost'); ?>",
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