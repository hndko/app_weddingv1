<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Wedding;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MessageSeeder extends Seeder
{
    public function run()
    {
        $wedding = Wedding::first();

        $messages = [
            [
                'guest_name' => 'John Doe',
                'attendance' => 'Hadir',
                'message' => 'Selamat atas pernikahannya!',
                'created_at' => now()->subHours(9),
                'updated_at' => now()->subHours(9),
            ],
            [
                'guest_name' => 'Jane Doe',
                'attendance' => 'Tidak Hadir',
                'message' => 'Maaf tidak bisa hadir, semoga bahagia selalu.',
                'created_at' => now()->subHours(9),
                'updated_at' => now()->subHours(9),
            ],
            [
                'guest_name' => 'Jane Doe',
                'attendance' => 'Tidak Hadir',
                'message' => 'Maaf tidak bisa hadir, semoga bahagia selalu.',
                'created_at' => now()->subHours(9),
                'updated_at' => now()->subHours(9),
            ],
            [
                'guest_name' => 'Jane Doe',
                'attendance' => 'Tidak Hadir',
                'message' => 'Maaf tidak bisa hadir, semoga bahagia selalu.',
                'created_at' => now()->subHours(9),
                'updated_at' => now()->subHours(9),
            ],
            [
                'guest_name' => 'Jane Doe',
                'attendance' => 'Tidak Hadir',
                'message' => 'Maaf tidak bisa hadir, semoga bahagia selalu.',
                'created_at' => now()->subHours(9),
                'updated_at' => now()->subHours(9),
            ],
            [
                'guest_name' => 'Jane Doe',
                'attendance' => 'Tidak Hadir',
                'message' => 'Maaf tidak bisa hadir, semoga bahagia selalu.',
                'created_at' => now()->subHours(9),
                'updated_at' => now()->subHours(9),
            ],
            [
                'guest_name' => 'Jane Doe',
                'attendance' => 'Tidak Hadir',
                'message' => 'Maaf tidak bisa hadir, semoga bahagia selalu.',
                'created_at' => now()->subHours(9),
                'updated_at' => now()->subHours(9),
            ],
            [
                'guest_name' => 'Jane Doe',
                'attendance' => 'Tidak Hadir',
                'message' => 'Maaf tidak bisa hadir, semoga bahagia selalu.',
                'created_at' => now()->subHours(9),
                'updated_at' => now()->subHours(9),
            ],
            [
                'guest_name' => 'Jane Doe',
                'attendance' => 'Tidak Hadir',
                'message' => 'Maaf tidak bisa hadir, semoga bahagia selalu.',
                'created_at' => now()->subHours(9),
                'updated_at' => now()->subHours(9),
            ],
            [
                'guest_name' => 'Jane Doe',
                'attendance' => 'Tidak Hadir',
                'message' => 'Maaf tidak bisa hadir, semoga bahagia selalu.',
                'created_at' => now()->subHours(9),
                'updated_at' => now()->subHours(9),
            ],
            [
                'guest_name' => 'Jane Doe',
                'attendance' => 'Tidak Hadir',
                'message' => 'Maaf tidak bisa hadir, semoga bahagia selalu.',
                'created_at' => now()->subHours(9),
                'updated_at' => now()->subHours(9),
            ],
            [
                'guest_name' => 'Jane Doe',
                'attendance' => 'Tidak Hadir',
                'message' => 'Maaf tidak bisa hadir, semoga bahagia selalu.',
                'created_at' => now()->subHours(9),
                'updated_at' => now()->subHours(9),
            ]
        ];

        foreach ($messages as $message) {
            Message::create([
                'wedding_id' => $wedding->id,
                'guest_name' => $message['guest_name'],
                'attendance' => $message['attendance'],
                'message' => $message['message'],
                'created_at' => $message['created_at'],
                'updated_at' => $message['updated_at'],
            ]);
        }
    }
}
