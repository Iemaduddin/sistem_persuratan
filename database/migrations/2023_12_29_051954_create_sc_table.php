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
        Schema::create('scs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nif')->unique();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->enum('jk', ['Pria', 'Wanita']);
            $table->enum('prodi', ['D4 Teknik Informatika', 'D4 Sistem Informasi Bisnis']);
            $table->string('department');
            $table->string('foto')->nullable();
            $table->string('no_hp')->nullable();
            $table->enum('role', ['Sekum', 'SC Kestari']);
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
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
        Schema::dropIfExists('sc');
    }
};
