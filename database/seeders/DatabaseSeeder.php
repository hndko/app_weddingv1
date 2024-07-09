<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\GiftSeeder;
use Database\Seeders\EventSeeder;
use Database\Seeders\StorySeeder;
use Database\Seeders\GallerySeeder;
use Database\Seeders\MessageSeeder;
use Database\Seeders\WeddingSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Super',
            'last_name' => 'Admin',
            'password' => 'admin123',
            'email' => 'admin@gmail.com',
        ]);

        $this->call([
            EventSeeder::class,
            WeddingSeeder::class,
            StorySeeder::class,
            GallerySeeder::class,
            GiftSeeder::class,
            MessageSeeder::class,
        ]);
    }
}
