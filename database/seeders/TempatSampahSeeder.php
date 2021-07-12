<?php

namespace Database\Seeders;

use App\Models\KendaraanPengangkutSampah;
use App\Models\Lokasi;
use App\Models\TempatSampah;
use Illuminate\Database\Seeder;

class TempatSampahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $id_truk = KendaraanPengangkutSampah::factory()->create();
        TempatSampah::insert([
            'id_truk' => $id_truk->id,
            'id_administrator' => 1,
            'device_name'=>'Trash-Bin-1',
            'volume_tempat_sampah'=>rand(100,1000),
            'tinggi_tempat_sampah'=>rand(10,200),
        ]);
        Lokasi::factory()->create();

        $id_truk = KendaraanPengangkutSampah::factory()->create();
        TempatSampah::insert([
            'id_truk' => $id_truk->id,
            'id_administrator' => 1,
            'device_name'=>'Esp_test',
            'volume_tempat_sampah'=>0.96,
            'tinggi_tempat_sampah'=>15,
        ]);
        Lokasi::factory()->create();

        $id_truk = KendaraanPengangkutSampah::factory()->create();
        TempatSampah::insert([
            'id_truk' => $id_truk->id,
            'id_administrator' => 1,
            'device_name'=>'Trash-Bin1-ESP',
            'volume_tempat_sampah'=>rand(100,1000),
            'tinggi_tempat_sampah'=>rand(10,200),
        ]);
        Lokasi::factory()->create();
    }
}
