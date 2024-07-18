<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    // ROUTE FRONTEND
    Route::get('/', 'Frontend\BerandaController@index')->name('frontend.home');
    Route::post('registrasi', 'Frontend\LoginController@register')->name('frontend.register');
    Route::post('front-login', 'Frontend\LoginController@login')->name('frontend.login');
    Route::get('front-logout', 'Frontend\LoginController@logout')->name('frontend.logout');
    Route::get('tentang', 'Frontend\TentangController@index')->name('frontend.tentang');
    Route::get('kategoris', 'Frontend\KategoriController@index')->name('frontend.kategori');
    Route::get('kontak', 'Frontend\kontakController@index')->name('frontend.kontak');
    Route::post('pesan', 'Frontend\kontakController@store')->name('frontend.pesan');
    Route::get('semua-buku', 'Frontend\SemuaBukuController@index')->name('frontend.semuabuku');
    Route::get('search-buku', 'Frontend\BerandaController@searchResult')->name('frontend.search.buku');
    // Route::get('tampilbuku', 'Frontend\BerandaController@show')->name('frontend.beranda.buku');


    Route::get('show-kategori/{slug_kategori}', 'Frontend\KategoriController@show')->name('frontend.show.kategori');
    Route::get('/show-buku/{id}', 'Frontend\KategoriController@showBuku')->name('show.buku');
    Route::get('detailbuku/{id}', 'Frontend\BukuController@show')->name('detailbuku.show');
    Route::get('pinjambuku/{id_buku}', 'Frontend\PinjamController@index')->name('frontend.pinjam');
    Route::get('list-pinjaman/{id}', 'Frontend\PinjamController@show')->name('frontend.list.pinjaman');
    Route::post('pinjam', 'Frontend\PinjamController@store')->name('frontend.pinjam.store');
    Route::get('frontend/download-pdf', 'Frontend\PinjamController@downloadPDF')->name('frontend.download-pdf');


    // SEMUA YANG ADA DI DALAM GROUP MIDDLEWARE ITU HARUS MELALUI PROSES LOGIN
    Route::group(['middleware' => ['auth']], function () {
        //Users
        Route::get('users', 'Backend\UserBackendController@index')->name('backend-index-user');
        Route::get('tambah_user', 'Backend\UserBackendController@create')->name('backend-create-user');
        Route::POST('store_user', 'Backend\UserBackendController@store')->name('backend-store-user');
        Route::get('/edit_user/{id}', 'Backend\UserBackendController@edit')->name('backend-edit-user');
        Route::post('/update_user/{id}', 'Backend\UserBackendController@update')->name('backend-update-user');
        Route::get('/delete_user/{id}', 'Backend\UserBackendController@destroy')->name('backend-delete-user');

        // ROUTE home
        Route::get('home', 'Backend\HomeController@index')->name('backend.home');
        Route::get('/char', 'Backend\HomeController@handleChart')->name('char');
        Route::get('profil', 'Backend\HomeController@profile')->name('backend.profil');
        // Route::get('my_profile', 'Backend\HomeController@profile')->name('backend.my_profile');


        // Route Kategori
        Route::get('kategori', 'Backend\KategoriController@index')->name('backend.kategori');
        Route::get('tambah-kategori', 'Backend\KategoriController@create')->name('backend.tambah.kategori');
        Route::post('/store-kategori', 'Backend\KategoriController@store')->name('store_kategori');
        Route::get('delete-kategori/{id}', 'Backend\KategoriController@destroy')->name('delete_kategori');
        Route::get('edit-kategori/{id}', 'Backend\KategoriController@edit')->name('edit_kategori');
        Route::post('/update-kategori/{id}', 'Backend\KategoriController@update')->name('update_kategori');

        // Route Konfigurasi
        Route::get('konfigurasi', 'Backend\KonfigurasiController@index')->name('backend-index-konfigurasi');
        Route::get('tambah-konfigurasi', 'Backend\KonfigurasiController@create')->name('backend.tambah.konfigurasi');
        Route::post('/store-konfigurasi', 'Backend\KonfigurasiController@store')->name('store_konfigurasi');
        Route::get('delete-konfigurasi/{id}', 'Backend\KonfigurasiController@destroy')->name('delete_konfigurasi');
        Route::get('edit-konfigurasi/{id}', 'Backend\KonfigurasiController@edit')->name('edit_konfigurasi');
        Route::put('/update-konfigurasi/{id}', 'Backend\KonfigurasiController@update')->name('update_konfigurasi');

        // Route Buku
        Route::get('buku', 'Backend\BukuController@index')->name('backend.buku');
        Route::get('create_buku', 'Backend\BukuController@create')->name('backend-buku-create');
        Route::post('store_buku', 'Backend\BukuController@store')->name('backend-buku-store');
        Route::get('edit_buku/{id}', 'Backend\BukuController@edit')->name('backend.edit_buku');
        Route::post('update_buku/{id}', 'Backend\BukuController@update')->name('backend.update_buku');
        Route::get('show_buku/{id}', 'Backend\BukuController@show')->name('backend.show_buku');
        Route::get('delete_buku/{id}', 'Backend\BukuController@destroy')->name('backend.delete_buku');

        // Route Penulis
        Route::get('penulis', 'Backend\PenulisController@index')->name('backend.penulis');
        Route::get('create_penulis', 'Backend\PenulisController@create')->name('backend.create_penulis');
        Route::post('store_penulis', 'Backend\PenulisController@store')->name('backend.store_penulis');
        Route::get('edit_penulis/{id}', 'Backend\PenulisController@edit')->name('backend.edit_penulis');
        Route::get('delete_penulis/{id}', 'Backend\PenulisController@destroy')->name('backend.delete_penulis');
        Route::post('update_penulis/{id}', 'Backend\PenulisController@update')->name('backend.update_penulis');
        Route::get('show_penulis/{id}', 'Backend\PenulisController@show')->name('backend.show_penulis');

        // peminjam
        Route::get('peminjam', 'Backend\PeminjamBackendController@index')->name('backend-index-Peminjam');
        Route::get('create_peminjam', 'Backend\PeminjamBackendController@create')->name('backend-create-peminjam');
        Route::post('store_peminjam', 'Backend\PeminjamBackendController@store')->name('backend-store-peminjam');
        Route::get('edit_peminjam/{id}', 'Backend\PeminjamBackendController@edit')->name('backend-edit-peminjam');
        Route::post('update_peminjam/{id}', 'Backend\PeminjamBackendController@update')->name('backend-update-peminjam');
        Route::get('delete_peminjam/{id}', 'Backend\PeminjamBackendController@destroy')->name('backend-delete-peminjam');

        // Route Pesan
        Route::get('pesan', 'Backend\PesanController@index')->name('backend-index-pesan');
        Route::get('delete-pesan/{id}', 'Backend\PesanController@destroy')->name('delete_pesan');

        // Route Peminjaman
        Route::get('transaksi', 'Backend\PeminjamanBackendController@index')->name('backend-index-transaksi');
        Route::get('show_peminjaman/{id}', 'Backend\PeminjamanBackendController@show')->name('backend-show-peminjaman');
        Route::get('pengembalian_peminjaman/{id}', 'Backend\PeminjamanBackendController@pengembalian')->name('backend-pengembalian-peminjaman');
        Route::get('delete-peminjaman/{id}', 'Backend\PeminjamanBackendController@destroy')->name('delete_peminjaman');
        Route::get('download-pdf', 'Backend\PeminjamanBackendController@downloadPdf')->name('backend-peminjam-download-pdf');

        // Route Roles
        Route::resource('roles', RoleController::class);
    });
});

Auth::routes();
