<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Travel</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/home/img/favicon.png" rel="icon">
    <link href="../assets/home/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/home/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/home/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/home/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/home/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/home/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../assets/home/css/style.css" rel="stylesheet">
</head>

<body>
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <img src="../assets/home/img/logo.png" alt="">
                <span>Travel</span>
            </a>
            @include('user.layouts.components.navbar')
        </div>
    </header>

    <body class="g-sidenav-show  bg-gray-100">
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            @yield('content')
            {{-- @include('user.layouts.components.footer') --}}
        </main>

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="../assets/home/vendor/aos/aos.js"></script>
        <script src="../assets/home/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="../assets/home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/home/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="../assets/home/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="../assets/home/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="../assets/home/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="../assets/home/js/main.js"></script>
    </body>

</html>
