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
                            <h6>Data Artikel Website Travel</h6>
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
                                            Foto</th>
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
                                    @foreach ($artikel as $index => $item)
                                        <tr>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ ($artikel->currentPage() - 1) * $artikel->perPage() + $loop->iteration }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <img src="{{ Storage::url($item->foto) }}" alt="Foto Artikel"
                                                    class="img-fluid" style="max-width: 100px; height: auto;">
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->judul }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{!! Str::limit($item->deskripsi, 50) !!}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm bg-gradient-success">{{ $item->created_at }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <a href="/editartikel/{{ $item->id }}" type="button"
                                                    class="btn btn-warning btn-sm me-2" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Edit artikel">Edit</a>
                                                <form id="delete-form-{{ $item->id }}"
                                                    action="{{ route('deleteartikel', $item->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-original-title="Delete artikel"
                                                    onclick="confirmDelete({{ $item->id }})">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="card-footer clearfix">
                                {{ $artikel->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Kamu Yakin Mau hapus data ini?',
                text: "Kamu Akan Menghapus Data ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya hapus data ini!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
@endsection
