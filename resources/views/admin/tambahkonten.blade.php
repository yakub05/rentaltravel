@extends('admin.layouts.admin')

@section('title', 'Dashboard Tambah Data Admin')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <form>
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0">Tambah Konten Travel</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Judul Konten</label>
                                            <input class="form-control" type="text" placeholder="Masukkan Judul Anda">
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
                                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Masukkan Deskripsi Konten" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <a href="/kelolakonten" class="btn btn-warning">Kembali</a>
                                <button type="submit" class="btn btn-success">Tambah Konten</button>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
@endsection
