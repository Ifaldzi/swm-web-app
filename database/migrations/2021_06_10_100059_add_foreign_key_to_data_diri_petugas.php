<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToDataDiriPetugas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_diri_petugas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreignId('id_petugas')->constrained('petugas_kebersihan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_diri_petugas', function (Blueprint $table) {
            $table->dropConstrainedForeignId('id_petugas');
        });
    }
}
