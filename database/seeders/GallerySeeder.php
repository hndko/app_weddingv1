<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\Wedding;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wedding = Wedding::first();

        $images = [
            'assets/img/album1.png',
            'assets/img/album2.png',
        ];

        foreach ($images as $image) {
            Gallery::create([
                'wedding_id' => $wedding->id,
                'image' => $image,
            ]);
        }
    }
}
