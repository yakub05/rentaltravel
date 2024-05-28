@extends('admin.layouts.admin')

@section('title', 'Admin Dashboard')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <!-- Sapaan -->
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <div class="col-8">
                            <h4>Halo, Selamat Datang <strong>{{ Auth::user()->nama }}</strong> !</h4>
                            <p>Anda telah berhasil masuk ke dashboard admin. Selamat bekerja!</p>
                        </div>
                        <div class="col-4 text-end">
                            <img src="../assets/img/programmer.jpg" alt="Illustration" class="img-fluid custom-img-size">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistik Ringkasan -->
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Data Admin</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ number_format($dataUserCount) }}
                                        <span
                                            class="text-success text-sm font-weight-bolder">{{ round($userPercentage, 2) }}%</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Data Konten</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ number_format($dataKontenCount) }}
                                        <span
                                            class="text-success text-sm font-weight-bolder">{{ round($kontenPercentage, 2) }}%</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-newspaper text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Data Artikel</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ number_format($dataArtikelCount) }}
                                        <span
                                            class="text-success text-sm font-weight-bolder">{{ round($artikelPercentage, 2) }}%</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-file-alt text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Data Travel</p>
                                    {{-- <h5 class="font-weight-bolder mb-0">
                                    {{ number_format($dataTravelCount) }}
                                    <span class="text-success text-sm font-weight-bolder">{{ round($travelPercentage, 2) }}%</span>
                                </h5> --}}
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-bus text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
