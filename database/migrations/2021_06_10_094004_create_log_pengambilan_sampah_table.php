<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogPengambilanSampahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_pengambilan_sampah', function (Blueprint $table) {
            $table->id();
            $table->dateTime('waktu_penuh');
            $table->dateTime('waktu_pengambilan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_pengambilan_sampah');
    }
}
