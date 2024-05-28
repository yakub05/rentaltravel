@extends('user.layouts.user')

@section('content')
    <section class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li><a href="{{ route('user.artikel') }}">Artikel</a></li>
                <li>Detail Artikel</li>
            </ol>
            <h2>Detail Artikel</h2>
        </div>
    </section>

    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-20 entries">
                    <article class="entry">
                        <div class="entry-img">
                            <img src="{{ Storage::url($artikel->foto) }}" alt="{{ $artikel->judul }}" class="img-fluid">
                        </div>
                        
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a>{{ $artikel->user->nama }}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a><time datetime="{{ $artikel->created_at }}">{{ $artikel->created_at->format('M d, Y') }}</time></a></li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>
                                {{ $artikel->deskripsi}}
                            </p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection