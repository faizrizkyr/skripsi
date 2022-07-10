@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data User</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/admin/user/{{ $user->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                {!! Form::label('name', 'Nama', ['class' => 'form-label']) !!}
                {!! Form::text('name', old('name', $user->name), ['class' => 'form-control', 'placeholder' => 'Masukkan nama user', 'required', 'autofocus']) !!}

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
                {!! Form::email('email', old('email', $user->email), ['class' => 'form-control', 'placeholder' => 'Masukkan email user', 'required', 'autofocus']) !!}

                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                {!! Form::label('password', 'Password', ['class' => 'form-label']) !!}
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Masukkan password', 'autofocus']) !!}

                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                {!! Form::label('role', 'role', ['class' => 'form-label']) !!}
                {!! Form::select('role', \App\Models\User::dropdownRole(), old('role', $user->role), ['class' => 'form-control', 'placeholder' => 'Masukkan role', 'required', 'autofocus']) !!}

                @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3"><span data-feather="save"></span> Simpan</button>
        </form>
    </div>


@endsection
