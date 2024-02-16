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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->default(4)->after('email');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->unsignedBigInteger('sc_id')->nullable()->after('role_id');
            $table->foreign('sc_id')->references('id')->on('scs')->onDelete('cascade');
            $table->unsignedBigInteger('oc_id')->nullable()->after('sc_id');
            $table->foreign('oc_id')->references('id')->on('ocs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id', 'sc_id', 'oc_id']);
            $table->dropColumn(['role_id', 'sc_id', 'oc_id']);
        });
    }
};
