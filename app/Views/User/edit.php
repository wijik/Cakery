<?= $this->extend('barang/layout'); ?>
<?= $this->section('body'); ?>
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(<?= base_url('images/bg/2.jpg'); ?>) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title"><?= $user['username']; ?></h2>
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="/">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb-item active">User</span>
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
            <form action="/user/update/<?= $user['id']; ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="<?= $user['id']; ?>">
                <input type="hidden" name="avatarLama" value="<?= $user['avatar']; ?>">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= (old('username')) ? old('username') : $user['username'] ?>">
                    <div class=" invalid-feedback">
                        <?= $validation->getError('username'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= (old('email')) ? old('email') : $user['email'] ?>">
                    <div class=" invalid-feedback">
                        <?= $validation->getError('email'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Avatar" class="form-control-label">Avatar</label><br>
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="/uploads/<?= $user['avatar']; ?>" alt="" class="gambar" style="height: 300px; width:300px">
                        </div>
                        <div class="col-lg-8">
                            <div class="custom-file mb-3">
                                <input type="file" class="form-control <?= ($validation->hasError('avatar')) ? 'is-invalid' : ''; ?>" id="avatar" id="avatar" name="avatar" onchange="previewAvatar()" value="<?= (old('avatar')) ? old('avatar') : $user['avatar'] ?>">
                                <label class="custom-file-label" for="avatar">Pilih Gambar</label>
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('avatar'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Nama Lengkap</label>
                    <input type="text" class="form-control <?= ($validation->hasError('NamaLengkap')) ? 'is-invalid' : ''; ?>" id="NamaLengkap" name="NamaLengkap" value="<?= (old('NamaLengkap')) ? old('NamaLengkap') : $customer['NamaLengkap'] ?>">
                    <div class=" invalid-feedback">
                        <?= $validation->getError('NamaLengkap'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">No. Telepon</label>
                    <input type="text" class="form-control <?= ($validation->hasError('telepon')) ? 'is-invalid' : ''; ?>" id="telepon" name="telepon" value="<?= (old('telepon')) ? old('telepon') : $customer['Telepon'] ?>">
                    <div class=" invalid-feedback">
                        <?= $validation->getError('telepon'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Jenis Kelamin</label><br>
                    <input class="form-check-input" type="radio" name="JenisKelamin" id="Jenis_Kelamin" value="Laki-laki" <?= $retVal = ($customer['JenisKelamin'] == "Laki-laki") ? "checked = 'checked'" : ""; ?>>
                    <label class="form-check-label" for="exampleRadios1">
                        Laki Laki
                    </label>
                    <input class="form-check-input" type="radio" name="JenisKelamin" id="Jenis_Kelamin" value="Perempuan" <?= $retVal = ($customer['JenisKelamin'] == "Perempuan") ? "checked = 'checked'" : ""; ?>>
                    <label class="form-check-label" for="exampleRadios1">
                        Perempuan
                    </label>
                </div>
                <div class="form-group">
                    <label for="email">Alamat</label>
                    <textarea name="alamat" id="alamat" placeholder="Alamat" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>"><?= (old('alamat')) ? old('alamat') : $customer['Alamat'] ?></textarea>
                    <div class=" invalid-feedback">
                        <?= $validation->getError('Alamat'); ?>
                    </div>
                </div>
                <button type="submit" class="btn-edt-prfl">Ubah</button>
            </form>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>