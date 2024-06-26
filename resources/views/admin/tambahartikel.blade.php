@extends('admin.layouts.admin')

@section('title', 'Dashboard Tambah Data Admin')

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
                            <h5 class="mb-0">Tambah Artikel Travel</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tambahartikel') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="id_user" class="form-control-label">Nama</label>
                                        <input type="text" id="id_user" class="form-control"
                                            value="{{ auth()->user()->nama }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="judul">Judul Artikel</label>
                                        <input type="judul" class="form-control" id="judul" name="judul"
                                            placeholder="Masukkan Judul Artikel" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input">Gambar : </label><br>
                                        <input type="file" id="foto" name="foto" accept="image/*" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="deskripsi" class="form-control-label">Deskripsi Artikel</label>
                                        <textarea class="form-control" id="summernote" name="deskripsi" rows="4" placeholder="Masukkan Deskripsi Artikel"
                                            required></textarea>
                                    </div>
                                </div>
                            </div>
                            <a href="/dataartikel" class="btn btn-warning">Kembali</a>
                            <button type="submit" class="btn btn-success">Tambah Artikel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
