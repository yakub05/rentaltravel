@extends('user.layouts.user')

@section('content')
    <section class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li>Detail Travel</li>
            </ol>
            <h2>Detail Travel</h2>
        </div>
    </section>

    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            <div class="swiper-slide">
                                <img src="{{ Storage::url($travel->foto) }}" alt="{{ $travel->nama_travel }}">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Informasi</h3>
                        <ul>
                            <li><strong>Nama Travel</strong>: {{ $travel->nama_travel }}</li>
                            <li><strong>Deskripsi</strong>: {{ $travel->deskripsi }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
