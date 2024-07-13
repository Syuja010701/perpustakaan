<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller; //load post model
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:pesan-list|pesan-create|pesan-edit|pesan-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:pesan-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $pesan = Message::latest()->paginate(7);
        return view('backend.pesan.index', compact('pesan'));
    }

    public function destroy($id)
    {
        DB::table('kategori')->where('id', $id)->delete();

        return redirect()->route('backend.kategori')->with('message', 'Data Barang Berhasil Dihapus');
    }
}
