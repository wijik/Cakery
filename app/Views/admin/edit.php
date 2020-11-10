<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1 mb-3">Dashboard</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="au-card recent-report">
                        <div class="au-card-inner">
                            <form action="/admin/update" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="avatarLama" id="avatarLama" value="<?= $admin['avatar']; ?>">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= (old('username')) ? old('username') : $admin['username'] ?>">
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('username'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= (old('email')) ? old('email') : $admin['email'] ?>">
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Avatar" class="form-control-label">Avatar</label><br>
                                    <div class="col-lg-6">
                                        <img src="/uploads/<?= $admin['avatar']; ?>" alt="" class="img-thumbnail img-preview">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="custom-file mb-3">
                                            <input type="file" class="custom-file-input <?= ($validation->hasError('avatar')) ? 'is-invalid' : ''; ?>" id="avatar" id="avatar" name="avatar" onchange="previewAvatar()" value="<?= (old('avatar')) ? old('avatar') : $admin['avatar'] ?>">
                                            <label class="custom-file-label" for="avatar">Pilih Gambar</label>
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('avatar'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>