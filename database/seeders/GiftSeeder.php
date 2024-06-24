<?php

namespace Database\Seeders;

use App\Models\Gift;
use App\Models\Wedding;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $wedding = Wedding::first();

        $gifts = [
            [
                'bank_name' => 'Mandiri',
                'account_number' => '123456789',
                'account_name' => 'Galang',
                'qr_code_image' => 'assets/img/qris-mpm-statis.png'
            ],
            [
                'bank_name' => 'BCA',
                'account_number' => '123456789',
                'account_name' => 'Galang',
                'qr_code_image' => 'assets/img/qris-mpm-statis.png'
            ]
        ];

        foreach ($gifts as $gift) {
            Gift::create([
                'wedding_id' => $wedding->id,
                'bank_name' => $gift['bank_name'],
                'account_number' => $gift['account_number'],
                'account_name' => $gift['account_name'],
                'qr_code_image' => $gift['qr_code_image']
            ]);
        }
    }
}
