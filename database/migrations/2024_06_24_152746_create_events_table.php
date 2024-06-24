<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama acara (Akad/Resepsi)
            $table->time('start_time'); // Waktu mulai acara
            $table->time('end_time')->nullable(); // Waktu akhir acara (opsional)
            $table->date('date'); // Tanggal acara
            $table->string('location_name'); // Nama tempat acara
            $table->text('address'); // Alamat lengkap acara
            $table->timestamps(); // Menyimpan created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
