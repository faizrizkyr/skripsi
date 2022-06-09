@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">

                <h1 class="mb-3 fs-3">Data Bahan Baku {{ $bahanbaku->nama }}</h1>

                <a href="/dashboard/bahanbaku" class="btn btn-primary"><span data-feather="arrow-left"></span> Kembali ke Data Bahan Baku</a>
                <a href="/dashboard/bahanbaku/{{ $bahanbaku->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span>
                    Edit Data Bahan Baku</a>
                <form action="/dashboard/bahanbaku/{{ $bahanbaku->id }}" method="post" class="d-inline">
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
                            <th scope="col">Harga</th>
                            <th scope="col">Stok Minimal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $bahanbaku->nama }}</td>
                            <td>{{ $bahanbaku->deskripsi }}</td>
                            <td>{{ $bahanbaku->harga }}</td>
                            <td>{{ $bahanbaku->min_stok }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
