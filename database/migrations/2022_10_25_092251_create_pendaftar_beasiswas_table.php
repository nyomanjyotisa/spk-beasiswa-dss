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
        Schema::create('pendaftar_beasiswas', function (Blueprint $table) {
            $table->id('id_pendaftar_beasiswas');
            $table->string('nama');
            $table->enum('kelamin', array('Perempuan', 'Laki-laki'));
            $table->string('nik');
            $table->string('telpon');
            $table->string('alamat');
            $table->foreignId('id_provinsis')->constrained('provinsis','id_provinsis');
            $table->foreignId('id_kotas')->constrained('kotas','id_kotas');
            $table->enum('kondisi_rumah', array('Milik Sendiri', 'Kontrak'));
            $table->double('ip', 15, 8);
            $table->double('ipk', 15, 8);
            $table->double('penghasilan_orangtua', 15, 8);
            $table->double('tanggungan_orangtua', 15, 8);
            $table->double('nilai_perhitungan', 15, 8)->nullable();
            $table->string('periode_tahun');
            $table->string('periode_bulan');
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
        Schema::dropIfExists('pendaftar_beasiswas');
    }
};
