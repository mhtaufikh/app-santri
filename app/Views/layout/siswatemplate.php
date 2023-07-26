<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>RA Daarul Muttaqien</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="/client/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="/client/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="/client/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="/client/images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="/client/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="/client/css/owl.carousel.min.css">
    <link rel="stylesoeet" href="/client/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

</head>

<body>
    <?= $this->include('layout/siswanavbar') ?>

    <?= $this->renderSection('content'); ?>


    <!-- Javascript files-->
    <script src="/client/js/jquery.min.js"></script>
    <script src="/client/js/popper.min.js"></script>
    <script src="/client/js/bootstrap.bundle.min.js"></script>
    <script src="/client/js/jquery-3.0.0.min.js"></script>
    <script src="/client/js/plugin.js"></script>
    <!-- sidebar -->
    <script src="/client/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/client/js/custom.js"></script>
    <!-- javascript -->
    <script src="/client/js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

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
    </script>



</body>

</html>