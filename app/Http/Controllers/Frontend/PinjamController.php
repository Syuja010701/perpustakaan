<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Konfigurasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:list-pinjaman', ['only' => ['show']]);
    }
    public function index($id_buku)
    {
        // Logika atau pemrosesan lainnya untuk halaman peminjaman
        $logo = Konfigurasi::value('logo_perpus');
        return view('frontend.pinjaman.index', compact('id_buku', 'logo'));
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
        $getIdPeminjam = DB::table('peminjam')->select('id')->where('user_id', Auth::user()->id)->first();

        $tanggal_pinjam = \Carbon\Carbon::parse($request->tgl_peminjaman);
        $tanggal_kembali = \Carbon\Carbon::parse($request->tgl_pengembalian);
        $selisih_hari = $tanggal_pinjam->diffInDays($tanggal_kembali);

        if ($selisih_hari > 7) {
            return redirect()->back()->with('message', 'Tidak Boleh Meminjam Melebihi Dari 7 Hari');
        }

        DB::table('buku')->where('id', $request->id_buku)->increment('rating');

        DB::table('buku')->where('id', $request->id_buku)->decrement('stok', (int) $request->total_buku);

        $id_transaksi = DB::table('transaksi')->insertGetId([
            'tanggal_pinjam' => $request->tgl_peminjaman,
            'tanggal_kembali' => $request->tgl_pengembalian,
            'total' => $request->total_buku,
            'status' => 0,
            'id_peminjam' => $getIdPeminjam->id,
            'created_by' => Auth::user()->id ?? 1,
            'updated_by' => Auth::user()->id ?? 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),

        ]);

        DB::table('detail_transakasi')->insert([
            'id_buku' => $request->id_buku,
            'telat_pengembalian' => 0,
            'denda' => 0,
            'id_transaksi' => $id_transaksi,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('frontend.list.pinjaman', Auth::user()->id);
    }

    /**;
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_user)
    {
        // dd($id_user);
        if (Auth::check()) {
            $detail_transaksi = DB::table('detail_transakasi')
                ->where('transaksi.created_by', $id_user)
                ->select('detail_transakasi.id', 'detail_transakasi.updated_at', 'detail_transakasi.created_at', 'transaksi.tanggal_kembali', 'transaksi.status', 'judul',  'telat_pengembalian', 'denda', 'id_transaksi')
                ->join('transaksi', 'transaksi.id', 'detail_transakasi.id_transaksi')
                ->join('buku', 'buku.id', 'detail_transakasi.id_buku')
                ->paginate(10);
            $logo = Konfigurasi::value('logo_perpus');
            return view('frontend.pinjaman.listpinjaman', compact('detail_transaksi', 'logo'));
        } else {
            return "Login Dulu gehh";
        }
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
