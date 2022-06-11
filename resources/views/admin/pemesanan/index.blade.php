@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Pemesanan Bahan Baku UD. NH Jaya</h1>
    </div>
    
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-9" role="alert">
          {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-10">
        <a href="/admin/pemesanan/create" class="btn btn-primary mb-3"><span data-feather="file-plus"></span> Tambah Data Bahan Baku Baru</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Bahan Baku</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Tanggal Pemesanan</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($pemesanans as $pemesanan)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pemesanan->bahanbakus->nama ?? '-' }}</td>
                <td>{{ $pemesanan->jumlah }}</td>
                <td>{{ $pemesanan->tgl_pemesanan }}</td>
                <td>
                    <a href="/admin/pemesanan/{{ $pemesanan->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                    <a href="/admin/pemesanan/{{ $pemesanan->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="/admin/pemesanan/{{ $pemesanan->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Hapus data pemesanan?')"><span data-feather="trash-2"></span></button>
                    </form>
                </td>
              </tr>
                  
              @endforeach
          </tbody>
        </table>
      </div>
@endsection
