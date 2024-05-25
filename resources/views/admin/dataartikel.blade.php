@extends('admin.layouts.admin')

@section('title', 'Dashboard Data Admin')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6>Data Konten Website Travel</h6>
                            <a href="{{ route('tambahartikel') }}" type="button" class="btn btn-primary">
                                <i class="fas fa-plus"><span class="ms-2" style="text-transform: none;">Tambah
                                        Artikel</span></i>
                            </a>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <div class="input-group" style="width: 300px;">
                                <form action="{{ route('dataartikel') }}" method="GET" class="d-flex">
                                    <span class="input-group-text text-body"><i class="fas fa-search"
                                            aria-hidden="true"></i></span>
                                    <input type="text" class="form-control form-control-sm" name="keyword"
                                        placeholder="Type here..." value="{{ $keyword ?? '' }}">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Judul</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Deskripsi</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Dibuat</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($artikel as $artikel)
                                        <tr>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <img src="{{ Storage::url($artikel->foto) }}" alt="{{ $artikel->judul }}"
                                                    class="img-fluid" style="max-width: 100px;">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $artikel->judul }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $artikel->deskripsi }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm bg-gradient-success">{{ $artikel->created_at }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <a href="{{ route('editartikel', $artikel->id) }}" type="button"
                                                    class="btn btn-warning btn-sm me-2" data-toggle="tooltip"
                                                    data-original-title="Edit user">Edit</a>
                                                <form action="{{ route('deleteartikel', $artikel->id) }}" method="POST"
                                                    style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm me-2"
                                                        data-toggle="tooltip" data-original-title="Delete user"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus konten ini?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- <div class="card-footer clearfix">
                                {{ $konten->links() }}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
