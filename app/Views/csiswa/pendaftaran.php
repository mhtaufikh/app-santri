<?= $this->extend('layout/siswatemplate') ?>
<?= $this->section('content') ?>
<!-- banner section start-->
<div class="banner_section layout_padding">
    <div class="container">
        <h1 class="best_taital">RA Daarul Muttaqien</h1>
        <div class="box_main">
        </div>
        <p class="there_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alterationThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
        <div class="bt_main">
            <div class="discover_bt"><a href="#">Discover More</a></div>
        </div>
    </div>
</div>
<!-- banner section end-->
<div class="container">
</div>
<div class="container mt-5">
    <div class="row">
        <div class="mb-3">
            <h2 class="text-center my-3">Formulir Pendaftaran Siswa</h2>
            <form action="/csiswa/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <label for="nama_siswa" class="form-label">Nama siswa</label>
                <input type="text" class="form-control <?= (validation_show_error('nama_siswa')) ? 'is-invalid' : ''; ?>" id="nama_siswa" name="nama_siswa" placeholder="Masukan Nama Siswa" value="<?= old('nama_siswa') ?>">
                <div class="invalid-feedback">
                    <?= validation_show_error('nama_siswa'); ?>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-2">
            <label for="jenis_kelamin" class="form-label">jenis kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                <option value="">---Jenis Kelamin---</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class=" mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="masukan alamat" value="<?= old('alamat') ?>">
        </div>
    </div>
    <div class="row">
        <div class=" mb-3">
            <label for="nama_ortu" class="form-label">Nama orang tua</label>
            <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" placeholder="masukan nama orang tua" value="<?= old('nama_ortu') ?>">
        </div>
    </div>
    <div class="row">
        <div class="mb-3">
            <label for="akta_kelahiran" class="form-label">Akta kelahiran</label>
            <label for="akta_kelahiran" class="form-label form-label2"></label>
            <div class="col-2sm-2 ">
                <img src="/img/default.png" class="img-thumbnail img-previewkk" width="10%">
            </div>
            <input type="file" class="form-control " id="akta_kelahiran" name="akta_kelahiran" onchange="">
            <div class="invalid-feedback">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="mb-3">
            <label for="kk" class="form-label">Kartu Keluarga</label>
            <label for="kk" class="form-label form-label2"></label>
            <div class="col-2sm-2 ">
                <img src="/img/default.png" class="img-thumbnail img-previewkk" width="10%">
            </div>
            <input type="file" class="form-control" id="kk" name="kk" onchange="">
            <div class="invalid-feedback">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <label for="foto" class="form-label form-label1"></label>
            <div class="col-2sm-2 ">
                <img src="/img/default.png" class="img-thumbnail img-preview" width="10%">
            </div>
            <input type="file" class="form-control" id="foto" name="foto" onchange="previewFoto()">
            <div class="invalid-feedback">
            </div>
        </div>

        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Tambah</button>

        </div>

    </div>
</div>
</div>



</div>
<!-- footer section start-->
<div class="footer_section layout_padding">
    <div class="container">
        <h1 class="subscribr_text">Subscribe Now</h1>
        <p class="lorem_text">There are many variations of passages of Lorem Ipsum available, but the majority have </p>
        <div class="box_main_2">
            <textarea type="" class="email_bt_2" placeholder="Enter Your Email" name=""></textarea>
        </div>
        <button class="subscribe_bt_2"><a href="#">Subscribe</a></button>
    </div>
</div>
<!-- footer section end-->
<!-- copyright section start-->
<div class="copyright_section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p class="copyright_text">Copyright 2020 All Right Reserved By.<a href="https://html.design"> Free html Templates</a></p>
            </div>
            <div class="col-md-6">
                <p class="cookies_text">Cookies, Privacy and Terms</p>
            </div>
        </div>
    </div>
</div>
<!-- copyright section end-->
<?= $this->endSection() ?>