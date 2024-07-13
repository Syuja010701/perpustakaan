@extends('backend.app')
@section('title', 'Edit Buku')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><br>
                    <h2>Edit Buku</h2>
                </div>
                <style>
                    /* Gaya untuk dark mode */
                    @media (prefers-color-scheme: dark) {
                        input[type="date"] {
                            background-color: #333;
                            color: #fff;
                        }
                    }
                </style>
            </div>
        </div>
    </section>

    <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="bg-secondary rounded h-100 p-4">
                <form method="POST" action="{{route('backend.update_buku', $databuku->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="kategori">Kategori Buku</label>
                        <select class="form-select form-select-sm mt-2" id="kategori_id" name="kategori_id">
                            <option value="" disabled selected>---Pilih Kategori Buku---</option>
                            @foreach($kategoriBuku as $kategori)
                            <option value="{{ $kategori->id }}" {{ $databuku->kode_kategori == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="peulis">Penulis</label>
                        <select class="form-select form-select-sm mt-2" id="penulis_id" name="penulis_id">
                            <option value="{{ old('penulis_id') }}" disabled selected>---Pilih penulis---</option>
                            @foreach($penulisBuku as $penulis)
                            <option value="{{ $penulis->id }}" {{ $databuku->id_penulis == $penulis->id ? 'selected' : '' }}>{{ $penulis->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control mt-2" value="{{ old('judul', $databuku->judul) }}" id="judul" name="judul" placeholder="">
                    </div>

                    <div class="form-group mb-4">
                        <label for="rating">Rating</label>
                        <input type="text" class="form-control mt-2" value="{{ old('rating', $databuku->rating) }}" id="rating" name="rating" placeholder="">
                    </div>
                    <div class="form-group mb-4">
                        <label for="stok_buku">Stok</label>
                        <input type="number" class="form-control mt-2" value="{{ old('stok_buku', $databuku->stok_buku }}" id="stok_buku" name="stok_buku" placeholder="">
                    </div>
                    <div class="form-group mb-4">
                        <label for="sinopsis">sinopsis</label>
                        <textarea class="form-control mt-2" id="sinopsis" name="sinopsis" placeholder="">{{ old('sinopsis', $databuku->sinopsis) }}</textarea>
                    </div>
                    <div class="form-group mb-4">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" name="penerbit" value="{{ old('penerbit', $databuku->penerbit) }}" id="penerbit" class="form-control mt-2">
                    </div>
                    <div class="form-group mb-4">
                        <label for="jumlah_halaman">Jumlah Halaman</label>
                        <input type="number" name="jumlah_halaman" value="{{ old('jumlah_halaman', $databuku->jumlah_halaman) }}" id="jumlah_halaman" class="form-control mt-2">
                    </div>
                    <div class="form-group mb-4">
                        <label for="tahggal_terbit">Tanggal Terbit</label>
                        <span>
                            <input type="date" name="tahggal_terbit" value="{{ old('tahggal_terbit', $databuku->tahggal_terbit) }}" id="tahggal_terbit" class="form-control fa fa-chart-date "></i>
                        </span>
                    </div>
                    <div class="form-group mb-4">
                        <label for="isbn">ISBN</label>
                        <input type="text" name="isbn" value="{{ old('isbn', $databuku->isbn) }}" id="isbn" class="form-control mt-2">
                    </div>
                    <div class="form-group mb-4">
                        <label for="bahasa">Bahasa</label>
                        <input type="text" name="bahasa" value="{{ old('bahasa', $databuku->bahasa) }}" id="bahasa" class="form-control mt-2">
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" class="form-control form-control-sm bg-dark" id="image" name="image" accept="image/*">
                    </div><br>

                    <div class="form-group">
                        @if(!empty($databuku->image))
                        <img id="image-preview" src="{{ asset('assets/backend/img/' . $databuku->image) }}" alt="{{ $databuku->judul }}" class="img-thumbnail" style="width: 150px;">
                        @else
                        <div class="text-center py-4">Tidak Ada Gambar</div>
                        @endif
                    </div><br>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('backend.buku')}}" class="btn btn-info">kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Ambil elemen input file
    var inputImage = document.getElementById('image');

    // Ambil elemen img pratinjau
    var imagePreview = document.getElementById('image-preview');

    // Editkan event listener untuk perubahan pada input file
    inputImage.addEventListener('change', function() {
        // Pastikan ada file yang dipilih
        if (inputImage.files && inputImage.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                // Set src gambar pratinjau dengan data URL gambar yang dipilih
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block'; // Tampilkan gambar pratinjau
            }

            // Baca file gambar sebagai data URL
            reader.readAsDataURL(inputImage.files[0]);
        } else {
            // Kosongkan gambar pratinjau jika tidak ada file yang dipilih
            imagePreview.src = '#';
            imagePreview.style.display = 'none'; // Sembunyikan gambar pratinjau
        }
    });
</script>
@endsection