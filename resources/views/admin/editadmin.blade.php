@extends('admin.layouts.admin')

@section('title', 'Dashboard Edit Data Admin')

@section('sidebar')
    @parent
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
<<<<<<< HEAD
            <form method="POST" action="/editadmin/{{$user->id}}" enctype="multipart/form-data" id="quickForm">
=======
            <form method="POST" action="{{ route('updateadmin', $user->id) }}" enctype="multipart/form-data" id="quickForm">
>>>>>>> d861ab583f0dbafae980ce009120c1f2e332542f
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0">Edit Data Admin</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama" class="form-control-label">Nama</label>
<<<<<<< HEAD
                                    <input class="form-control" type="text" id="nama" name="nama" value="{{ $user->nama, old('nama') }}">
=======
                                    <input class="form-control" type="text" id="nama" name="nama" value="{{ old('nama', $user->nama) }}">
                                    @error('nama')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
>>>>>>> d861ab583f0dbafae980ce009120c1f2e332542f
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-control-label">Email address</label>
                                    <input class="form-control" type="email" id="email" name="email" value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password" class="form-control-label">Password</label>
                                    <input class="form-control" type="password" id="password" name="password">
<<<<<<< HEAD
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="noTelp" class="form-control-label">No. Telp</label>
                                    <input class="form-control" type="text" id="noTelp" name="noTelp" value="{{ $user->telf, old('telf') }}">
                                </div>
                            </div>
=======
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="telf" class="form-control-label">No. Telp</label>
                                    <input class="form-control" type="text" id="telf" name="telf" value="{{ old('telf', $user->telf) }}">
                                    @error('telf')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="user_type">Tipe Pengguna</label>
                                    <select class="form-control @error('user_type') is-invalid @enderror" id="user_type" name="user_type" required>
                                        <option value="admin" {{ $user->user_type == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="customer"{{ $user->user_type == 'customer' ? 'selected' : '' }}>Customer</option>
                                    </select>
                                    @error('user_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
>>>>>>> d861ab583f0dbafae980ce009120c1f2e332542f
                        </div>
                        <a href="/dataadmin" class="btn btn-warning">Kembali</a>
                        <button type="submit" class="btn btn-success">Update Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
