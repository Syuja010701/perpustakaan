<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'buku-list',
            'buku-create',
            'buku-detail',
            'buku-edit',
            'buku-delete',

            'peminjaman-list',
            'peminjaman-detail',
            'peminjaman-edit',
            'peminjaman-create',
            'peminjaman-delete',


            'kategori-list',
            'kategori-create',
            'kategori-edit',
            'kategori-delete',

            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'konfigurasi-list',
            'konfigurasi-create',
            'konfigurasi-edit',
            'konfigurasi-delete',

            'penulis-list',
            'penulis-create',
            'penulis-detail',
            'penulis-edit',
            'penulis-delete',

            'pesan-list',
            'pesan-destroy',

            'dashboard',

            'list-pinjaman',

            'peminjam-list',
            'peminjam-create',
            'peminjam-detail',
            'peminjam-edit',


        ];



        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['name' => $permission],
                ['name' => $permission]
            );
        }
        $peminjam = Role::updateOrCreate(['name' => 'peminjam'], ['name' => 'peminjam']);
        $peminjam->syncPermissions('list-pinjaman');
    }
}
