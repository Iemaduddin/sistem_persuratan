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
        Schema::create('ocs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim')->unique();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->enum('jk', ['Pria', 'Wanita'])->nullable();
            $table->enum('prodi', ['D4 Teknik Informatika', 'D4 Sistem Informasi Bisnis'])->nullable();
            $table->string('department')->nullable();
            $table->string('foto')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('status_request', ['Accepted', 'Rejected'])->nullable();
            $table->enum('status_keaktifan', ['Aktif', 'Pasif'])->nullable();
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
        Schema::dropIfExists('oc');
    }
};
