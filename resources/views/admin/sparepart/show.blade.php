@extends('admin.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">

                <h1 class="mb-3 fs-3">Data Sparepart {{ $sparepart->nama }}</h1>

                <a href="/admin/sparepart" class="btn btn-primary"><span data-feather="arrow-left"></span> Kembali ke Data Sparepart</a>

                @if(auth()->user()->role == 'superadmin')
                    <a href="/admin/sparepart/{{ $sparepart->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit Data Bahan Baku</a>
                    <form action="/admin/sparepart/{{ $sparepart->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are You Sure?')"><span data-feather="trash-2"></span> Hapus Data Bahan Baku</button>
                    </form>
                @endif

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
        <div>
            <h3>Bahan Baku Yang Dibutuhkan</h3>

            @if(auth()->user()->role == 'superadmin')
                <a href="/admin/sparepart/{{ $sparepart->id }}/bahanbaku/create" class="btn btn-primary mb-3"><span data-feather="file-plus"></span> Tambah Bahan Baku Sparepart Baru</a>
            @endif

            <table class="table table-bordered table-striped table-sm mt-3">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bahanbakus as $bahanbaku)
                        <tr>
                            <td>{{ $bahanbaku->nama }}</td>
                            <td>{{ $bahanbaku->pivot->jumlah }}</td>
                            <td>                   
                                <a href="/admin/sparepart/{{ $sparepart->id }}/bahanbaku/{{ $bahanbaku->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                                <form action="/admin/sparepart/{{ $sparepart->id }}/bahanbaku/{{ $bahanbaku->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Hapus Bahan Baku?')"><span data-feather="trash-2"></span></button>
                                </form></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
