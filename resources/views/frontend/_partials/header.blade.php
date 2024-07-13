<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg  navigation">
                    <a class="navbar-brand" href="index.html">
                        <img src="{{ $logo ? asset('storage/images/logo_perpus/' . $logo) : url('assets/frontend/images/logo-eperpus.png') }}"
                            alt="" style="width: 180px;">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto main-nav ">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.home') }}">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.tentang') }}">Tentang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.kategori') }}">Kategori</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.semuabuku') }}">Semua Buku</a>
                            </li>
                            @role('peminjam')
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('frontend.list.pinjaman', auth()->user()->id) }}">List
                                        Pinjaman</a>
                                </li>
                            @endrole()
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.kontak') }}">Kontak</a>
                            </li>


                        </ul>

                        <ul class="navbar-nav ml-auto mt-10">
                            @if (Auth::check())
                                <a href="{{ route('frontend.logout') }}" class="btn btn-secondary fa fa-arrow-left">
                                    Logout
                                </a>
                            @else
                                <button type="button" class="btn btn-primary fa fa-plus-circle mr-2"
                                    data-toggle="modal" data-target="#exampleModal">
                                    Login
                                </button>
                            @endif
                            @if (!Auth::check())
                                <button type="button" class="btn btn-info fa fa-plus-circle" data-toggle="modal"
                                    data-target="#modalRegisterForm">
                                    Register
                                </button>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="text-center mt-4">
                    <h5 class="modal-title" id="exampleModalLabel">Silahkan Login</h5>
                    <p><strong>Masukkan Email dan Password Anda </strong></p>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('frontend.login') }}" class="pl-2 pr-2">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email">Email </label>
                            <input class="form-control" type="email" name="email"id="email" required=""
                                placeholder="Masukan Email Anda">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password1">Password</label>
                            <input class="form-control" type="password" name="password" required="" id="password1"
                                placeholder="Masukan Password Anda">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Login</a>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalRegisterForm" tabindex="-1" aria-labelledby="myModalLabel"aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="text-center mt-4">
                    <h5 class="modal-title ">Silahkan Register</h5>
                    <p><strong>Masukkan Name, Username, Email dan Password Anda </strong></p>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('frontend.register') }}" class="pl-2 pr-2">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Name </label>
                            <input class="form-control" type="name" name="name" id="name" required=""
                                placeholder="Masukan Name Anda">
                        </div>
                        <div class="form-group mb-3">
                            <label for="username">Username </label>
                            <input class="form-control" type="username" name="username" id="username"
                                required="" placeholder="Masukan Username Anda">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email </label>
                            <input class="form-control" type="email" name="email"id="email" required=""
                                placeholder="Masukan Email Anda">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password1">Password</label>
                            <input class="form-control" type="password" name="password" required=""
                                id="password1" placeholder="Masukan Password Anda">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Register</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
