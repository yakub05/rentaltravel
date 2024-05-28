@extends('customer.layouts.customer')

@section('title', 'Edit Testimoni')

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
                            <h5 class="mb-0">Edit Testimoni Travel</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('updatetestimoni', $testimoni->id) }}" method="POST" enctype="multipart/form-data"
                            id="quickForm">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="id_user" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="id_user" name="id_user"
                                    value="{{ auth()->user()->nama }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="komentar" class="form-label">Komentar</label>
                                <input type="text" class="form-control" id="komentar" name="komentar"
                                    value="{{ $testimoni->komentar }}">
                            </div>
                            <a href="{{ route('datatestimoni') }}" class="btn btn-warning">Kembali</a>
                            <button type="submit" class="btn btn-success">Update Testimoni</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
