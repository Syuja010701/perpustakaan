<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PeminjamanBackendController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:peminjaman-list|peminjaman-create|peminjaman-edit|peminjaman-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:peminjaman-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:peminjaman-edit', ['only' => ['edit', 'update', 'pengembalian']]);
        $this->middleware('permission:peminjaman-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $peminjaman = DB::table('transaksi')
            ->select(
                'transaksi.*',
                'peminjam.nama'
            )
            ->join('peminjam', 'peminjam.id', 'transaksi.id_peminjam')
            ->orderBy('transaksi.id', 'DESC')
            ->paginate(5);


        return view('backend.peminjaman.index', compact('peminjaman'));
    }

    public function pengembalian($id_transaksi)
    {
        // Dapatkan informasi transaksi dan detail transaksi
        $transaksi = DB::table('transaksi')->find($id_transaksi);
        $detailTransaksis = DB::table('detail_transakasi')->where('id_transaksi', $id_transaksi)->get();

        // Validasi ID transaksi
        if (!$transaksi || $detailTransaksis->isEmpty()) {
            return redirect()->route('backend-index-transaksi')->with('error', 'Transaksi tidak ditemukan atau detail transaksi kosong.');
        }

        // Hitung jumlah hari keterlambatan
        $tanggalKembali = strtotime(Carbon::parse($transaksi->tanggal_kembali));
        $tanggalPengembalian = strtotime(Carbon::now()->toDateString());

        // Hitung denda (5000 per hari terlambat)
        $jarak = $tanggalPengembalian - $tanggalKembali;
        $telatHari = $jarak / 60 / 60 / 24;
        $denda = $telatHari * 5000;

        // Hitung jumlah total buku yang dikembalikan
        $totalBukuDikembalikan = $transaksi->total;

        // Update detail transaksi dengan informasi telat_pengembalian dan denda
        DB::table('detail_transakasi')->where('id_transaksi', $id_transaksi)->update([
            'telat_pengembalian' => max(0, $telatHari), // Telat Pengembalian (hari)
            'denda' => $denda, // Jumlah denda
            'updated_at' => now(),
        ]);

        // Kurangkan stok buku dengan jumlah buku yang dipinjam
        DB::table('buku')->where('id', $detailTransaksis->first()->id_buku)->increment('stok', (int) $totalBukuDikembalikan);

        DB::table('transaksi')->where('id', $id_transaksi)->update([
            'status' => 1, // 0 : BELUM DI KEMBALIKAN 1 : SUDAH DIKEMBALIKAN
        ]);

        return redirect()->route('backend-index-transaksi')->with('message', 'Buku berhasil dikembalikan.');
    }

    public function downloadPdf()
    {
        $peminjaman =
            DB::table('detail_transakasi')
            ->select('detail_transakasi.id', 'detail_transakasi.updated_at', 'transaksi.total', 'detail_transakasi.created_at', 'peminjam.nama', 'transaksi.tanggal_kembali', 'transaksi.status', 'judul',  'telat_pengembalian', 'denda', 'id_transaksi')
            ->join('transaksi', 'transaksi.id', 'detail_transakasi.id_transaksi')
            ->join('buku', 'buku.id', 'detail_transakasi.id_buku')
            ->join('peminjam', 'peminjam.id', 'transaksi.id_peminjam')
            ->get();
        $pdf = PDF::loadView('backend.peminjaman.pdf', compact('peminjaman'))->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "list-pinjaman.pdf"
        );
        // return view('backend.peminjaman.pdf', com    pact('peminjaman'));
    }
}
