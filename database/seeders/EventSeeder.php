<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data Akad
        Event::create([
            'name' => 'Akad',
            'start_time' => '08:00:00',
            'end_time' => null, // Tidak ada waktu akhir untuk Akad
            'date' => Carbon::createFromFormat('Y-m-d', '2021-06-06'),
            'location_name' => 'Gedung Herlina Mutiara',
            'address' => 'Jl. Pramuka, Bojong, Karangtengah, Kabupaten Cianjur, Jawa Barat 43281',
        ]);

        // Data Resepsi
        Event::create([
            'name' => 'Resepsi',
            'start_time' => '10:00:00',
            'end_time' => '14:00:00',
            'date' => Carbon::createFromFormat('Y-m-d', '2021-06-06'),
            'location_name' => 'Gedung Herlina Mutiara',
            'address' => 'Jl. Pramuka, Bojong, Karangtengah, Kabupaten Cianjur, Jawa Barat 43281',
        ]);
    }
}
