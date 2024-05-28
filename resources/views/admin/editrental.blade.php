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
                            <h5 class="mb-0">Edit Rental Travel</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('updaterental', $travel->id) }}" method="POST" enctype="multipart/form-data"
                            id="quickForm">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="mb-3">
                                    <label for="id_user" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="id_user" name="id_user"
                                        value="{{ auth()->user()->nama }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_travel" class="form-label">Nama Travel</label>
                                    <input type="text" class="form-control" id="nama_travel" name="nama_travel"
                                        value="{{ $travel->nama_travel }}">
                                </div>
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Gambar</label>
                                    <input type="file" class="form-control" id="foto" name="foto">
                                    <img src="{{ Storage::url($travel->foto) }}" alt="{{ $travel->judul }}"
                                        class="img-fluid mt-3" style="max-width: 100px;">
                                </div>
                                <div class="mb-3">
                                    <label for="tujuan" class="form-label">Tujuan</label>
                                    <input type="text" class="form-control" id="tujuan" name="tujuan"
                                        value="{{ $travel->tujuan }}">
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $travel->deskripsi }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="telp" class="form-label">Nomor Telp</label>
                                    <input type="text" class="form-control" id="telp" name="telp"
                                        value="{{ $travel->telp }}">
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
