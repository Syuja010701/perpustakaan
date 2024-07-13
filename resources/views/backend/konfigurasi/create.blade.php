@extends('backend.app')
@section('title', 'Tambah Konfigurasi')
@section('content')

    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
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

                    <form method="POST" action="{{ route('store_konfigurasi') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="no_telepon">Nomor Telphone</label>
                                <input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="maps">Maps</label>
                                <input type="text" class="form-control" id="maps" name="maps" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Logo Perpus</label>
                                <input class="form-control mt-2 form-control-sm bg-dark" id="logo" name="logo"
                                    accept="logo/*" type="file">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div><br>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan Konfigurasi</button>
                                <a href="{{ route('backend-index-konfigurasi') }}" class="btn btn-info">Kembali</a>

                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
