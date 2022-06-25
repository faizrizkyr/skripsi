@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Transaksi Bahan Baku UD. NH Jaya</h1>
    </div>
    
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-9" role="alert">
          {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-10">
        <table class="table table-striped table-sm dataTable">
            <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Tanggal Pemesanan</th>
              <th scope="col">Jenis Transaksi</th>
              <th scope="col">Bahan Baku</th>
              <th scope="col">Jumlah</th>
              <th scope="col">ID. Pemesanan</th>
              <th scope="col">ID. Pemakaian</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($transaksis as $transaksi)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaksi->tgl_transaksi }}</td>
                <td>{{ $transaksi->jenis_transaksi }}</td>
                <td>{{ $transaksi->bahanbakus->nama ?? '-' }}</td>
                <td>{{ $transaksi->jumlah }}</td>
                <td>{{ $transaksi->pemesanan_id }}</td>
                <td>{{ $transaksi->pemakaian_id }}</td>

              </tr>
                  
              @endforeach
          </tbody>
        </table>
      </div>
@endsection
