<?php

namespace Database\Seeders;

use App\Models\Konfigurasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KonfigurasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Konfigurasi::create([
            'email' => 'rifki@gmail.com',
            'no_telepon' =>  '09238890812830912',
            'alamat' => 'bandung',
            'maps' => 'bandung',
        ]);
    }
}
