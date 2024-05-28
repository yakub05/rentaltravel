@extends('user.layouts.user')

@section('content')
    <div class="container-fluid py-4 mt-5">
        <div class="container mt-4">
            <div class="row">
                <h2 class="mb-4 text-center">Testimoni</h2>
                @foreach ($testimoni as $testimoni)
                    <div class="col-md-4 mb-3">
                        <div class="card testimonial-card">
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p class="testimonial-text">“{{ $testimoni->komentar }}”</p>
                                </blockquote>
                                <footer class="blockquote-footer mt-3">
                                    <span class="testimonial-author">{{ $testimoni->user->nama }}</span>
                                </footer>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <style>
        .testimonial-card {
            background-color: #fff;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .testimonial-text {
            font-size: 16px;
            font-style: italic;
            color: #333;
        }

        .testimonial-author {
            font-size: 14px;
            font-weight: bold;
            color: #555;
        }
    </style>
@endsection
