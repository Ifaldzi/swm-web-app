<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToPetugasKebersihan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('petugas_kebersihan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreignId('id_administrator')->constrained('administrator')->onDelete('cascade');
            $table->foreignId('id_truk')->constrained('kendaraan_pengangkut_sampah')->onDelete('cascade');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('petugas_kebersihan', function (Blueprint $table) {
            //
        });
    }
}
