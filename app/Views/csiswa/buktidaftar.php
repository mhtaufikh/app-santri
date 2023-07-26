<?= $this->extend('layout/siswatemplate') ?>
<?= $this->section('content') ?>
<!-- banner section start-->
<!-- banner section end-->
<!-- marketing section start-->
<div class="marketing_section layout_padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="job_section">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <img src="/assets/img-siswa/<?= $siswa['foto'] ?>" width="30%" alt="">
                    <h1 class="">No Registrasi : <?= $siswa['no_regis'] ?></h1>
                    <h1 class="">Nama : <?= $siswa['nama_siswa'] ?></h1>
                    <h2 class="text-center">Bukti pendaftaran</h2>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <p>SELAMAT <?= $siswa['nama_siswa'] ?> TELAH TERDAFTAR SEBAGAI CALON SANTRI RA DAARUL MUTAQIEN</p>
                        </div>
                    </div>
                    <div class="apply_bt"><a href="#">Lihat</a></div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- <div class="image_1 padding_0"><img src="/client/images/img-1.png"></div> -->
            </div>
        </div>
    </div>
</div>
<!-- marketing section end-->

<?= $this->endSection() ?>