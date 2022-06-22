@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Perhitungan Economic Order Quantity</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/admin/eoq/hitung" class="mb-5" enctype="multipart/form-data">
            
            @csrf

            <div class="mb-3">
                {!! Form::label('tahun', 'Tahun', ['class' => 'form-label']) !!}
                {!! Form::number('tahun', old('tahun'), ['class' => 'form-control', 'placeholder' => 'Masukkan Tahun', 'required']) !!}

                @error('tahun')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>`
                @enderror
            </div>

            <div class="mb-3">
                {!! Form::label('bahanbaku_id', 'Bahan Baku', ['class' => 'form-label']) !!}
                {!! Form::select('bahanbaku_id', $bahanbaku_id, null, ['class' => 'form-select', 'placeholder' => '- Pilih Bahan Baku -', 'required']) !!}

                @error('bahanbaku_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                {!! Form::label('holding_cost', 'Biaya Penyimpanan', ['class' => 'form-label']) !!}
                {!! Form::number('holding_cost', old('holding_cost'), ['class' => 'form-control', 'readonly', 'required']) !!}

                @error('holding_cost')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            
            <button type="button" class="btn btn-primary mt-3" id="btnHitungJumlahKebutuhan"><span data-feather="edit"></span> Hitung Jumlah Rekomendasi Kebutuhan</button>

            <div class="mb-3">
                {!! Form::label('jml_kebutuhan', 'Jumlah Kebutuhan', ['class' => 'form-label']) !!}
                {!! Form::number('jml_kebutuhan', old('jml_kebutuhan'), ['class' => 'form-control', 'required']) !!}

                @error('jml_kebutuhan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                {!! Form::label('biaya_order', 'Biaya Pemesanan', ['class' => 'form-label']) !!}
                {!! Form::number('biaya_order', old('biaya_order'), ['class' => 'form-control', 'placeholder' => 'Masukkan biaya pemesanan', 'required']) !!}

                @error('biaya_order')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3"><span data-feather="save"></span> Hitung EOQ</button>
        </form>
    </div>
@endsection

@section('js_custom')
<script>
    const selectBahanbaku = $('select[name=bahanbaku_id]')
    const holdingCost = $('input[name=holding_cost]')
    const btnJumlahKebutuhan = $('#btnHitungJumlahKebutuhan')
    const inputTahun = $('input[name=tahun]')
    const inputJumlah = $('input[name=jml_kebutuhan]')

    selectBahanbaku.on('change', function () {
        const bahanbakuId = selectBahanbaku.val()

        $.get(window.location.origin + `/admin/bahanbaku/${bahanbakuId}/holding-cost`, function (result) {
            if (result.status) {
                holdingCost.val(result.data)
                inputJumlah.val('')
            }
        })
    })

    btnJumlahKebutuhan.on('click', function () {
        const bahanbakuId = selectBahanbaku.val()
        const tahun = inputTahun.val()
        $.get(window.location.origin + `/admin/bahanbaku/${bahanbakuId}/jumlah-kebutuhan`, {tahun: tahun}, function (result) {
            if (result.status) {
                inputJumlah.val(result.data)
            }
        })
    })
</script>
@endsection