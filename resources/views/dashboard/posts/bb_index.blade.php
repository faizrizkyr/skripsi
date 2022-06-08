@extends('dashboard.layouts.main')

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
        <a href="/dashboard/posts/bb_create" class="btn btn-primary mb-3">Tambah Data Bahan Baku Baru</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Harga</th>
              <th scope="col">Stok Minimal</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($posts as $post)
              
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->nama }}</td>
                <td>{{ $post->deskripsi }}</td>
                <td>{{ $post->harga }}</td>
                <td>{{ $post->min_stok }}</td>
                <td>
                    <a href="/dashboard/posts/{{ $post->nama }}" class="badge bg-info"><span data-feather="eye"></span></a>
                    <a href="/dashboard/posts/{{ $post->nama }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="/dashboard/posts/{{ $post->nama }}" method="post" class="d-inline">
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
