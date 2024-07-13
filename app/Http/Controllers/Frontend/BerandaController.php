<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Konfigurasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
  public function index()
  {

    $buku = DB::table('buku')->select('penulis.nama as nama_penulis', 'detail_buku.image', 'kategori_buku.nama', 'buku.created_at', 'detail_buku.sinopsis', 'buku.rating')
      ->join('kategori_buku', 'kategori_buku.id', 'buku.kode_kategori')
      ->join('detail_buku', 'detail_buku.id_buku', 'buku.id')
      ->join('penulis', 'penulis.id', 'buku.id_penulis')
      // ->join('rating','rating.id','buku.rating')
      // ->where('slug', $slug_kategori)
      ->get();

    $kategori = DB::table('kategori_buku')->select('slug', 'nama')->get();
    // $ratings = DB::table('buku')->select('rating', DB::raw('count(id) as count'))
    // ->groupBy('rating')
    // ->get();

    $ratingTertinggi = DB::table('buku')->select('penulis.nama as nama_penulis', 'detail_buku.image', 'kategori_buku.nama', 'buku.created_at', 'detail_buku.sinopsis', 'buku.rating')
      ->join('kategori_buku', 'kategori_buku.id', 'buku.kode_kategori')
      ->join('detail_buku', 'detail_buku.id_buku', 'buku.id')
      ->join('penulis', 'penulis.id', 'buku.id_penulis')
      ->orderBy('rating', 'DESC')->take(3)->get();

    $logo = Konfigurasi::value('logo_perpus');

    // $ratingTertinggi = DB::table('buku')->select('slug', 'kategori_buku.nama')
    // ->join('kategori_buku', 'kategori_buku.id', 'buku.kode_kategori')
    // ->join('detail_buku','detail_buku.id_buku','buku.id')
    // ->join('penulis','penulis.id','buku.id_penulis')
    // ->orderBy('rating', 'DESC')->take(3)->get();

    // dd($ratingTertinggi);

    // dd($ratings);
    // return "OK";
    return view('frontend.beranda.index', compact(
      'buku',
      'kategori',
      'ratingTertinggi',
      'logo',
    ));
  }

  //     public function searchResult(Request $request)
  // {
  //   $buku = DB::table('buku')->select('penulis.nama as nama_penulis','detail_buku.image','kategori_buku.nama','buku.created_at','detail_buku.sinopsis','buku.rating')
  //         ->join('kategori_buku', 'kategori_buku.id', 'buku.kode_kategori')
  //         ->join('detail_buku','detail_buku.id_buku','buku.id')
  //         ->join('penulis','penulis.id','buku.id_penulis')
  //         // ->where()
  //         ->where('judul', 'LIKE', '%'.$request->search.'%')
  //         ->get();

  //   return view('frontend.semua_buku.index', compact('buku'));

  // }
}
