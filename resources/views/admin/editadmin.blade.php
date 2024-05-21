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
                                <h5 class="mb-0">Edit Data Admin</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nama</label>
                                            <input class="form-control" type="text" value="lucky.jesse">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Email address</label>
                                            <input class="form-control" type="email" value="jesse@example.com">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Password</label>
                                            <input class="form-control" type="email" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">No. Telp</label>
                                            <input class="form-control" type="email" value="">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="user_type">Tipe Pengguna:</label>
                                        <select class="form-control" id="user_type" name="user_type">
                                            <option value="admin">Admin</option>
                                            <option value="merchant">Merchant</option>
                                        </select>
                                    </div>
                                </div>
                                <a href="/dataadmin" class="btn btn-warning">Kembali</a>
                                <button type="submit" class="btn btn-success">Update Data</button>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
@endsection
