@extends('user.layouts.user')
@section('content')
    <div class="container-fluid py-4">
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>Travel</h2>
                    <p>Travel Malang</p>
                </header>

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach($travel as $travel)
                        <div class="col-lg-4 col-md-6 portfolio-item">
                            <div class="portfolio-wrap">
                                <img src="{{ Storage::url($travel->foto) }}" class="img-fluid" alt="{{ $travel->judul }}">
                                <div class="portfolio-info">
                                    <h4>{{ $travel->judul }}</h4>
                                    <div class="portfolio-links">
                                        <a href="{{ Storage::url($travel->foto) }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="{{ $travel->nama_travel }}"><i class="bi bi-plus"></i></a>
                                        <a href="{{ route('travel.detail', $travel->id) }}" title="More Details"><i class="bi bi-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection