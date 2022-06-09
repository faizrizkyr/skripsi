@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data Kategori Sparepart</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/admin/kategori" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                {!! Form::label('nama', 'Nama', ['class' => 'form-label']) !!}
                {!! Form::text('nama', old('nama'), ['class' => 'form-control', 'placeholder' => 'Masukkan Nama Kategori', 'required', 'autofocus']) !!}

                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                {!! Form::label('keterangan', 'Keterangan', ['class' => 'form-label']) !!}
                {!! Form::text('keterangan', old('keterangan'), ['class' => 'form-control', 'placeholder' => 'Keterangan Tambahan', 'required']) !!}

                @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3"><span data-feather="save"></span> Simpan</button>
        </form>
    </div>


@endsection
