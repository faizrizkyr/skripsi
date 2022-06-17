@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Bahan Baku UD. NH Jaya</h1>
    </div>
    
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-9" role="alert">
          {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-10">
        <a href="/admin/bahanbaku/create" class="btn btn-primary mb-3"><span data-feather="file-plus"></span> Tambah Data Bahan Baku Baru</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Harga per unit</th>
              <th scope="col">Stok</th>
              <th scope="col">Stok Minimal</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($bahanbakus as $bahanbaku)
              
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bahanbaku->nama }}</td>
                <td>{{ $bahanbaku->deskripsi }}</td>
                <td>{{ $bahanbaku->harga }}</td>
                <td>{{ $bahanbaku->stok }}</td>
                <td>{{ $bahanbaku->min_stok }}</td>
                <td>
                    <a href="/admin/bahanbaku/{{ $bahanbaku->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                    <a href="/admin/bahanbaku/{{ $bahanbaku->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="/admin/bahanbaku/{{ $bahanbaku->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Hapus data bahan baku?')"><span data-feather="trash-2"></span></button>
                    </form>
                </td>
              </tr>
                  
              @endforeach
          </tbody>
        </table>
      </div>
@endsection
