@extends('admin.layouts.admin')

@section('title', 'Dashboard Edit Data Admin')

@section('sidebar')
    @parent
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="/editadmin/{{$user->id}}" enctype="multipart/form-data" id="quickForm">
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
                                    <input class="form-control" type="text" id="nama" name="nama" value="{{ $user->nama, old('nama') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-control-label">Email address</label>
                                    <input class="form-control" type="email" id="email" name="email" value="{{ $user->email, old('email') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password" class="form-control-label">Password</label>
                                    <input class="form-control" type="password" id="password" name="password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="noTelp" class="form-control-label">No. Telp</label>
                                    <input class="form-control" type="text" id="noTelp" name="noTelp" value="{{ $user->telf, old('telf') }}">
                                </div>
                            </div>
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
