@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Kategori Sparepart UD. NH Jaya</h1>
    </div>
    
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-9" role="alert">
          {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-10">
        <a href="/admin/kategori/create" class="btn btn-primary mb-3"><span data-feather="file-plus"></span> Tambah Kategori Sparepart Baru</a>
        <table class="table table-striped table-sm dataTable">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($kategoris as $kategori)
              
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kategori->nama }}</td>
                <td>{{ $kategori->keterangan }}</td>
                <td>
                    <a href="/admin/kategori/{{ $kategori->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="/admin/kategori/{{ $kategori->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Hapus Kategori Sparepart {{ $kategori->nama }}?')"><span data-feather="trash-2"></span></button>
                    </form>
                </td>
              </tr>
                  
              @endforeach
          </tbody>
        </table>
      </div>
@endsection
