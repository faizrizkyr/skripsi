@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Bahan Baku</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/admin/bahanbaku/{{ $bahanbaku->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                {!! Form::label('nama', 'Nama', ['class' => 'form-label']) !!}
                {!! Form::text('nama', old('nama', $bahanbaku->nama), ['class' => 'form-control', 'placeholder' => 'Masukkan Nama Bahan Baku', 'required', 'autofocus']) !!}

                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                {!! Form::label('deskripsi', 'Deskripsi', ['class' => 'form-label']) !!}
                {!! Form::text('deskripsi', old('deskripsi', $bahanbaku->deskripsi), ['class' => 'form-control', 'placeholder' => 'Deskripsi Bahan Baku', 'required']) !!}

                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                {!! Form::label('harga', 'Harga', ['class' => 'form-label']) !!}
                {!! Form::number('harga', old('harga', $bahanbaku->harga), ['class' => 'form-control', 'placeholder' => 'Harga Bahan Baku', 'required']) !!}

                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3"><span data-feather="save"></span> Simpan</button>
        </form>
    </div>


@endsection
