<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Story;
use App\Models\Wedding;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wedding = Wedding::first();

        Story::create([
            'wedding_id' => $wedding->id,
            'title' => 'Pertama bertemu',
            'date' => Carbon::createFromFormat('Y-m-d', '2020-01-14'),
            'description' => 'Waktu Pertama Kali Kulihat Dirimu Hadir Rasa hati ini inginkan dirimu',
            'image' => 'assets/img/album1.png',
        ]);

        Story::create([
            'wedding_id' => $wedding->id,
            'title' => 'Jatuh Cinta',
            'date' => Carbon::createFromFormat('Y-m-d', '2020-03-15'),
            'description' => 'Hati tenang mendengar suara indah menyapa Geloranya hati ini Tak ku sangka..',
            'image' => 'assets/img/album2.png',
        ]);
    }
}
