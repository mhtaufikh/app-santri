<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard </title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="/css/styles.css" rel="stylesheet" />
    <link href="/css/styles1.css" rel="stylesheet" />
    <link rel="icon" href="/assets/img/ra.jpg" type="image/gif">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

    <?= $this->include('layout/navbar') ?>

    <?= $this->renderSection('content'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="/assets/demo/chart-area-demo.js"></script>
    <script src="/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="/js/datatables-simple-demo.js"></script>
    <script>
        function previewFoto() {
            const foto = document.querySelector('#foto');
            const fotoLabel = document.querySelector('.form-label1');
            const imgPreview = document.querySelector('.img-preview');


            fotoLabel.textContent = foto.files[0].name;

            const fileFoto = new FileReader();
            fileFoto.readAsDataURL(foto.files[0]);

            fileFoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function previewkk() {
            const kk = document.querySelector('#kk');
            const kkLabel = document.querySelector('.form-label2');
            const imgPreviewkk = document.querySelector('.img-previewkk');


            kkLabel.textContent = kk.files[0].name;

            const filekk = new FileReader();
            filekk.readAsDataURL(kk.files[0]);

            filekk.onload = function(e) {
                imgPreviewkk.src = e.target.result;
            }
        }

        function previewakta() {
            const akta = document.querySelector('#akta_kelahiran');
            const aktaLabel = document.querySelector('.form-label3');
            const imgPreviewakta = document.querySelector('.img-previewakta');


            aktaLabel.textContent = akta.files[0].name;

            const fileakta = new FileReader();
            fileakta.readAsDataURL(akta.files[0]);

            fileakta.onload = function(e) {
                imgPreviewakta.src = e.target.result;
            }
        }
    </script>

</body>

</html>