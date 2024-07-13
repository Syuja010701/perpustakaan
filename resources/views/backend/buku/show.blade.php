@extends('backend.app')
@section('title', 'Detail Buku')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <h3 class="mb-6">Detail Buku</h3><br>
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
        <form method="post" action="{{route('backend.show_buku', $detailBuku->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <!-- Foto -->
                    <img src="{{ url('/assets/backend/img/' . $detailBuku->gambar) }}" width="300" alt="">
                </div>

                <div class="col-md-8">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">Penulis</th>
                                <td><input type="text" class="form-control dark-input" value="{{ old('',$detailBuku->nama)}}" name="nama" id="nama" readonly></td>
                            </tr>
                            <tr>
                                <th scope="row">Judul</th>
                                <td><input type="text" class="form-control dark-input" value="{{ old('judul',$detailBuku->judul)}}" name="judul" id="judul" readonly></td>
                            </tr>
                            <tr>
                                <th scope="row">Rating</th>
                                <td><input type="text" class="form-control dark-input" value="{{ old('rating',$detailBuku->rating)}}" name="rating" id="rating" readonly></td>
                            </tr>
                            <tr>
                                <th scope="row">Sinopsis</th>
                                <td>
                                    <textarea rows="10" class="form-control dark-input" name="sinopsis" id="sinopsis" readonly>{{ $detailBuku->sinopsis }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Penerbit</th>
                                <td><input type="text" class="form-control dark-input" value="{{ old('penerbit',$detailBuku->penerbit)}}" name="penerbit" id="penerbit" readonly></td>
                            </tr>
                            <tr>
                                <th scope="row">Jumlah Halaman</th>
                                <td><input type="text" class="form-control dark-input" value="{{ old('jumlah_halaman',$detailBuku->jumlah_halaman)}}" name="jumlah_halaman" id="jumlah_halaman" readonly></td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal Terbit</th>
                                <td><input type="text" class="form-control dark-input" value="{{ old('tahggal_terbit',$detailBuku->tahggal_terbit)}}" name="tahggal_terbit" id="tahggal_terbit" readonly></td>
                            </tr>
                            <tr>
                                <th scope="row">ISBN</th>
                                <td><input type="text" class="form-control dark-input" value="{{ old('isbn',$detailBuku->isbn)}}" name="isbn" id="isbn" readonly></td>
                            </tr>
                            <tr>
                                <th scope="row">Bahasa</th>
                                <td><input type="text" class="form-control dark-input" value="{{ old('bahasa',$detailBuku->bahasa)}}" name="bahasa" id="bahasa" readonly></td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('backend.buku')}}" class="btn btn-info">Kembali</a>
        </form>
    </div>
</div>
</div>
</div>
@endsection