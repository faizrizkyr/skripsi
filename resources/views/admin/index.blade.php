@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Selamat Datang Kembali, {{ auth()->user()->name }}!!</h1>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="card border-0 bg-success text-white">
                <div class="card-body">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 flex-grow-1 bd-highlight">
                            <h3>{{ $jumlah['bahanbaku'] }}</h3>
                            <p>Bahan Baku</p>
                        </div>
                        <div class="p-2 bd-highlight my-auto">
                            {{-- <span class="fs-2" data-feather="database"></span> --}}
                            <i class="fa fa-boxes-stacked fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card border-0 bg-danger text-white">
                <div class="card-body">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 flex-grow-1 bd-highlight">
                            <h3>{{ $jumlah['pemakaian'] }}</h3>
                            <p>Sparepart</p>
                        </div>
                        <div class="p-2 bd-highlight my-auto">
                            {{-- <span class="fs-2" data-feather="database"></span> --}}
                            <i class="fa fa-gears fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card border-0 bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 flex-grow-1 bd-highlight">
                            <h3>{{ $jumlah['pemesanan'] }}</h3>
                            <p>Pemesanan</p>
                        </div>
                        <div class="p-2 bd-highlight my-auto">
                            {{-- <span class="fs-2" data-feather="database"></span> --}}
                            <i class="fa fa-angles-left fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card border-0 bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 flex-grow-1 bd-highlight">
                            <h3>{{ $jumlah['sparepart'] }}</h3>
                            <p>Pemakaian</p>
                        </div>
                        <div class="p-2 bd-highlight my-auto">
                            {{-- <span class="fs-2" data-feather="database"></span> --}}
                            <i class="fa fa-angles-right fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
