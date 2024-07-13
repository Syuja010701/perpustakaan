<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buku = [
            [
                'kode_kategori' => 1,
                'judul' => 'Bahasa Indonesia',
                'stok' => 10,
                'rating' =>  4,
                'id_penulis' => 1,
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'kode_kategori' => 2,
                'judul' => 'Matematika Dasar',
                'stok' => 20,
                'rating' =>  3,
                'id_penulis' => 2,
                'created_by' => 2,
                'updated_by' => 2
            ], [
                'kode_kategori' => 3,
                'judul' => 'Akidah Akhlak',
                'stok' => 5,
                'rating' =>  5,
                'id_penulis' => 3,
                'created_by' => 3,
                'updated_by' => 3
            ],
        ];

        foreach ($buku as $key => $value) {
            Buku::create([
                'kode_kategori' => 3,
                'judul' => $value['judul'],
                'stok' => $value['stok'],
                'rating' =>  $value['rating'],
                'id_penulis' => $value['id_penulis'],
                'created_by' => $value['created_by'],
                'updated_by' => $value['updated_by']
            ]);
        }
    }
}
