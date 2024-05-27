@extends('admin.layouts.admin')

@section('title', 'Edit Artikel')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0">Edit Artikel Travel</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('updateartikel', $artikel->id) }}" method="POST" enctype="multipart/form-data"
                            id="quickForm">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul Artikel</label>
                                <input type="text" class="form-control" id="judul" name="judul"
                                    value="{{ $artikel->judul }}">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi Artikel</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $artikel->deskripsi }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Gambar Artikel</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                                <img src="{{ Storage::url($artikel->foto) }}" alt="{{ $artikel->judul }}"
                                    class="img-fluid mt-3" style="max-width: 100px;">
                            </div>
                            <a href="{{ route('dataartikel') }}" class="btn btn-warning">Kembali</a>
                            <button type="submit" class="btn btn-success">Update Artikel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
