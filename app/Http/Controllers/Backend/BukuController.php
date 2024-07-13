<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\auth;
use App\Http\Requests\BukuRequest;
use App\Models\DetailBuku;

class BukuController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:buku-list|buku-create|buku-edit|buku-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:buku-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:buku-edit', ['only' => ['edit', 'update', 'show']]);
        $this->middleware('permission:buku-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $buku = DB::table('buku')
            ->select(
                'buku.*',
                'penulis.nama as nama_penulis',
                'kategori_buku.nama as nama_kategori',
            )
            ->join('penulis', 'penulis.id', 'buku.id_penulis')
            ->join('kategori_buku', 'kategori_buku.id', 'buku.kode_kategori')
            ->orderBy('buku.id', 'DESC')
            ->paginate(5);
        return view('backend.buku.index', compact('buku'));
    }

    public function create()
    {
        // Mengambil data jenis barang dari tabel _m_s_t__jenis__barang
        $kategoriBuku = DB::table('kategori_buku')->get();
        $penulisBuku = DB::table('penulis')->get();

        // Menghitung jumlah total barang yang ada
        $totalBuku = DB::table('buku')->count();

        return view('backend.buku.create', compact('kategoriBuku', 'penulisBuku', 'totalBuku'));
    }

    public function store(BukuRequest $request)
    {
        // dd($request);
        // DB::beginTransaction();

        try {
            // Image handling

            $imageName = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/backend/img'), $imageName);
            }

            // Buku insertion
            $buku = Buku::create([
                'kode_kategori' => $request->kategori_id,
                'judul' => $request->judul,
                'stok' => $request->stok,
                'rating' => $request->rating,
                'id_penulis' => $request->penulis_id,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);


            // Detail Buku insertion
            $detailBuku =  DetailBuku::create([
                'sinopsis' => $request->sinopsis,
                'penerbit' => $request->penerbit,
                'image' => $imageName,
                'jumlah_halaman' => $request->jumlah_halaman,
                'tanggal_terbit' => $request->tanggal_terbit,
                'isbn' => $request->isbn,
                'bahasa' => $request->bahasa,
                'id_buku' => $buku->id,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);

            return redirect()->route('backend.buku')->with('message', 'Buku Berhasil Diajukan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $databuku = DB::table('buku')
            ->select('buku.*', 'detail_buku.sinopsis', 'detail_buku.penerbit', 'detail_buku.image', 'detail_buku.jumlah_halaman', 'detail_buku.tahggal_terbit', 'detail_buku.isbn', 'detail_buku.bahasa', 'detail_buku.id_buku')
            ->join('detail_buku', 'buku.id', '=', 'detail_buku.id_buku')
            ->where('buku.id', $id)
            ->first();

        $kategoriBuku = DB::table('kategori_buku')->get();
        $penulisBuku = DB::table('penulis')->get();

        if (!$databuku) {
            return redirect()->route('backend.buku')->with('error', 'Data buku tidak ditemukan');
        }

        return view('backend.buku.edit', compact('databuku', 'kategoriBuku', 'penulisBuku'));
    }
    public function update(BukuRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $buku = DB::table('buku')->where('id', $id)->first();

            if (!$buku) {
                return redirect()->route('backend.edit_buku', $id)->with('error', 'Data buku tidak ditemukan');
            }

            DB::table('buku')->where('id', $id)->update([
                'kode_kategori' => $request->kategori_id,
                'judul' => $request->judul,
                'stok' => $request->stok,
                'rating' => $request->rating,
                'id_penulis' => $request->penulis_id,
                'updated_by' => auth()->user()->id,
                'updated_at' => \Carbon\Carbon::now(),
            ]);

            $detailBuku = DB::table('detail_buku')->where('id_buku', $id)->first();

            if (!$detailBuku) {
                return redirect()->route('backend.edit_buku', $id)->with('error', 'Detail buku tidak ditemukan');
            }

            $data = [
                'sinopsis' => $request->sinopsis,
                'penerbit' => $request->penerbit,
                'jumlah_halaman' => $request->jumlah_halaman,
                'tahggal_terbit' => $request->tahggal_terbit,
                'isbn' => $request->isbn,
                'bahasa' => $request->bahasa,
                'updated_at' => \Carbon\Carbon::now(),
            ];

            if ($request->hasFile('image')) {
                $oldImageName = $detailBuku->image;

                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/backend/img'), $imageName);

                if ($oldImageName) {
                    $oldImagePath = public_path('assets/backend/img') . '/' . $oldImageName;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $data['image'] = $imageName;
            }

            DB::table('detail_buku')->where('id_buku', $id)->update($data);

            DB::commit();
            return redirect()->route('backend.buku')->with('message', 'Buku Berhasil Diedit');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('backend.edit_buku', $id)->with('error', 'Gagal memperbarui data: ' . $e->getMessage())->withErrors($e->getMessage());
        }
    }

    public function show($id)
    {
        $detailBuku = DB::table('buku')
            ->select(
                'buku.*',
                'detail_buku.sinopsis',
                'detail_buku.penerbit',
                'detail_buku.jumlah_halaman',
                'detail_buku.tahggal_terbit',
                'detail_buku.isbn',
                'detail_buku.bahasa',
                'detail_buku.id_buku',
                'penulis.nama',
                'detail_buku.image as gambar',
            )
            ->join('detail_buku', 'buku.id', '=', 'detail_buku.id_buku')
            ->join('penulis', 'penulis.id', '=', 'buku.id_penulis')
            ->where('buku.id', $id)
            ->first();

        if ($detailBuku) {
            return view('backend.buku.show', compact('detailBuku'));
        } else {
            return redirect()->route('backend.buku')->with('error', 'Data buku tidak ditemukan');
        }
    }


    public function destroy($id)
    {
        DB::table('buku')->where('id', $id)->delete();

        return redirect()->route('backend.buku')->with('message', 'Buku Berhasil Dihapus');
    }
}
