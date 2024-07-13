<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Konfigurasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = DB::table('kategori_buku')->select('id', 'nama', 'slug')->get();
        $logo = Konfigurasi::value('logo_perpus');
        return view('frontend.kategori.index', compact('kategori', 'logo'));
    }

    // BukuController.php
    public function show($slug_kategori)
    {
        $buku = DB::table('buku')
            ->select('penulis.nama as nama_penulis', 'detail_buku.*', 'kategori_buku.nama', 'buku.created_at')
            ->join('kategori_buku', 'kategori_buku.id', 'buku.kode_kategori')
            ->join('detail_buku', 'detail_buku.id_buku', 'buku.id')
            ->join('penulis', 'penulis.id', 'buku.id_penulis')
            ->where('slug', $slug_kategori)
            ->get();
        $logo = Konfigurasi::value('logo_perpus');

        $allCategorys = DB::table('kategori_buku')->select('slug', 'nama')->get();

        return view('frontend.kategori.show', compact('buku', 'allCategorys', 'logo'));
    }

    public function showBuku($id_buku)
    {
        $logo = Konfigurasi::value('logo_perpus');

        $bukudetail = DB::table('buku')
            ->select('buku.*', 'detail_buku.*', 'penulis.nama as nama_penulis', 'kategori_buku.nama as nama_kategori', 'buku.created_at')
            ->join('kategori_buku', 'kategori_buku.id', 'buku.kode_kategori')
            ->join('detail_buku', 'detail_buku.id_buku', 'buku.id')
            ->join('penulis', 'penulis.id', 'buku.id_penulis')
            ->where('detail_buku.id', $id_buku)
            ->first();


        // dd($bukudetail);


        return view('frontend.buku.show', compact('bukudetail', 'id_buku', 'logo'));
    }
}
