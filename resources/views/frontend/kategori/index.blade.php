@extends('frontend.app')

@section('content')

<body>
    <div class="col-12">
        <!-- Section title -->
        <div class="section-title">
            <h2>Semua Kategori</h2>
            <p>Cari Produk, Judul Buku, Penulis yang ada di Perpustakaan. 
                <br>Ayo Pilih yang kamu inginkan!</p>
        </div>
        <div class="row">
            <!-- Category list -->
            @foreach($kategori as $kate)
            <div class="col-lg-4 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
            <a href="{{ route('frontend.show.kategori', $kate->slug) }}">
                <div class="category-block">
                    <div class="header">
                        <i class="fa fa-laptop icon-bg-1"></i>
                        <h4>{{($kate->nama)}} </h4>                           
                    </div>
                </div>
            </a>
            </div>
            @endforeach
        </div>

    </div>
</body>
@endsection