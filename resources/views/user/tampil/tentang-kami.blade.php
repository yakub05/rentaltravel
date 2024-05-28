@extends('user.layouts.user')

@section('content')
    <section class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li>Tentang Kami</li>
            </ol>
            <h2>Tentang Kami</h2>
        </div>
    </section>

    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="row gx-0">
                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                        <p>Overland Trans merupakan perusahaan yang berada di Malang dan beroperasi sejak tahun 2023, spesialis dalam layanan Jasa
                            Paket Tour dan Persewaan Mobil. Destinasi wisata yang disediakan meliputi wilayah Jawa Timur,
                            paket wisata Surakarta (Solo), Yogyakarta, dan Bali.</p>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="assets/home/img/about.jpg" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
@endsection
