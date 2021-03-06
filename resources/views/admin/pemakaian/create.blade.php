@extends('admin.layouts.main')

@section('container')

@if (session()->has('failed'))
<div class="alert alert-danger col-lg-9" role="alert">
  {{ session('failed') }}
</div>
@endif
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data Pemakaian Bahan Baku</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/admin/pemakaian" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="tgl_pemakaian" class="form-label">Tanggal pemakaian</label>
                <input type="date" class="form-control" name="tgl_pemakaian" id="tgl_pemakaian" required
                    value="{{ old('tgl_pemakaian') }}">
                @error('tgl_pemakaian')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                {!! Form::label('sparepart_id', 'Sparepart', ['class' => 'form-label']) !!}
                {!! Form::select('sparepart_id', $sparepart_id, null, ['class' => 'form-select', 'placeholder' => '- Pilih Sparepart -', 'required']) !!}

                @error('sparepart_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                {!! Form::label('jumlah', 'Jumlah', ['class' => 'form-label']) !!}
                {!! Form::number('jumlah', old('jumlah'), ['class' => 'form-control', 'placeholder' => 'Jumlah Produksi Sparepart', 'required']) !!}

                @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3"><span data-feather="save"></span> Simpan</button>
        </form>
    </div>
@endsection
