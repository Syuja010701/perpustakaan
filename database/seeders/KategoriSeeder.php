<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
            [
                'nama' => 'Bahasa',
                'keterangan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto a id, impedit sed tempora inventore nam eaque, nemo repudiandae sapiente necessitatibus pariatur ullam modi vel adipisci aperiam earum quia fugiat!',
                'slug' => 'bahasa'
            ],
            [
                'nama' => 'Matematika',
                'keterangan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto a id, impedit sed tempora inventore nam eaque, nemo repudiandae sapiente necessitatibus pariatur ullam modi vel adipisci aperiam earum quia fugiat!',
                'slug' => 'matematika'
            ],
            [
                'nama' => 'Agama',
                'keterangan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto a id, impedit sed tempora inventore nam eaque, nemo repudiandae sapiente necessitatibus pariatur ullam modi vel adipisci aperiam earum quia fugiat!',
                'slug' => 'agama'
            ],
        ];

        foreach ($kategori as $key => $value) {
            Kategori::create([
                'nama' => $value['nama'],
                'keterangan' => $value['keterangan'],
                'slug' => $value['slug'],
            ]);
        }
    }
}
