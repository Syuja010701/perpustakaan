@extends('frontend.app')
@section('title', 'Beranda')
@section('content')
<section class="hero-area bg-1 text-center overly" style="background: url('assets/frontend/images/perpus.jpg');">
	<!-- Container Start --> 
	@if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" style="position: fixed; top: 10px; right: 10px; z-index: 1000;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5>
                <i class="icon fas fa-check"></i> Sukses!
            </h5>
            {{ Session('message')}}
        </div>
        @endif
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Selamat Datang di Perpustakaan </h1>
					<p>Selamat datang di Aplikasi Perpustakaan Terbaru! 
					<br>"Jelajahi dunia literasi dengan sentuhan ujung jari Anda. Temukan keajaiban pengetahuan dan pelajaran yang tak terbatas. Mari bersama-sama membangun budaya membaca yang lebih cemerlang" 
					<br> Selamat menikmati petualangan literasi Anda!</p>
					<div class="short-popular-category-list text-center">					
						<h2>Popular Kategori</h2>
						<ul class="list-inline">
							@foreach($kategori as $kate)
								<li class="list-inline-item">
								<a href="{{ route('frontend.show.kategori', $kate->slug) }}">
								<i class="fa fa-book"></i> {{($kate->nama)}}</a></li>
							@endforeach
						</ul>	
					</div>
					<div class="row">
            		<!-- Category list -->
        		</div>
			</div>
			
				<!-- Advance Search -->
			<div class="advance-search">
				<form action="{{ route('frontend.semuabuku')}}" method="GET">
					<div class="row">
						<!-- Store Search -->
						<div class="col-lg-12 col-md-12">
							<div class="block d-flex">
								<input type="text" name="search" class="form-control mb-2 mr-sm-2 mb-sm-0" id="search" placeholder="Search for book">
								<!-- Search Button -->
								<button type="submit" class="btn btn-primary">SEARCH</button>
							</div>
						</div>
					</div>
				</form>
			</div>	
		</div>
	</div>
	<!-- Container End -->
</section>

<!--===================================
=            Client Slider            =
====================================-->


<!--===========================================
=            Popular deals section            =
============================================-->

<section class="section-sm">
	<div class="container">
		<div class="search-result bg-gray">
			<div class="section-title">
				<h2>Buku-Buku Terpopuler</h2>
				<p>Ayo Pilih yang kamu inginkan!</p>
			</div>
			<div class="row">
				@foreach($ratingTertinggi as $rater)
				<div class="col-sm-12 col-lg-4 col-md-12">
				<!-- product card -->
					<div class="product-item bg-light">
						<div class="card">
							<div class="thumb-content">
								<!-- <div class="price">$200</div> -->
								<a href="{{ route('frontend.semuabuku')}}">
									<img class="card-img-top img-fluid" src="{{ url('assets/backend/img/'. $rater->image) }}" alt="Card image cap">
								</a>
							</div>
							<div class="card-body">
								<h4 class="card-title"><a href="{{ route('frontend.semuabuku')}}">{{$rater->nama_penulis}}</a></h4>
								<ul class="list-inline product-meta">
									<li class="list-inline-item">
										<a href=""><i class="fa fa-folder-open-o"></i>{{$rater->nama}}</a>
									</li>
									<li class="list-inline-item">
										<a href=""><i class="fa fa-calendar"></i>{{$rater->created_at}}</a>
									</li>
								</ul>
								<p class="card-text">{{$rater->sinopsis}}</p>
								<div class="product-ratings">
									<ul class="list-inline">									
										@if ($rater->rating >= 90) 
											<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
											<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
											<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
											<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
											<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
										@elseif ($rater->rating >= 80) 
											<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
											<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
											<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
											<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
										@elseif ($rater->rating >= 70) 
											<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
											<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
											<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
										@elseif ($rater->rating >= 60) 
											<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
											<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
										@else 
											<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
										@endif
									</ul>
								</div>
							</div>
						</div>
					</div>             
				</div>
				@endforeach                            
			</div>
		</div>
    </div>
</section>

<!--==========================================
=            All Category Section            =
===========================================-->

<body>
    <div class="col-12">
        <!-- Section title -->
        <div class="section-title">
            <h2>Semua Kategori</h2>
            <p>Cari Produk, Judul Buku, Penulis yang ada di Perpustakaan. Ayo Pilih yang kamu inginkan!</p>
        </div>
        <div class="row">
            <!-- Category list -->
            @foreach($ratingTertinggi as $rater)
            <div class="col-lg-4 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
            <a href="{{ route('frontend.show.kategori', $kate->slug) }}">
                <div class="category-block">
                    <div class="header">
                        <i class="fa fa-laptop icon-bg-1"></i>
                        <h4>{{($rater->nama)}} </h4>                           
                    </div>
                </div>
            </a>
            </div>
            @endforeach
        </div>

    </div>
</body>

@endsection