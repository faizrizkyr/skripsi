@extends('admin.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">

                <h1 class="mb-3 fs-3">Data Bahan Baku {{ $bahanbaku->nama }}</h1>

                <a href="/admin/bahanbaku" class="btn btn-primary"><span data-feather="arrow-left"></span> Kembali ke Data Bahan Baku</a>
                <a href="/admin/bahanbaku/{{ $bahanbaku->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span>
                    Edit Data Bahan Baku</a>
                <form action="/admin/bahanbaku/{{ $bahanbaku->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are You Sure?')"><span
                            data-feather="trash-2"></span> Hapus Data Bahan Baku</button>
                </form>

                <table class="table table-dark table-bordered table-striped table-sm mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Harga satuan</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Stok Minimal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $bahanbaku->nama }}</td>
                            <td>{{ $bahanbaku->deskripsi }}</td>
                            <td>{{ $bahanbaku->harga }}</td>
                            <td>{{ $bahanbaku->stok }}</td>
                            <td>{{ $bahanbaku->min_stok }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        @if ($eoq != null)
            
        <div class="row my-3">
            <h3>Perhitungan EOQ {{ $bahanbaku->nama }}</h3>
            <div class="col-lg-8">
                        <table class="table table-bordered table-striped table-sm mt-3">
                    <tbody>
                        <tr>
                            <td>Tahun</td>
                            <td>{{ $eoq->tahun }}</td>
                        </tr>
                        <tr>
                            <td>Biaya Penyimpanan</td>
                            <td>Rp {{ $eoq->holding_cost }}</td>
                        </tr>
                        <tr>
                            <td>Biaya Pemesanan</td>
                            <td>Rp {{ $eoq->biaya_order }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah kebutuhan selama 1 periode</td>
                            <td>{{ $eoq->jml_kebutuhan }} unit</td>
                        </tr>
                        <tr>
                            <td>Jumlah pemesanan optimal (EOQ)</td>
                            <td>{{ $eoq->eoq }} unit</td>
                        </tr>
                        <tr>
                            <td>Frekuensi pemesanan selama 1 periode</td>
                            <td>{{ $eoq->frekuensi_order }} kali</td>
                        </tr>
                        <tr>
                            <td>Interval Pemesanan</td>
                            <td>{{ $eoq->interval_order }} hari</td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="col-lg-4">
                Jadwal Pemesanan Berdasarkan Interval Pemesanan
                <div class="table-responsive" style="max-height: 400px;min-width: 300px; overflow:auto; display:inline-block;">
                <table class="table table-bordered table-striped table-sm mt-3 text-center">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Jadwal Pemesanan</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tgl_interval as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        @endif

    </div>
@endsection
