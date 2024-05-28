@extends('customer.layouts.customer')

@section('title', 'Dashboard Tambah Data Testimoni')

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
                            <h5 class="mb-0">Tambah Testimoni Travel</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tambahtestimoni') }}" enctype="multipart/form-data">
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
                                        <label for="komentar">Komentar</label>
                                        <input type="komentar" class="form-control" id="komentar" name="komentar"
                                            placeholder="Masukkan Komentar" required>
                                    </div>
                                </div>
                            </div>
                            <a href="/datatestimoni" class="btn btn-warning">Kembali</a>
                            <button type="submit" class="btn btn-success">Tambah Testimoni</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
