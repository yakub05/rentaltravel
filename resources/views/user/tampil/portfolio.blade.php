@extends('user.layouts.user')
@section('content')
    <div class="container-fluid py-4">
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>Portfolio</h2>
                    <p>Travel Malang</p>
                </header>

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach($konten as $konten)
                        <div class="col-lg-4 col-md-6 portfolio-item">
                            <div class="portfolio-wrap">
                                <div class="image-wrapper">
                                    <img src="{{ Storage::url($konten->foto) }}" class="img-fluid" alt="{{ $konten->judul }}">
                                </div>
                                <div class="portfolio-info">
                                    <h4>{{ $konten->judul }}</h4>
                                    <div class="portfolio-links">
                                        <a href="{{ Storage::url($konten->foto) }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="{{ $konten->judul }}"><i class="bi bi-plus"></i></a>
                                        <a href="{{ route('portfolio.detail', $konten->id) }}" title="More Details"><i class="bi bi-link"></i></a>
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
