<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Konfigurasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function show($id_buku)
    {
        $bukudetail = DB::table('buku')->select('buku.*', 'detail_buku.*', 'penulis.nama as nama_penulis', 'detail_buku.image', 'kategori_buku.nama as nama_kategori', 'buku.created_at', 'detail_buku.sinopsis')
            ->join('kategori_buku', 'kategori_buku.id', 'buku.kode_kategori')
            ->join('detail_buku', 'detail_buku.id_buku', 'buku.id')
            ->join('penulis', 'penulis.id', 'buku.id_penulis')
            ->where('buku.id', $id_buku)
            ->first();
        $logo = Konfigurasi::value('logo_perpus');
        // dd($bukudetail);

        // if ($bukudetail) {
        return view('frontend.buku.show', compact('bukudetail', 'logo', 'id_buku'));
        // } else {

        // return view('frontend.buku.show');
    }
}

   
// }
