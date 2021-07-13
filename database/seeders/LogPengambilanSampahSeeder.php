<?php

namespace Database\Seeders;

use App\Models\KendaraanPengangkutSampah;
use App\Models\LogPengambilanSampah;
use App\Models\TempatSampah;
use Illuminate\Database\Seeder;

class LogPengambilanSampahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LogPengambilanSampah::factory()->count(1000)
        ->create();
    }
}
