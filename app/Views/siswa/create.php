<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container">

    <div class="row">
        <div class="col-8">
            <h2 class="text-center my-3">Menambahkan data siswa</h2>
            <form action="/siswa/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="mb-3 form-group"></div>
                <label for="nama_siswa" class="form-label">Nama siswa</label>
                <input type="text" class="form-control <?= (validation_show_error('nama_siswa')) ? 'is-invalid' : ''; ?>" id="nama_siswa" name="nama_siswa" placeholder="Masukan Nama Siswa" value="<?= old('nama_siswa') ?>">
                <div class="invalid-feedback">
                    <?= validation_show_error('nama_siswa'); ?>
                </div>
        </div>
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">jenis kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                <option value="">---Jenis Kelamin---</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class=" mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="masukan alamat" value="<?= old('alamat') ?>">
        </div>
        <div class=" mb-3">
            <label for="nama_ortu" class="form-label">Nama orang tua</label>
            <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" placeholder="masukan nama orang tua" value="<?= old('nama_ortu') ?>">
        </div>
        <div class="mb-3">
            <label for="akta_kelahiran" class="form-label">Akta Kelahiran</label>
            <label for="akta_kelahiran" class="form-label form-label3"></label>
            <div class="col-2sm-2 ">
                <img src="/img/default.png" class="img-thumbnail img-previewakta" width="10%">
            </div>
            <input type="file" class="form-control <?= (validation_show_error('akta_kelahiran')) ? 'is-invalid' : ''; ?>" id="akta_kelahiran" name="akta_kelahiran" onchange="previewakta()">
            <div class="invalid-feedback">
                <?= validation_show_error('akta_kelahiran'); ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="kk" class="form-label">Kartu Keluarga</label>
            <label for="kk" class="form-label form-label2"></label>
            <div class="col-2sm-2 ">
                <img src="/img/default.png" class="img-thumbnail img-previewkk" width="10%">
            </div>
            <input type="file" class="form-control <?= (validation_show_error('kk')) ? 'is-invalid' : ''; ?>" id="kk" name="kk" onchange="previewkk()">
            <div class="invalid-feedback">
                <?= validation_show_error('kk'); ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <label for="foto" class="form-label form-label1"></label>
            <div class="col-2sm-2 ">
                <img src="/img/default.png" class="img-thumbnail img-preview" width="10%">
            </div>
            <input type="file" class="form-control <?= (validation_show_error('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="previewFoto()">
            <div class="invalid-feedback">
                <?= validation_show_error('foto'); ?>
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Tambah</button>
    </div>
</div>
</form>
</div>
</div>
</div>
<?= $this->endSection() ?>