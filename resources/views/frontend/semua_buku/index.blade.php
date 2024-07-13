@extends('frontend.app')
@section('title', 'SemuaBuku')
@section('content')


<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-result bg-gray">
					<h2>Semua Buku</h2>
					<!-- <p>123 Results on 12 December, 2017-2022</p> -->
				</div>
			</div>
		</div>
		<div class="row">
        
		<div class="col-md-3">
				<div class="category-sidebar">
					<div class="widget category-list">
						<h4 class="widget-header">Semua Kategori</h4>
						<ul class="category-list">
							@foreach($allCategorys as $category)
							<li><a href="category.html">{{ $category->nama }}</a></li>
							@endforeach						
						</ul>
					</div>
				</div>
			</div>
            @foreach($buku as $book)

            <div class="col-sm-12 col-lg-3 col-md-6">
            <!-- product card -->
                <div class="product-item bg-light">
                    <div class="card">
                        <div class="thumb-content">
                            <!-- <div class="price">$200</div> -->
                            <a href="{{route('detailbuku.show', $book->id)}}">
                                <img class="card-img-top img-fluid" src="{{ url('assets/backend/img/'. $book->image) }}" alt="Card image cap">
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><a href="{{route('detailbuku.show', $book->id)}}">{{$book->judul}}</a></h4>
                            <ul class="list-inline product-meta">
                                <li class="list-inline-item">
                                    <a href=""><i class="fa fa-folder-open-o"></i>{{$book->nama}}</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href=""><i class="fa fa-calendar"></i>{{$book->created_at}}</a>
                                </li>
                            </ul>
                            <p class="card-text">{{($book->sinopsis)}}</p>
                            <div class="product-ratings">
                                <ul class="list-inline">
                                @if ($book->rating >= 90) 
										<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
										<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
										<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
										<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
										<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
									@elseif ($book->rating >= 80) 
										<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
										<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
										<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
										<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
									@elseif ($book->rating >= 70) 
										<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
										<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
										<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
									@elseif ($book->rating >= 60) 
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
</section>
@endsection