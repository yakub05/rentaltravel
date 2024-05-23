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
                            <h5 class="mb-0">Tambah Konten Travel</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tambahkonten') }}" enctype="multipart/form-data">
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
                                        <label for="judul">Judul Konten</label>
                                        <input type="judul" class="form-control" id="judul" name="judul"
                                            placeholder="Masukkan Judul Konten" required>
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
                                        <label for="deskripsi" class="form-control-label">Deskripsi Konten</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Masukkan Deskripsi Konten"
                                            required></textarea>
                                    </div>
                                </div>
                            </div>
                            <a href="/datakonten" class="btn btn-warning">Kembali</a>
                            <button type="submit" class="btn btn-success">Tambah Konten</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
