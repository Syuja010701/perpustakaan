@extends('frontend.app')

@section('content')
<section class="blog single-blog section">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
				<article class="single-post">
					<h3>WELCOME TO THE LIBRARY .</h3>
					<ul class="list-inline">
						<li class="list-inline-item">by <a href="{{route ('login') }}">Admin</a></li>
						<li class="list-inline-item">Nov 17, 2023</li>
					</ul>
					<img src="{{ url ('assets/frontend/images/perpus.jpg') }}" alt="article-01">
					<p>Perpusku.com adalah perpustakaan online terbesar dan terlengkap di Indonesia yang menyediakan aneka buku berkualitas, 
						banyak berbagaimacam buku yang tersedia. Dari cerita fiksi, non-fiksi, pendidikan dan referensi,
						seni dan fotografi, dan masih banyak lainya.
						.</p>

					<p>pada tahun 2023 hingga saat ini, Perpusku.com berkembang secara pesat.dan para pelanggan dapat membaca secara online dan online.

						Misi kami adalah meningkatkan literasi dan memberikan kemudahan akses pada dunia pengetahuan di seluruh Indonesia dengan memanfaatkan teknologi.</p>

					<p> Kenyamanan dan kepuasan para pembaca merupakan prioritas kami. Kami ingin memberikan pengalaman yang lebih kepada para pelanggan di saat pelanggan melakukan proses pembelanjaan baik online maupun offline, dengan terus mengembangkan fitur-fitur produk. 
						Memberikan pelayanan yang terbaik menjadi tujuan kami dengan dukungan manajemen yang proaktif dan kreatif.</p>

					<p>Di mana aku bisa menghubungi Customer Service?
					<p> Perlu bantuan? Hubungi kami di:</p>
					<p>Chat: Buka situs perpusku.com, dan klik ikon chat.</p>
					<p>Email: customercare@perpusku.com</p>
					<p>Facebook: Temui akun Facebook resmi kami di sini.</p>
					
					<ul class="social-circle-icons list-inline">
						<li class="list-inline-item text-center"><a class="fa fa-facebook" href="https://www.facebook.com/"></a></li>
						<li class="list-inline-item text-center"><a class="fa fa-twitter" href="https://www.twitter.com/"></a></li>
						<li class="list-inline-item text-center"><a class="fa fa-google-plus" href="https://www.google.com/"></a></li>
						<li class="list-inline-item text-center"><a class="fa fa-pinterest-p" href="https://id.pinterest.com/"></a></li>
						<li class="list-inline-item text-center"><a class="fa fa-linkedin" href=""></a></li>
					</ul>
				</article>
			</div>
		</div>
	</div>
</section>

@endsection