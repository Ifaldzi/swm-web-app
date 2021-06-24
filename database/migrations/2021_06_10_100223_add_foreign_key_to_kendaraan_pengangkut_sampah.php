<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToKendaraanPengangkutSampah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kendaraan_pengangkut_sampah', function (Blueprint $table) {
            $table->dropConstrainedForeignId('id_antares');
        });
    }
}
