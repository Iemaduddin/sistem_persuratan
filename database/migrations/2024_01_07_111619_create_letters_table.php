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
        Schema::create('letters', function (Blueprint $table) {
            $table->id();
            $table->integer('nomor_surat');
            $table->string('department');
            $table->string('singkatan_nama_kegiatan');
            $table->string('kode_unik');
            $table->string('nama_kegiatan');
            $table->string('hari_kegiatan');
            $table->date('tanggal_kegiatan');
            $table->string('jam_mulai');
            $table->string('jam_selesai');
            $table->string('contact_person');
            $table->integer('jumlah_lampiran')->nullable();
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
        Schema::dropIfExists('letters');
    }
};
