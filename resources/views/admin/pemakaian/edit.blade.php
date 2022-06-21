@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Pemakaian Sparepart</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/admin/pemakaian/{{ $pemakaian->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="tgl_pemakaian" class="form-label">Tanggal pemakaian</label>
                <input type="date" class="form-control" name="tgl_pemakaian" id="tgl_pemakaian" required
                    value="{{ old('tgl_pemakaian', $pemakaian->tgl_pemakaian) }}">
                {{-- <input type="hidden" class="form-control" name="sparepart_id_old" id="sparepart_id_old" required
                    value="{{ old('sparepart_id', $pemakaian->sparepart_id) }}"> --}}
                @error('tgl_pemakaian')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                {!! Form::label('sparepart_id', 'Sparepart', ['class' => 'form-label']) !!}
                {!! Form::select('sparepart_id', $sparepart_id, old('sparepart_id', $pemakaian->sparepart_id ?? null), ['class' => 'form-select', 'placeholder' => '- Pilih Sparepart -', 'required']) !!}

                @error('sparepart_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                {!! Form::label('jumlah', 'Jumlah', ['class' => 'form-label']) !!}
                {!! Form::number('jumlah', old('jumlah', $pemakaian->jumlah), ['class' => 'form-control', 'placeholder' => 'Jumlah Bahan Baku yang di pesan', 'required']) !!}

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
