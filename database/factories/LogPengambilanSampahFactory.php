<?php

namespace Database\Factories;

use App\Models\KendaraanPengangkutSampah;
use App\Models\LogPengambilanSampah;
use App\Models\TempatSampah;
use Illuminate\Database\Eloquent\Factories\Factory;

class LogPengambilanSampahFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LogPengambilanSampah::class;

    /**
     * fDefine the model's deault state.
     *
     * @return array
     */
    public function definition()
    {
        $tempatSampah = TempatSampah::all();
        $truk = KendaraanPengangkutSampah::all();
        $startDate = $this->faker->dateTimeBetween('-1 year','now');
        $startDateClone = clone $startDate;
        $endDate = $this->faker->dateTimeBetween($startDate, $startDateClone->modify('+1 hours'));
        return [
            'id_tempat_sampah'=>$tempatSampah->random()->id,
            'id_truk'=>$truk->random()->id,
            'waktu_penuh'=>$startDate,
            'waktu_pengambilan'=>$endDate
        ];
    }
}
