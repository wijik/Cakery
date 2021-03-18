<?= $this->extend('barang/layout'); ?>
<?= $this->section('body'); ?>
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(<?= base_url('images/bg/2.jpg'); ?>) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Data User</h2>
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="/">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb-item active">Data User</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="single-portfolio-area bg__white ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="single-portfolio-img">
                    <img src="/uploads/<?= $user['avatar']; ?>" alt="full-image" class="responsive">
                </div>
            </div>
            <div class="col-md-5">
                <div class="portfolio-description mrg-sm">
                    <h2><?= $user['username']; ?></h2>
                    <p></p>
                    <p></p>
                    <div class="portfolio-info">
                        <ul>
                            <li><span>Nama :</span><?= $customer['NamaLengkap']; ?></li>
                            <li><span>Alamat :</span><?= $customer['Alamat']; ?></li>
                            <li><span>No Telefon :</span><?= $customer['Telepon']; ?></li>
                            <li><span>Jenis Kelamin :</span><?= $customer['JenisKelamin']; ?></li>
                            <li><span>Email :</span><?= $user['email']; ?></li>
                            <li><span>Saldo :</span><?= "Rp." . number_format($uang[0]['jumlah'], 0, 0, '.'); ?></li>
                            <li><span>Dibuat Tanggal:</span><?= date("d M Y", strtotime($user['created_date'])); ?></li>
                        </ul>
                    </div>
                    <div class="portfolio-social">
                        <ul>
                            <li><a href="/user/edit">Ubah Data</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>