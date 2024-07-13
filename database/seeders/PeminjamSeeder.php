<?php

namespace Database\Seeders;

use App\Models\Peminjam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeminjamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $peminjam = [
            [
                'nama' => 'rifki',
                'alamat' => 'bandung',
                'telephone' => '092888382',
                'user_id' => '4',
                'created_by' => 1,
                'updated_by' => 1,
            ]
        ];

        Peminjam::create([
            $peminjam[0]
        ]);
    }
}
