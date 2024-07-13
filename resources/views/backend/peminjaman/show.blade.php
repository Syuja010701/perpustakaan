@extends('backend.app')
@section('title', 'Detail Peminjaman')
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
        <form method="post" action="{{ route('backend-show-peminjaman', $detailPeminjaman->id) }}">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <!-- Foto -->
                    <img src="{{ url('/assets/backend/img/' . $detailPeminjaman->image_buku) }}" width="300" alt="">
                </div>

                <div class="col-md-8">
                    <table class="table">
                        <tbody>
                            <!-- Bagian lainnya -->
                            <tr>
                                <th scope="row">Nama Peminjam</th>
                                <td><input type="text" class="form-control dark-input" value="{{ old('nama_peminjam', $detailPeminjaman->nama_peminjam) }}" name="nama_peminjam" id="nama_peminjam" readonly></td>
                            </tr>
                            <tr>
                                <th scope="row">Judul Buku</th>
                                <td><input type="text" class="form-control dark-input" value="{{ old('judul', $detailPeminjaman->judul) }}" name="judul" id="judul" readonly></td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat</th>
                                <td><input type="text" class="form-control dark-input" value="{{ old('alamat', $detailPeminjaman->alamat) }}" name="alamat" id="alamat" readonly></td>
                            </tr>
                            <!-- Bagian formulir yang dilanjutkan -->
<tr>
    <th scope="row">Telephone</th>
    <td><input type="text" class="form-control dark-input" value="{{ old('telphone', $detailPeminjaman->telphone) }}" name="telphone" id="telphone" readonly></td>
</tr>
<tr>
    <th scope="row">Tanggal Pinjam</th>
    <td><input type="text" class="form-control dark-input" value="{{ old('tanggal_pinjam', $detailPeminjaman->tanggal_pinjam) }}" name="tanggal_pinjam" id="tanggal_pinjam" readonly></td>
</tr>
<tr>
    <th scope="row">Tanggal Harus Kembali</th>
    <td><input type="text" class="form-control dark-input" value="{{ old('tanggal_kembali', $detailPeminjaman->tanggal_kembali) }}" name="tanggal_kembali" id="tanggal_kembali" readonly></td>
</tr>
<tr>
    <th scope="row">Total Pinjam Buku</th>
    <td><input type="text" class="form-control dark-input" value="{{ old('total', $detailPeminjaman->total) }} buku" name="total" id="total" readonly></td>
</tr>

<tr>
    <th scope="row">Telat Pengembalian</th>
    <td><input type="text" class="form-control dark-input" value="{{ old('telat_pengembalian', $detailPeminjaman->telat_pengembalian) }} hari" name="telat_pengembalian" id="telat_pengembalian" readonly></td>
</tr>
<tr>
    <th scope="row">Denda</th>
    <td><input type="text" class="form-control dark-input" value="Rp. {{ old('denda', $detailPeminjaman->denda) }}" name="denda" id="denda" readonly></td>
</tr>


                           
                        </tbody>
                    </table>
                    <a href="{{ route('backend-index-transaksi') }}" class="btn btn-info">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
