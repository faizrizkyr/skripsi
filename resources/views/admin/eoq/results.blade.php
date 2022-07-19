@extends('admin.layouts.main')

@section('container')
    <div class="container">

        <h1 class="mb-3 fs-3">Hasil Perhitungan EOQ</h1>

        <a href="/admin/eoq" class="btn btn-primary"><span data-feather="arrow-left"></span> Hitung Kembali</a>
        <form action="/admin/eoq" method="post" class="d-inline">
            @method('post')
            @csrf
            <input type="hidden" name="tahun" value="{{ $tahun }}">
            <input type="hidden" name="bahanbaku_id" value="{{ $bahanbaku->id }}">
            <input type="hidden" name="holding_cost" value="{{ $holding_cost }}">
            <input type="hidden" name="biaya_order" value="{{ $biaya_order }}">
            <input type="hidden" name="jml_kebutuhan" value="{{ $jml_kebutuhan }}">
            <input type="hidden" name="eoq" value="{{ $eoq }}">
            <input type="hidden" name="frekuensi_order" value="{{ $frekuensi }}">
            <input type="hidden" name="interval_order" value="{{ $interval }}">
            <button class="btn btn-success" onclick="return confirm('Yakin di simpan?')"><span
                    data-feather="save"></span> Simpan Perhitungan</button>
                </form>
        <div class="row my-3">
            <div class="col-lg-8">
                        <table class="table table-bordered table-striped table-sm mt-3">
                    <tbody>
                        <tr>
                            <td>Tahun</td>
                            <td>{{ $tahun }}</td>
                        </tr>
                        <tr>
                            <td>Bahan Baku</td>
                            <td>{{ $bahanbaku->nama }}</td>
                        </tr>
                        <tr>
                            <td>Biaya Penyimpanan</td>
                            <td>Rp {{ $holding_cost }}</td>
                        </tr>
                        <tr>
                            <td>Biaya Pemesanan</td>
                            <td>Rp {{ $biaya_order }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah kebutuhan selama 1 periode</td>
                            <td>{{ $jml_kebutuhan }} unit</td>
                        </tr>
                        <tr>
                            <td>Jumlah pemesanan optimal (EOQ)</td>
                            <td>{{ $eoq }} unit</td>
                        </tr>
                        <tr>
                            <td>Frekuensi pemesanan selama 1 periode</td>
                            <td>{{ $frekuensi }} kali</td>
                        </tr>
                        <tr>
                            <td>Interval Pemesanan</td>
                            <td>Setiap {{ $interval }} hari</td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="col-lg-4">
                <table class="table table-bordered table-striped table-sm mt-3 text-center">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Jadwal Pemesanan</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tglInterval as $item)
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
@endsection
