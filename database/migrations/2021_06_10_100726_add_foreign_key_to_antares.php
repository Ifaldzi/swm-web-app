<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToAntares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('antares', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreignId('id_tempat_sampah')->constrained('tempat_sampah')->onDelete('cascade');
            $table->foreignId('id_truk')->constrained('kendaraan_pengangkut_sampah')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('antares', function (Blueprint $table) {
            $table->dropConstrainedForeignId('id_tempat_sampah');
            $table->dropConstrainedForeignId('id_truk');
        });
    }
}
