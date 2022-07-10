@extends('admin.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">

                <h1 class="mb-3 fs-3">Data Sparepart {{ $sparepart->nama }}</h1>

                <a href="/admin/sparepart" class="btn btn-primary"><span data-feather="arrow-left"></span> Kembali ke Data Sparepart</a>
                <a href="/admin/sparepart/{{ $sparepart->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span>
                    Edit Data Bahan Baku</a>
                <form action="/admin/sparepart/{{ $sparepart->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are You Sure?')"><span
                            data-feather="trash-2"></span> Hapus Data Bahan Baku</button>
                </form>

                <table class="table table-dark table-bordered table-striped table-sm mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $sparepart->nama }}</td>
                            <td>{{ $sparepart->kategori->nama }}</td>
                            <td>{{ $sparepart->deskripsi }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
