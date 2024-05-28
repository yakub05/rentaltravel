@extends('user.layouts.user')
@section('content')
    <div class="container-fluid py-4 mt-5">
        <div class="row">
            <div class="col">
                <h2 class="mb-4 text-center">List Travel</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama Travel</th>
                                <th>Tujuan</th>
                                <th>Deskripsi</th>
                                <th>Nomor WA</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($travel as $key => $item)
                                <tr>
                                    <td class="align-middle text-center">{{ $key + 1 }}</td>
                                    <td class="align-middle text-center"><img src="{{ Storage::url($item->foto) }}" alt="Foto Travel" class="img-fluid" style="max-width: 300px; max-height: 300px;"></td>
                                    <td class="align-middle text-center">{{ $item->nama_travel }}</td>
                                    <td class="align-middle text-center">{{ $item->tujuan }}</td>
                                    <td class="align-middle">{!! $item->deskripsi !!}</td> 
                                    {{-- <td class="align-middle text-center">
                                        <a href="https://wa.me/{{ $item->telp }}" class="btn btn-success" target="_blank">
                                            <i class="fab fa-whatsapp"></i> Chat
                                        </a>
                                    </td> --}}
                                    {{-- <td class="align-middle text-center">
                                        @php
                                            $message = "Hai saya ingin memesan travel " . $item->nama_travel . " dengan tujuan " . $item->tujuan . ".";
                                            $url = "https://wa.me/" . $item->telp . "?text=" . urlencode($message);
                                        @endphp
                                        <a href="{{ $url }}" class="btn btn-success" target="_blank">
                                            <i class="fab fa-whatsapp"></i> Chat
                                        </a>
                                    </td> --}}
                                    <td class="align-middle text-center">
                                        @php
                                            $message = "Hai saya ingin memesan travel " . $item->nama_travel . " dengan tujuan " . $item->tujuan . ".";
                                            $phone_number = preg_replace('/^0/', '62', $item->telp); 
                                            $url = "https://wa.me/" . $phone_number . "?text=" . urlencode($message);
                                        @endphp
                                        <a href="{{ $url }}" class="btn btn-success" target="_blank">
                                            <i class="fab fa-whatsapp"></i> Chat
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
