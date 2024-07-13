@extends('backend.app')
@section('title', 'Edit Penulis')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Edit Penulis</h6>
        <form method="post" action="{{route('backend.update_penulis', $datapenulis->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" value="{{ old('nama',$datapenulis->nama)}}" name="nama" id="nama">

            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" value="{{ old('alamat',$datapenulis->alamat)}}" name="alamat" id="alamat">
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="text" class="form-control" value="{{ old('tanggal_lahir',$datapenulis->tanggal_lahir)}}" name="tanggal_lahir" id="tanggal_lahir">
            </div>
            <div class="mb-3">
                <label for="telphone" class="form-label">Telphone</label>
                <input type="text" class="form-control" value="{{ old('telphone',$datapenulis->telphone)}}" name="telphone" id="telphone">
            </div>
            <div class="mb-3">
                <label for="domsili" class="form-label">Domsili</label>
                <input type="text" class="form-control" value="{{ old('domsili',$datapenulis->domsili)}}" name="domsili" id="domsili">
            </div>
            <div class="mb-3">
                <label for="agama" class="form-label">Agama</label>
                <input type="text" class="form-control" value="{{ old('agama',$datapenulis->agama)}}" name="agama" id="agama">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" value="{{ old('email',$datapenulis->email)}}" name="email" id="email">
            </div>
            <div class="mb-3">
                <label for="facebook" class="form-label">Facebook</label>
                <input type="text" class="form-control" value="{{ old('facebook',$datapenulis->facebook)}}" name="facebook" id="facebook">
            </div>
            <div class="mb-3">
                <label for="instagram" class="form-label">Instagram</label>
                <input type="text" class="form-control" value="{{ old('instagram',$datapenulis->instagram)}}" name="instagram" id="instagram">
            </div>
            <div class="mb-3">
                <label for="twtter" class="form-label">Twitter</label>
                <input type="text" class="form-control" value="{{ old('twtter',$datapenulis->twtter)}}" name="twtter" id="twtter">
            </div>
            <div class="mb-3">
                <label for="linked_in" class="form-label">Linked In</label>
                <input type="text" class="form-control" value="{{ old('linked_in',$datapenulis->linked_in)}}" name="linked_in" id="linked_in">
            </div>
            <div class="mb-3">
                <label for="blog" class="form-label">Blog</label>
                <input type="text" class="form-control" value="{{ old('blog',$datapenulis->blog)}}" name="blog" id="blog">
            </div>
            <div class="mb-3">
                <label for="youtube" class="form-label">Youtube</label>
                <input type="text" class="form-control" value="{{ old('youtube',$datapenulis->youtube)}}" name="youtube" id="youtube">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('backend.penulis')}}" class="btn btn-info">Kembali</a>
        </form>
    </div>
</div>

@endsection