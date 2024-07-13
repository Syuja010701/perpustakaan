@extends('backend.app')
@section('title', 'Detail Penulis')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Detail Penulis</h6>
        <style>
            .dark-input {
                background-color: #252525;
                color: #fff;
                border: 1px solid #555;
            }

            .dark-input:read-only {
                background-color: #252525;
                color: #fff;
                border: 1px solid #555;
            }
        </style>
        <form method="post" action="{{route('backend.show_penulis', $detailPenulis->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <!-- Foto -->
                    <img src="{{ url('/assets/backend/img/' . $detailPenulis->gambar) }}" width="300" alt="">
                </div>

                <div class="col-md-8">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">Nama</th>
                                <td><input type="text" class="form-control dark-input" value="{{ old('nama',$detailPenulis->nama)}}" name="nama" id="nama" readonly></td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat</th>
                                <td><input type="text" class="form-control dark-input" value="{{ old('alamat',$detailPenulis->alamat)}}" name="alamat" id="alamat" readonly></td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal Lahir</th>
                                <td><input type="text" class="form-control dark-input" value="{{ old('tanggal_lahir',$detailPenulis->tanggal_lahir)}}" name="tanggal_lahir" id="tanggal_lahir" readonly></td>
                            </tr>
                            <tr>
                                <th scope="row">Telphone</th>
                                <td><input type="text" class="form-control dark-input" value="{{ old('telphone',$detailPenulis->telphone)}}" name="telphone" id="telphone" readonly></td>
                            </tr>
                            <tr>
                                <th scope="row">Domsili</th>
                                <td><input type="text" class="form-control dark-input" value="{{ old('domsili',$detailPenulis->domsili)}}" name="domsili" id="domsili" readonly></td>
                            </tr>
                            <tr>
                                <th scope="row">Agama</th>
                                <td><input type="text" class="form-control dark-input" value="{{ old('agama',$detailPenulis->agama)}}" name="agama" id="agama" readonly></td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td><input type="text" class="form-control dark-input" value="{{ old('email',$detailPenulis->email)}}" name="email" id="email" readonly></td>
                            </tr>
                            <tr>
                                <th scope="row">Facebook</th>
                                <td><input type="text" class="form-control dark-input" value="{{ old('facebook',$detailPenulis->facebook)}}" name="facebook" id="facebook" readonly></td>
                            </tr>
                            <tr>
                                <th scope="row">Instagram</th>
                                <td><input type="text" class="form-control dark-input" value="{{ old('instagram',$detailPenulis->instagram)}}" name="instagram" id="instagram" readonly></td>
                            </tr>
                            <tr>
                                <th scope="row">Twitter</th>
                                <td><input type="text" class="form-control dark-input" value="{{ old('twtter',$detailPenulis->twtter)}}" name="twtter" id="twtter" readonly></td>
                            </tr>
                            <tr>
                                <th scope="row">Linked In</th>
                                <td><input type="text" class="form-control dark-input" value="{{ old('linked_in',$detailPenulis->linked_in)}}" name="linked_in" id="linked_in" readonly></td>
                            </tr>
                            <tr>
                                <th scope="row">Blog</th>
                                <td><input type="text" class="form-control dark-input" value="{{ old('blog',$detailPenulis->blog)}}" name="blog" id="blog" readonly></td>
                            </tr>
                            <tr>
                                <th scope="row">Youtube</th>
                                <td><input type="text" class="form-control dark-input" value="{{ old('youtube',$detailPenulis->youtube)}}" name="youtube" id="youtube" readonly></td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('backend.penulis')}}" class="btn btn-info">Kembali</a>
        </form>
    </div>
</div>
</div>
</div>
@endsection