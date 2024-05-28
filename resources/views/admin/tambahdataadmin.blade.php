@extends('admin.layouts.admin')

@section('title', 'Dashboard Tambah Data Admin')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route('tambahdataadmin') }}">
                    @csrf
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0">Tambah Data Admin</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama" class="form-control-label">Nama Admin</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            placeholder="Nama" required>
                                        @error('nama')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-control-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email" required>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password" class="form-control-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Password" required>
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirmation" class="form-control-label">Konfirm
                                            Password</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" placeholder="Konfirm Password" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="telf" class="form-control-label">No. Telp</label>
                                        <input type="text" class="form-control" id="telf" name="telf"
                                            placeholder="Nomor Telepon" required>
                                        @error('telf')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="user_type">Role :</label>
                                        <select class="form-control" id="user_type" name="user_type">
                                            <option value="admin">Admin</option>
                                            <option value="customer">Customer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <a href="/dataadmin" class="btn btn-warning">Kembali</a>
                            <button type="submit" class="btn btn-success">Tambah Admin</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
