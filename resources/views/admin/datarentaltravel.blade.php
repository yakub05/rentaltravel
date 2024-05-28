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
                            <h6>Data Konten Rental Travel</h6>
                            <a href="/tambahrental" type="button" class="btn btn-primary">
                                <i class="fas fa-plus"><span class="ms-2" style="text-transform: none;">Tambah
                                        Konten</span></i>
                            </a>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <div class="input-group" style="width: 300px;">
                                <form action="{{ route('datarentaltravel') }}" method="GET" class="d-flex">
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
                                            Nama Travel</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Foto</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tujuan</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Deskripsi</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Telp</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Dibuat</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Diupdate</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($travel as $travel)
                                        <tr>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
<<<<<<< HEAD
                                                    class="text-secondary text-xs font-weight-bold">{{ $travel->nama_travel}}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <img src="{{ Storage::url($travel->foto) }}" alt="Foto Artikel" class="img-fluid">
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{$travel->tujuan}}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{!!Str::limit($travel->deskripsi,25)!!}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm bg-gradient-success">{{ $travel->telp }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <a href="/editrental" type="button"
                                                    class="btn btn-warning btn-sm me-2" data-toggle="tooltip"
                                                    data-original-title="Edit user">Edit</a>
                                                    <form id="delete-form-{{ $travel->id }}" action="{{ route('deletetravel', $travel->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete user" onclick="confirmDelete({{ $travel->id }})">
                                                        Delete
                                                    </button>
=======
                                                    class="text-secondary text-xs font-weight-bold">{{ $travel->nama_travel }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <img src="{{ Storage::url($travel->foto) }}" alt="Foto Artikel"
                                                    class="img-fluid">
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $travel->tujuan }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{!! Str::limit($travel->deskripsi, 25) !!}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $travel->telp }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm bg-gradient-success">{{ $travel->created_at }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm bg-gradient-success">{{ $travel->updated_at }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <a href="{{ route('editrental', $travel->id) }}" type="button"
                                                    class="btn btn-warning btn-sm me-2" data-toggle="tooltip"
                                                    data-original-title="Edit user">Edit</a>
                                                <form id="delete-form-{{ $travel->id }}"
                                                    action="{{ route('deletetravel', $travel->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip"
                                                    data-original-title="Delete user"
                                                    onclick="confirmDelete({{ $travel->id }})">
                                                    Delete
                                                </button>
>>>>>>> d861ab583f0dbafae980ce009120c1f2e332542f
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
