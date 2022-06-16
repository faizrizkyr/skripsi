@extends('admin.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">

                <h1 class="mb-3 fs-3">Data Pemesanan {{ $pemesanan->bahanbaku_id }}</h1>

                <a href="/admin/pemesanan" class="btn btn-primary"><span data-feather="arrow-left"></span> Kembali ke Data Pemesanan</a>
                <a href="/admin/pemesanan/{{ $pemesanan->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span>
                    Edit Data Bahan Baku</a>
                <form action="/admin/pemesanan/{{ $pemesanan->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are You Sure?')"><span
                            data-feather="trash-2"></span> Hapus Data Pemesanan</button>
                </form>

                <table class="table table-dark table-bordered table-striped table-sm mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Tanggal Pemesanan</th>
                            <th scope="col">Bahan Baku</th>
                            <th scope="col">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $pemesanan->tgl_pemesanan }}</td>
                            <td>{{ $pemesanan->bahanbakus->nama ?? '-' }}</td>
                            <td>{{ $pemesanan->jumlah }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
