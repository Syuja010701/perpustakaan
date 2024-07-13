@extends('backend.app')
@section('title', 'Tambah Penulis')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h6 class="mb-4">Tambah Penulis</h6>
        <style>
            /* Gaya untuk dark mode */
            @media (prefers-color-scheme: dark) {
                input[type="date"] {
                    background-color: #333;
                    color: #fff;
                }
            }
        </style>
        <form method="post" action="{{route('backend.store_penulis')}}" enctype="multipart/form-data">
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
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control fa fa-chart-date" value="{{ old('tanggal_lahir')}}" name="tanggal_lahir" id="tanggal_lahir">
            </div>
            <div class="mb-3">
                <label for="telphone" class="form-label">Telphone</label>
                <input type="number" class="form-control" value="{{ old('telphone')}}" name="telphone" id="telphone">
            </div>
            <div class="mb-3">
                <label for="domsili" class="form-label">Domisili</label>
                <input type="text" class="form-control" value="{{ old('domsili')}}" name="domsili" id="domsili">
            </div>
            <div class="mb-3">
                <label for="agama" class="form-label">Agama</label>
                <input type="text" class="form-control" value="{{ old('agama')}}" name="agama" id="agama">
            </div>
            <div class="mb-3">
                <label for="facebook" class="form-label">Facebook</label>
                <input type="text" class="form-control" value="{{ old('facebook')}}" name="facebook" id="facebook">
            </div>
            <div class="mb-3">
                <label for="instagram" class="form-label">Instagram</label>
                <input type="text" class="form-control" value="{{ old('instagram')}}" name="instagram" id="instagram">
            </div>
            <div class="mb-3">
                <label for="twtter" class="form-label">Twitter</label>
                <input type="text" class="form-control" value="{{ old('twtter')}}" name="twtter" id="twtter">
            </div>
            <div class="mb-3">
                <label for="linked_in" class="form-label">Linked In</label>
                <input type="text" class="form-control" value="{{ old('linked_in')}}" name="linked_in" id="linked_in">
            </div>
            <div class="mb-3">
                <label for="blog" class="form-label">Blog</label>
                <input type="text" class="form-control" value="{{ old('blog')}}" name="blog" id="blog">
            </div>
            <div class="mb-3">
                <label for="youtube" class="form-label">Youtube</label>
                <input type="text" class="form-control" value="{{ old('youtube')}}" name="youtube" id="youtube">
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

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('backend.penulis')}}" class="btn btn-info">Kembali</a>
        </form>
    </div>
</div>
@endsection