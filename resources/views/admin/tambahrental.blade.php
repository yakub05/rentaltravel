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
                            <h5 class="mb-0">Tambah Rental Travel</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tambahrental') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama_travel">Nama Travel</label>
                                        <input type="text" class="form-control" id="nama_travel" name="nama_travel" placeholder="Masukkan Nama Kendaraan" value="{{ old('nama_travel') }}" required>
                                        @error('nama_travel')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="foto">Gambar:</label><br>
                                        <input type="file" id="foto" name="foto" accept="image/*" required>
                                        @error('foto')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tujuan">Tujuan</label>
                                        <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Masukkan Tujuan Lokasi Travel" value="{{ old('tujuan') }}" required>
                                        @error('tujuan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="deskripsi" class="form-control-label">Deskripsi</label><br>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Masukkan Deskripsi Travel" required>{{ old('deskripsi') }}</textarea>
                                        @error('deskripsi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="telp">Nomor Telp</label>
                                        <input type="text" class="form-control" id="telp" name="telp" placeholder="Masukkan Nomor Telp yang Akan dihubungi" value="{{ old('telp') }}" required>
                                        @error('telp')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <a href="/datarentaltravel" class="btn btn-warning">Kembali</a>
                            <button type="submit" class="btn btn-success">Tambah Travel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
