<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function register(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        // $imageName = null;

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('assets/backend/img'), $imageName);
        // }

        try {
            // Create a new user
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                // 'image' => $imageName, // Make sure the image storage is configured properly
                'created_at' => \Carbon\Carbon::now(),

            ]);

            $user->assignRole('peminjam');

            // Create a new penulis related to the user
            DB::table('peminjam')->insert([
                'nama' => $request->name,
                'alamat' => $request->alamat ?? '',
                'telphone' => $request->telphone ?? '',
                'user_id' => $user->id, // Assign the user_id
                'created_by' => Auth::user()->id ?? 1,
                'updated_by' => Auth::user()->id ?? 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();

            return redirect()->route('frontend.home')->with('message', 'Anda Berhasil Register');
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
            // return redirect()->route('frontend.home')->with('error', 'Gagal menyimpan data: ' . $e->getMessage())->withErrors($e->getMessage());
        }
    }

    public function login(Request $request)
    {
        $user = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            if ($user->role('Administrator')) {
                return redirect()->route('backend.home')->with('message', 'Anda Berhasil Login');
            }
            return redirect()->route('frontend.home')->with('message', 'Anda Berhasil Login');
        } else {
            return redirect()->route('frontend.home')->with('message', 'Anda Gagal Login');
        }
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('frontend.home');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show($id)
    {
        //
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
