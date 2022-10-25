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
        Schema::create('penerima_beasiswas', function (Blueprint $table) {
            $table->id('id_penerima_beasiswas');
            $table->foreignId('id_pendaftar_beasiswas')->constrained('pendaftar_beasiswas','id_pendaftar_beasiswas');
            $table->double('nilai_perhitungan', 15, 8);
            $table->enum('status', array('Lolos', 'Tidak Lolos'));
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
        Schema::dropIfExists('penerima_beasiswas');
    }
};
