@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Pemakaian Bahan Baku UD. NH Jaya</h1>
    </div>
    
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-9" role="alert">
          {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-10">
        <a href="/admin/pemakaian/create" class="btn btn-primary mb-3"><span data-feather="file-plus"></span> Tambah Data Pemakaian Bahan Baku Baru</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Sparepart</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Tanggal pemakaian</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($pemakaians as $pemakaian)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pemakaian->spareparts->kategori->nama }} - {{ $pemakaian->spareparts->nama ?? '-' }}</td>
                <td>{{ $pemakaian->jumlah }}</td>
                <td>{{ $pemakaian->tgl_pemakaian }}</td>
                <td>
                    <a href="/admin/pemakaian/{{ $pemakaian->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                    <a href="/admin/pemakaian/{{ $pemakaian->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="/admin/pemakaian/{{ $pemakaian->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Hapus data pemakaian?')"><span data-feather="trash-2"></span></button>
                    </form>
                </td>
              </tr>
                  
              @endforeach
          </tbody>
        </table>
      </div>
@endsection
