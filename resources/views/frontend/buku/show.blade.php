@extends('frontend.app')

@section('content')
    <!-- Section for Novel Religi -->

    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">

                <div class="img-box">
                    <img class="card-img-top img-fluid img-medium" src="{{ url('assets/backend/img/' . $bukudetail->image) }}"
                        alt="" data-category="religi" width="50px" height="150px">
                </div>
            </div>
            <div class="col-md-8">
                <div class="detail-box bg-light p-4">
                    <div class="heading_container mb-4">
                        @if ($bukudetail->stok <= 0)
                            <div class="alert alert-danger alert-dismissible">

                                <h5>
                                    Buku Sudah Kehabisan stok!
                                </h5>
                                {{ Session('message') }}
                            </div>
                        @endif
                        <h2 class="text-primary">
                            Detail Buku
                        </h2>
                    </div>
                    <div class="card">
                        <div class="thumb-content">
                            <!-- <div class="price">$200</div> -->
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><a href="" class="text-primary"> {{ $bukudetail->judul }}</a></h4>

                            <!-- Additional Book Details -->
                            <ul class="list-unstyled">
                                <li class="mb-2">Kategori : {{ $bukudetail->nama_kategori }}</li>
                                <li class="mb-2">Penulis : {{ $bukudetail->nama_penulis }}</li>
                                <li class="mb-2">Jumlah Halaman : {{ $bukudetail->jumlah_halaman }}</li>
                                <li class="mb-2">Tanggal Terbit : {{ $bukudetail->tanggal_terbit }}</li>
                                <li class="mb-2">Isbn : {{ $bukudetail->isbn }}</li>
                                <li class="mb-2">Bahasa : {{ $bukudetail->bahasa }}</li>
                                <li class="mb-2">Penerbit : {{ $bukudetail->penerbit }}</li>
                                <li class="mb-2">Sinopsis : {{ $bukudetail->sinopsis }}</li>
                                <li class="mb-2">Stok : {{ $bukudetail->stok }}</li>
                            </ul>

                            <div class="product-ratings mt-4">
                                <ul class="list-inline">
                                    <!-- Additional details if needed -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    @if ($bukudetail->stok > 0)
                        <a class="btn btn-info mt-3" href="{{ route('frontend.pinjam', $id_buku) }}">
                            Pinjam
                        </a>
                    @endif


                </div>
            </div>
        </div>
    </div>
@endsection
