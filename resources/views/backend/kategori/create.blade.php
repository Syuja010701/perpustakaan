@extends('backend.app')
@section('title', 'Tambah Kategori')
@section('content')
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

                <form method="POST" action="{{ route('store_kategori') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="nama">Slug</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="">
                        </div>


                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan Kategori</button>
                            <a href="{{ route('backend.kategori') }}" class="btn btn-info">Kembali</a>

                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection