<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\DetailBuku;
use App\Models\Konfigurasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SemuaBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buku = DB::table('buku')->select('buku.id', 'detail_buku.image', 'kategori_buku.nama', 'buku.created_at', 'detail_buku.sinopsis', 'buku.rating', 'buku.judul')
            ->join('kategori_buku', 'kategori_buku.id', 'buku.kode_kategori')
            ->join('detail_buku', 'detail_buku.id_buku', 'buku.id')
            ->join('penulis', 'penulis.id', 'buku.id_penulis')
            // ->where()
            ->where('judul', 'LIKE', '%' . $request->search . '%')

            ->get();
        // dd(Buku::first(), DetailBuku::first());
        $allCategorys = DB::table('kategori_buku')->select('slug', 'nama')->get();
        $logo = Konfigurasi::value('logo_perpus');
        return view('frontend.semua_buku.index', compact('buku', 'allCategorys', 'logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug_kategori)
    {

        $buku = DB::table('buku')->select('penulis.nama as nama_penulis', 'detail_buku.image', 'kategori_buku.nama', 'buku.created_at', 'detail_buku.sinopsis', 'buku.rating')
            ->join('kategori_buku', 'kategori_buku.id', 'buku.kode_kategori')
            ->join('detail_buku', 'detail_buku.id_buku', 'buku.id')
            ->join('penulis', 'penulis.id', 'buku.id_penulis')
            ->where('slug', $slug_kategori)
            ->get();

        $allCategorys = DB::table('kategori_buku')->select('slug', 'nama')->get();

        $logo = Konfigurasi::value('logo_perpus');
        return view('frontend.semua_buku.show', compact('buku', 'allCategorys', 'logo'));
    }
    public function showBuku($id)
    {
        $bukudetail = DB::table('buku')
            ->select('buku.*', 'detail_buku.*', 'penulis.nama as nama_penulis', 'kategori_buku.nama as nama_kategori', 'buku.created_at')
            ->join('kategori_buku', 'kategori_buku.id', 'buku.kode_kategori')
            ->join('detail_buku', 'detail_buku.id_buku', 'buku.id')
            ->join('penulis', 'penulis.id', 'buku.id_penulis')
            ->where('detail_buku.id', $id)
            ->first();

        $logo = Konfigurasi::value('logo_perpus');
        // dd($bukudetail);


        return view('frontend.buku.show', compact('bukudetail', 'logo'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
