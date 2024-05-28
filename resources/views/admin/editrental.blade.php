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
                            <h5 class="mb-0">Edit Konten Travel</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="" action="" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="judul">Nama Travel</label>
                                        <input type="judul" class="form-control" id="judul" name="judul"
                                            placeholder="Masukkan Nama Kendaraan " required>
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
                                        <label for="judul">Tujuan</label>
                                        <input type="judul" class="form-control" id="judul" name="judul"
                                            placeholder="Masukkan Tujuan Lokasi Travel" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="deskripsi" class="form-control-label">deskripsi</label><br>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Masukkan Deskripsi Travel"
                                            required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="judul">Nomor Telp</label>
                                        <input type="judul" class="form-control" id="judul" name="judul"
                                            placeholder="Masukkan Nomor Telp yang Akan dihubungi" required>
                                    </div>
                                </div>
                            </div>
                            <a href="/datarentaltravel" class="btn btn-warning">Kembali</a>
                            <button type="submit" class="btn btn-success">Update Data Travel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
