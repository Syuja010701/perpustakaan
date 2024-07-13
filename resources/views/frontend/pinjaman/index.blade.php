@extends('frontend.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        @guest
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5>
                    Anda Harus Login Terlebih Dahulu !
                </h5>
            </div>
        @endguest
        @if (Session::has('message'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5>
                    <i class="icon fas fa-check"></i> Gagal!
                </h5>
                {{ Session('message') }}
            </div>
        @endif
        {{-- @endif --}}
        <div class=" rounded h-100 p-4 text-light">
            <h2 class="mb-4">Tambah Peminjam</h2>
            <form method="post" action="{{ route('frontend.pinjam.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $id_buku }}" name="id_buku">
                <div class="mb-3">
                    <label for="tgl_peminjaman" class="form-label">Tanggal Peminjaman</label>
                    <input type="date" class="form-control" value="{{ old('tgl_peminjaman') }}" name="tgl_peminjaman"
                        id="tgl_peminjaman" required oninput="tanggalKembali()">
                </div>
                <div class="mb-3">
                    <label for="tgl_pengembalian" class="form-label">Tanggal Pengembalian</label>
                    <input type="date" class="form-control" value="{{ old('tgl_pengembalian') }}" name="tgl_pengembalian"
                        id="tgl_pengembalian" required>
                </div>
                <div class="mb-3">
                    <label for="total_buku" class="form-label">Total Buku yang Dipinjam</label>
                    <input type="number" class="form-control" value="{{ old('total_buku') }}" name="total_buku"
                        id="total_buku" required>
                </div><br>
                @auth
                    <button type="submit" class="btn btn-primary">Simpan</button>
                @endauth
                <a href="{{ url()->previous() }}" class="btn btn-info">Kembali</a>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function tanggalKembali() {
            // Mendapatkan tanggal peminjaman
            var tanggalPinjam = new Date($('#tgl_peminjaman').val());

            // Menambahkan 7 hari (1 minggu) ke tanggal peminjaman
            var tanggalKembali = new Date(tanggalPinjam);
            tanggalKembali.setDate(tanggalPinjam.getDate() + 7);

            // Format tanggal dalam bentuk yang diinginkan (YYYY-MM-DD)
            var formattedDate = tanggalKembali.toISOString().split('T')[0];

            // Set nilai tanggal pengembalian
            $('#tgl_pengembalian').val(formattedDate);
        }
    </script>
@endsection
