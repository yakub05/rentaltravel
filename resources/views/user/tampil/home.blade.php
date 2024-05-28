@extends('user.layouts.user')
@section('content')
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Overland Trans</h1>
                    <h5 data-aos="fade-up" data-aos-delay="400">Beroperasi sejak tahun 2023, spesialis dalam layanan Jasa
                        Paket Tour dan Persewaan Mobil. Destinasi wisata yang disediakan meliputi wilayah Jawa Timur, paket
                        wisata Surakarta (Solo), Yogyakarta, dan Bali.</h5>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="#about"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Mulai</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="assets/home/img/hero-img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>

    <main id="main">
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row gx-0">
                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="content">
                            <h3>Apa itu Overland Trans?</h3>
                            <p>
                                Perusahaan yang bergerak dibidang jasa yang berada di Malang dan beroperasi sejak tahun 2023
                            </p>
                            <div class="text-center text-lg-start">
                                <a href="/tentang-kami"
                                    class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                    <span>Baca Lebih Lanjut</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="assets/home/img/about.jpg" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </section>
    </main>

    </section>
@endsection
