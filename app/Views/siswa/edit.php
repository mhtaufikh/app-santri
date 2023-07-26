<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container">

    <div class="row">
        <div class="col-8">
            <h2 class="text-center my-3">Ubah data siswa</h2>
            <form action="/siswa/update/<?= $siswa['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="no_regis" value="<?= $siswa['no_regis'] ?>">
                <input type="hidden" name="fotoLama" value="<?= $siswa['foto'] ?>">
                <input type="hidden" name="aktaLama" value="<?= $siswa['akta_kelahiran'] ?>">
                <input type="hidden" name="kkLama" value="<?= $siswa['kk'] ?>">

                <div class="mb-3 form-group">
                    <label for="nama_siswa" class="form-label">Nama siswa</label>
                    <input type="text" class="form-control   " id="nama_siswa" name="nama_siswa" value="<?= (old('nama_siswa')) ? old('nama_siswa') : $siswa['nama_siswa'] ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">masukan jenis kelamin</label>
                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= (old('jenis_kelamin')) ? old('jenis_kelamin') : $siswa['jenis_kelamin'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= (old('alamat')) ? old('alamat') : $siswa['alamat'] ?>">
                </div>
                <div class="mb-3">
                    <label for="nama_ortu" class="form-label">nama orang tua</label>
                    <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" value="<?= (old('nama_ortu')) ? old('nama_ortu') : $siswa['nama_ortu'] ?>">
                </div>
                <div class="mb-3">
                    <label for="akta_kelahiran" class="form-label3">Foto<small>(Masukan akta_kelahiran calon siswa)</small></label>
                    <div class="col-2sm-2">
                        <img src="/assets/img-siswa/akta/<?= $siswa['akta_kelahiran'] ?>" class="img-thumbnail img-previewakta" width="20%">
                    </div>
                    <input type="file" class="form-control <?= (validation_show_error('akta_kelahiran')) ? 'is-invalid' : ''; ?>" id="akta_kelahiran" name="akta_kelahiran" onchange="previewakta()" value="<?= $siswa['akta_kelahiran'] ?>">
                    <div class="invalid-feedback">
                        <?= validation_show_error('akta_kelahiran'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="kk" class="form-label2">Foto<small>(Masukan kk calon siswa)</small></label>
                    <div class="col-2sm-2">
                        <img src="/assets/img-siswa/kk/<?= $siswa['kk'] ?>" class="img-thumbnail img-previewkk" width="20%">
                    </div>
                    <input type="file" class="form-control <?= (validation_show_error('kk')) ? 'is-invalid' : ''; ?>" id="kk" name="kk" onchange="previewkk()">
                    <div class="invalid-feedback">
                        <?= validation_show_error('kk'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto<small>(Masukan foto calon siswa)</small></label>
                    <div class="col-2sm-2">
                        <img src="/assets/img-siswa/<?= $siswa['foto'] ?>" class="img-thumbnail img-preview" width="20%">
                    </div>
                    <input type="file" class="form-control <?= (validation_show_error('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="previewImg()">
                    <div class="invalid-feedback">
                        <?= validation_show_error('foto'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>