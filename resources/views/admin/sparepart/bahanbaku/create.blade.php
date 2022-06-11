@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data Bahan Baku Sparepart {{ $sparepart->nama }}</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/admin/sparepart/{{ $sparepart->id }}/bahanbaku" class="mb-5" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                {!! Form::label('bahanbaku_id', 'Bahan Baku', ['class' => 'form-label']) !!}
                {!! Form::select('bahanbaku_id', $bahanbaku, null, ['class' => 'form-select', 'placeholder' => '- Pilih Bahan Baku -', 'required']) !!}

                @error('bahanbaku_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                {!! Form::label('jumlah', 'Jumlah', ['class' => 'form-label']) !!}
                {!! Form::number('jumlah', old('jumlah'), ['class' => 'form-control', 'placeholder' => 'Jumlah Bahan Baku', 'required']) !!}

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
