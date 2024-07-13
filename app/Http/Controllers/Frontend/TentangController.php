<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Konfigurasi;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index()

    {
        return view('frontend.tentang.index', [
            'logo' =>  Konfigurasi::value('logo_perpus')
        ]);
    }
}
