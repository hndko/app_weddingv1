<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Bride;
use App\Models\Groom;
use App\Models\Wedding;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WeddingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data pernikahan
        $wedding = Wedding::create([
            'title' => 'The Wedding Of Arty & Atep',
            'groom_name' => 'Atep Jaenudin',
            'bride_name' => 'Arty Artya Melinda',
            'wedding_date' => Carbon::createFromFormat('Y-m-d', '2021-06-06'),
            'invitation_message' => "Assalamu'alaikum warahmatullahi wabarakatuh\nIzinkan kami mengundang sekaligus mengharapkan doa restu dari bapak/ibu dan rekan-rekan dalam acara pernikahan kami",
            'quran_verse' => "Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu isteri-isteri dari jenismu sendiri, supaya kamu cenderung dan merasa tenteram kepadanya, dan dijadikan-Nya diantaramu rasa kasih dan sayang. Sesungguhnya pada yang demikian itu benar-benar terdapat tanda-tanda bagi kaum yang berfikir. QS Ar-Rum : 21",
        ]);

        // Data mempelai pria
        Groom::create([
            'wedding_id' => $wedding->id,
            'name' => 'Atep Jaenudin',
            'image' => 'assets/img/groom.png?nocache=1440',
            'description' => 'Putra dari : Bapak H Enyang & Ibu H Atik',
        ]);

        // Data mempelai wanita
        Bride::create([
            'wedding_id' => $wedding->id,
            'name' => 'Arty Artya Melinda',
            'image' => 'assets/img/bride.png?nocache=1440',
            'description' => 'Putri dari : Bapak Arbi Sahtiadin & Ibu Oneng Nurhayati',
        ]);
    }
}
