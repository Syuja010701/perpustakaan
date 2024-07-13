@extends('backend.app')
@section('title', 'Tambah User')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><br>
                    <h2>Tambah User</h2>
                </div>

            </div>
        </div>
    </section>

    <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <form method="POST" action="{{route('backend-store-user')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <label class="mb-2" for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" value="{{ old('name') }}" name="name" placeholder="">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2" for="deskripsi">Username</label>
                        <input type="text" class="form-control" value="{{ old('username') }}" id="username" name="username" placeholder="">
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2" for="deskripsi">Email</label>
                        <input type="text" class="form-control" value="{{ old('email') }}" id="email" name="email" placeholder="">
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2" for="deskripsi">Password</label>
                        <input type="password" class="form-control" value="{{ old('password') }}" id="password" name="password" placeholder="">
                    </div>

                    <div class="form-group mb-4">
                        <label class="mb-2" for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" id="password_confirmation" class="form-control" required>
                    </div>

                    <div class="form-group mb-4 ">
                        <label class="mb-2">Role User <strong style="color: red;">*</strong></label>
                        <select class="form-select" multiple="" aria-label="multiple select example">
                            @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Masukkan Foto</label>
                        <input class="form-control form-control-sm bg-dark" id="image" name="image" accept="image/*" type="file">
                        @error('image')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div><br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('backend-index-user')}}" class="btn btn-info">kembali</a>


                </form>
            </div>
        </div>

    </div>
</div>
@endsection