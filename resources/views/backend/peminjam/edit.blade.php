@extends('backend.app')
@section('title', 'Edit Peminjam')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Tambah Penulis</h6>
        <form method="post" action="{{ route('backend-update-peminjam', ['id' => $datapeminjam->id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" value="{{ old('nama',$datapeminjam->nama)}}" name="nama" id="nama">

            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" value="{{ old('alamat',$datapeminjam->alamat)}}" name="alamat" id="alamat">
            </div>
            <div class="mb-3">
                <label for="telphone" class="form-label">Telphone</label>
                <input type="text" class="form-control" value="{{ old('telphone',$datapeminjam->telphone)}}" name="telphone" id="telphone">
            </div>
           
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('backend-index-Peminjam')}}" class="btn btn-info">Kembali</a>
        </form>
    </div>
</div>

@endsection