<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PeminjamRequest;

class PeminjamBackendController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:peminjam-list|peminjam-create|peminjam-edit|peminjam-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:peminjam-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:peminjam-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:peminjam-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $peminjam = DB::table('peminjam')->paginate(5);

        return view('backend.peminjam.index', compact('peminjam'));
    }
    public function create()
    {
        return view('backend.peminjam.create');
    }
    public function store(PeminjamRequest $request)
    {
        // dd($request);
        DB::beginTransaction();
        $imageName = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/backend/img'), $imageName);
        }

        try {
            // Create a new user
            $user = User::create([
                'name' => $request->nama,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'image' => $imageName, // Make sure the image storage is configured properly
                'created_at' => \Carbon\Carbon::now(),
            ]);

            $user->assignRole('peminjam');

            // Create a new penulis related to the user
            DB::table('peminjam')->insertGetId([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'telphone' => $request->telphone,
                'user_id' => $user->id, // Assign the user_id
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();

            return redirect()->route('backend-index-Peminjam')->with('message', 'Data peminjam Berhasil Disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('backend-index-Peminjam')->with('error', 'Gagal menyimpan data: ' . $e->getMessage())->withErrors($e->getMessage());
        }
    }
    public function edit($id)
    {
        $datapeminjam = DB::table('peminjam')
            ->select('peminjam.*')
            ->where('peminjam.id', $id)
            ->first();

        if (!$datapeminjam) {
            return redirect()->route('backend-index-Peminjam')->with('error', 'Data peminjam tidak ditemukan');
        }

        return view('backend.peminjam.edit', compact('datapeminjam'));
    }


    // dd($request->all());
    public function update(Request $request, $id)
    {
        DB::table('peminjam')
            ->where('id', $id)
            ->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'telphone' => $request->telphone,
                'updated_at' => \Carbon\Carbon::now(),
            ]);

        return redirect()->route('backend-index-Peminjam')->with('message', 'Data peminjam berhasil diupdate');
    }

    public function destroy($id)
    {
        DB::table('peminjam')->where('id', $id)->delete();

        return redirect()->route('backend-index-Peminjam')->with('message', 'Data Peminjam Berhasil Dihapus');
    }
}
