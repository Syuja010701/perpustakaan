<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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

        return view('backend.home.index', compact('counttotaluserpenulis', 'counttotaluserpeminjam', 'counttotalbuku', 'counttotalkategori'));
    }
    public function handleChart()
    {
        $transactionData = DB::table('transaksi')
            ->select(DB::raw("COUNT(*) as count"), DB::raw("MONTH(created_at) as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->pluck('count');

        $months = DB::table('transaksi')
            ->select(DB::raw("MONTH(created_at) as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->pluck('month');

        // Create an array containing data for each month
        $chartData = [];
        foreach ($months as $month) {
            $chartData[] = [
                'month' => $month,
                'count' => $transactionData->shift(),
            ];
        }

        return response()->json($chartData);
    }

    public function profile()
    {
        return view('backend.home.profil');
    }
}
