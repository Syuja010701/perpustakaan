@extends('backend.app')
@section('title', 'Tambah Peminjam')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Tambah Peminjam</h6>
        <style>
            /* Gaya untuk dark mode */
            @media (prefers-color-scheme: dark) {
                input[type="date"] {
                    background-color: #333;
                    color: #fff;
                }
            }
        </style>
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
        <form method="post" action="{{route('backend-store-peminjam')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                
                 <input type="text" class="form-control" value="{{ old('nama')}}" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" value="{{ old('username')}}" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" value="{{ old('alamat')}}" name="alamat" id="alamat">
            </div>

            <div class="mb-3">
                <label for="telphone" class="form-label">Telphone</label>
                <input type="text" class="form-control" value="{{ old('telphone')}}" name="telphone" id="telphone">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" value="{{ old('email')}}" name="email" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" value="{{ old('password')}}" name="password" id="password">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" value="{{ old('password_confirmation')}}" name="password_confirmation" id="password_confirmation">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Masukkan Foto</label>
                <input class="form-control form-control-sm bg-dark" id="image" name="image" accept="image/*" type="file">
                @error('image')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div><br>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('backend-index-Peminjam')}}" class="btn btn-info">Kembali</a>
        </form>

    </div>
</div>

@endsection