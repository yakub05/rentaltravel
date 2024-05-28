@extends('user.layouts.user')

@section('content')
    <section class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li>Detail Portfolio</li>
            </ol>
            <h2>Detail Portfolio</h2>
        </div>
    </section>

    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            <div class="swiper-slide">
                                <img src="{{ Storage::url($konten->foto) }}" alt="{{ $konten->judul }}">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Informasi</h3>
                        <ul>
                            <li><strong>Judul</strong>: {{ $konten->judul }}</li>
                            <li><strong>Deskripsi</strong>: {{ $konten->deskripsi }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
