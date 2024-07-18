<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:dashboard', ['only' => ['index']]);
    }
    public function index()
    {
        $counttotaluserpenulis = DB::table('penulis')->get('id')->count();
        $counttotaluserpeminjam = DB::table('peminjam')->get('id')->count();
        $counttotalbuku = DB::table('buku')->get('id')->count();
        $counttotalkategori = DB::table('kategori_buku')->get('id')->count();

        $dt_min = new DateTime("last sunday");
        $dt_min->modify('+1 day');
        $dt_max = clone ($dt_min);
        $dt_max->modify('+6 days');

        $dt_min->format('m/d/Y');
        $dt_max->format('m/d/Y');

        $peminjaman = Transaksi::get();

        // dd($peminjaman);

        return view('backend.home.index', compact('counttotaluserpenulis', 'counttotaluserpeminjam', 'counttotalbuku', 'counttotalkategori'));
    }

    public function handleChart()
    {

        $transaksiBulanan = DB::table('transaksi')
            ->select(DB::raw("SUM(total) as total"), DB::raw("MONTH(created_at) as bulan"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->get();

        $dataGrafikBulanan = $transaksiBulanan->map(function ($item) {
            return [
                'bulan' => $item->bulan,
                'total' => $item->total,
            ];
        });

        $dt_min = new DateTime("last sunday");
        $dt_min->modify('+1 day');
        $dt_max = clone ($dt_min);
        $dt_max->modify('+6 days');

        $startOfWeek = $dt_min->format('Y-m-d 00:00:00');
        $endOfWeek = $dt_max->format('Y-m-d 23:59:59');

        $transaksiMingguan = DB::table('transaksi')
            ->select(DB::raw("SUM(total) as total"), DB::raw("DAYOFWEEK(created_at) as hari"))
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->groupBy(DB::raw("DAYOFWEEK(created_at)"))
            ->get();

        $dataGrafikMingguan = $transaksiMingguan->map(function ($item) {
            $hariMapping = [
                1 => 7, // Minggu
                2 => 1, // Senin
                3 => 2, // Selasa
                4 => 3, // Rabu
                5 => 4, // Kamis
                6 => 5, // Jumat
                7 => 6, // Sabtu
            ];

            return [
                'hari' => $hariMapping[$item->hari],
                'total' => $item->total,
            ];
        });

        return response()->json([
            'bulanan' => $dataGrafikBulanan,
            'mingguan' => $dataGrafikMingguan
        ]);
    }



    public function profile()
    {
        return view('backend.home.profil');
    }
}
