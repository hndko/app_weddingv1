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
        Schema::create('weddings', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Title of the wedding
            $table->string('groom_name'); // Groom's name
            $table->string('bride_name'); // Bride's name
            $table->date('wedding_date'); // Wedding date
            $table->text('invitation_message'); // Invitation message
            $table->text('quran_verse')->nullable(); // Quran verse
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weddings');
    }
};
