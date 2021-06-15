<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToTempatSampah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tempat_sampah', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreignId('id_administrator')->constrained('administrator')->onDelete('cascade');
            $table->foreignId('id_truk')->constrained('kendaraan_pengangkut_sampah')->onDelete('cascade');
            $table->foreignId('id_antares')->constrained('antares')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tempat_sampah', function (Blueprint $table) {
            $table->dropConstrainedForeignId('id_administrator');
            $table->dropConstrainedForeignId('id_truk');
            $table->dropConstrainedForeignId('id_antares');
        });
    }
}
