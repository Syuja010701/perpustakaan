<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller; //load post model
use App\Models\Konfigurasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\KonfigurasiRequest;

class KonfigurasiController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:konfigurasi-list|konfigurasi-create|konfigurasi-edit|konfigurasi-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:konfigurasi-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:konfigurasi-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:konfigurasi-delete', ['only' => ['destroy']]);
    }


    public function index()
    {
        $konfigurasi = Konfigurasi::latest()->paginate(7);
        return view('backend.konfigurasi.index', compact('konfigurasi'));
    }
    public function create()
    {
        return view('backend.konfigurasi.create');
    }
    public function store(KonfigurasiRequest $request)
    {
        $logo_perpus = '';
        if ($request->hasFile('logo')) {
            $imageName = time() . '.' . $request->logo->getClientOriginalExtension();
            $request->logo->storeAs('public/images/logo_perpus', $imageName);

            $logo_perpus = $imageName;
        }

        DB::table('konfigurasi')->insert([
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'maps' => $request->maps,
            'logo_perpus' => $logo_perpus,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        return redirect()->route('backend-index-konfigurasi')->with('message', 'Konfigurasi Berhasil Disimpan');
    }
    public function destroy($id)
    {
        DB::table('konfigurasi')->where('id', $id)->delete();

        return redirect()->route('backend-index-konfigurasi')->with('message', 'Data Konfigurasi Berhasil Dihapus');
    }
    public function edit($id)
    {

        $editKonfigurasi = DB::table('konfigurasi')->where('id', $id)->first();

        return view('backend.konfigurasi.edit', compact('editKonfigurasi'));
    }
    public function update(KonfigurasiRequest $request, $id)
    {
        // dd($request);
        $logo_perpus = '';
        if ($request->hasFile('logo')) {
            $imageName = time() . '.' . $request->logo->getClientOriginalExtension();
            $request->logo->storeAs('public/images/logo_perpus', $imageName);

            $logo_perpus = $imageName;
        }

        DB::table('konfigurasi')->where('id', $id)->update([
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'maps' => $request->maps,
            'logo_perpus' => $logo_perpus,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        return redirect()->route('backend-index-konfigurasi')->with('message', 'Data Konfigurasi di Update');
    }
}
