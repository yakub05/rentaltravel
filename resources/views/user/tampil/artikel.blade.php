@extends('user.layouts.user')

@section('content')
    <section class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li>Artikel</li>
            </ol>
            <h2>Artikel</h2>
        </div>
    </section>

    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-20 entries">
                    @foreach($artikel as $artikel)
                    <article class="entry">
                        <div class="entry-img">
                            <img src="{{ Storage::url($artikel->foto) }}" alt="{{ $artikel->judul }}" class="img-fluid">
                        </div>
                        <h2 class="entry-title">
                            <a href="{{ route('user.artikel.detail', $artikel->id) }}">{{ $artikel->judul }}</a>
                        </h2>
                        
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a>{{ $artikel->user->nama }}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a><time datetime="{{ $artikel->created_at }}">{{ $artikel->created_at->format('M d, Y') }}</time></a></li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>
                                {{ Str::limit($artikel->deskripsi, 150) }}
                            </p>
                            <div class="read-more">
                                <a href="{{ route('user.artikel.detail', $artikel->id) }}">Baca Lebih Lanjut</a>
                            </div>
                        </div>
                    </article>
                @endforeach

                    <div class="blog-pagination">
                        <ul class="justify-content-center">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection