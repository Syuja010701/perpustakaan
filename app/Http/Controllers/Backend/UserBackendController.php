<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UsersUpdateRequest;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserBackendController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['deleteUser']]);
    }
    // public function index()
    // {
    //     $users = DB::table('users')
    //         ->select(
    //             'users.*',
    //         )
    //         ->orderBy('users.id', 'DESC')
    //         ->paginate(5);

    //     return view('backend.user.index', compact('users'));
    // }

    public function index()
    {
        $users = User::with('roles')->paginate(5);

        // Menggunakan metode map untuk membuat alias role_name
        $users->map(function ($user) {
            $user->role_name = $user->roles->pluck('name')->implode(', ');
            return $user;
        });

        return view('backend.user.index', compact('users'));
    }

    public function create()
    {
        $roles = DB::table('roles')->get();
        return view('backend.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Contoh validasi untuk file gambar
        ]);

        // Jika validasi gagal, kembalikan dengan pesan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Tangani upload gambar
        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/backend/img'), $imageName);
        }

        // Simpan data ke database
        $userData = [   
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'image' => $imageName,
        ];

        $user = User::create($userData);
        $user->assignRole($request->input('roles'));

        return redirect()->route('backend-index-user')->with('message', 'Users Berhasil Disimpan!');
    }

    public function edit($id)
    {
        // Mengambil data user yang akan diedit berdasarkan ID menggunakan model User
        $editUser = User::find($id);

        // Mengambil semua roles yang tersedia
        $roles = Role::pluck('name', 'id'); // Menggunakan id sebagai value

        // Mengambil roles yang dimiliki oleh pengguna yang akan diedit
        $userRole = $editUser->roles->pluck('id')->all();

        // Arahkan ke halaman edit dengan data pengguna, roles, dan userRole
        return view('backend.user.edit', compact('editUser', 'roles', 'userRole'));
    }

    public function update(UsersUpdateRequest $request, $id)
    {

        // dd($request->input('roles'));
        $data = $request->all();
        // dd($data);
        //  [
        //     'name' => $request->name,
        //     'username' => $request->username,
        //     'email' => $request->email,
        //     'updated_at' => now(),
        // ];

        // Tangani upload gambar
        if ($request->hasFile('image')) {
            $editUser = DB::table('users')->where('id', $id)->select('image')->first();
            $oldImageName = $editUser->image;

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/backend/img'), $imageName);

            // Hapus gambar lama jika ada
            if ($oldImageName !== null) {
                $oldImagePath = public_path('assets/backend/img') . '/' . $oldImageName;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }


            $data['image'] = $imageName;

            // dd($data);

            // Cek apakah password diubah
            if (!empty($request->password)) {
                $data['password'] = bcrypt($request->password);
            } else {
                $data = Arr::except($data, array('password'));
            }

            $user = User::find($id);
            $user->update($data);
            $user->roles()->detach();
            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $user->roles()->sync($request->input('roles'));

            return redirect()->route('backend-index-user')->with('message', 'User berhasil diperbarui!');
        } else {
            // Cek apakah password diubah
            if (!empty($request->password)) {
                $data['password'] = bcrypt($request->password);
            } else {
                $data = Arr::except($data, array('password'));
            }

            $user = User::find($id);
            $user->update($data);
            $user->roles()->detach();
            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $user->roles()->sync($request->input('roles'));


            return redirect()->route('backend-index-user')->with('message', 'User berhasil diperbarui!');
        }
    }

    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('backend-index-user')->with('message', 'Jenis Barang Berhasil Dihapus!');
    }
}
