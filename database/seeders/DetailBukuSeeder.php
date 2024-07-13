<?php

namespace Database\Seeders;

use App\Models\DetailBuku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $detailBuku = [
            [
                'sinopsis' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium vero iure illo facere, blanditiis voluptas. Error voluptatem cum dolor cumque veniam! Hic in harum sit aliquid deleniti repellendus voluptatum quos pariatur aut incidunt suscipit quae assumenda veritatis, dolor nemo iure, nostrum eaque quam! Repellendus dignissimos dolorum corporis culpa a corrupti placeat accusantium eius consequuntur quas quidem facilis asperiores quaerat amet ut tempora officia, possimus quae natus porro ea iste dicta! Dolor unde minima delectus, cupiditate nobis distinctio voluptatem nihil tenetur? Odit, pariatur! Quae, quis, cum iste sapiente quam eius soluta omnis est optio animi odit nihil adipisci tempore? Perferendis, delectus.',
                'penerbit' => 'penerbit buku',
                'image' => 'url_image',
                'jumlah_halaman' => '23',
                'tanggal_terbit' => '10-20-2001',
                'isbn' => 'ksdjfasl333',
                'bahasa' => 'Indonesia',
                'buku' => '1',
            ],
            [
                'sinopsis' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium vero iure illo facere, blanditiis voluptas. Error voluptatem cum dolor cumque veniam! Hic in harum sit aliquid deleniti repellendus voluptatum quos pariatur aut incidunt suscipit quae assumenda veritatis, dolor nemo iure, nostrum eaque quam! Repellendus dignissimos dolorum corporis culpa a corrupti placeat accusantium eius consequuntur quas quidem facilis asperiores quaerat amet ut tempora officia, possimus quae natus porro ea iste dicta! Dolor unde minima delectus, cupiditate nobis distinctio voluptatem nihil tenetur? Odit, pariatur! Quae, quis, cum iste sapiente quam eius soluta omnis est optio animi odit nihil adipisci tempore? Perferendis, delectus.',
                'penerbit' => 'penerbit buku',
                'image' => 'url_image',
                'jumlah_halaman' => '23',
                'tanggal_terbit' => '10-20-2001',
                'isbn' => 'ksdjfasl333',
                'bahasa' => 'Matematika',
                'buku' => '2',
            ],
            [
                'sinopsis' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium vero iure illo facere, blanditiis voluptas. Error voluptatem cum dolor cumque veniam! Hic in harum sit aliquid deleniti repellendus voluptatum quos pariatur aut incidunt suscipit quae assumenda veritatis, dolor nemo iure, nostrum eaque quam! Repellendus dignissimos dolorum corporis culpa a corrupti placeat accusantium eius consequuntur quas quidem facilis asperiores quaerat amet ut tempora officia, possimus quae natus porro ea iste dicta! Dolor unde minima delectus, cupiditate nobis distinctio voluptatem nihil tenetur? Odit, pariatur! Quae, quis, cum iste sapiente quam eius soluta omnis est optio animi odit nihil adipisci tempore? Perferendis, delectus.',
                'penerbit' => 'penerbit buku',
                'image' => 'url_image',
                'jumlah_halaman' => '23',
                'tanggal_terbit' => '10-20-2001',
                'isbn' => 'ksdjfasl333',
                'bahasa' => 'Agama',
                'buku' => '3',
            ],
        ];

        foreach ($detailBuku as $key => $value) {
            DetailBuku::create([$value]);
        }
    }
}
