<?php

namespace Database\Factories;

use App\Models\Lokasi;
use App\Models\TempatSampah;
use Illuminate\Database\Eloquent\Factories\Factory;

class LokasiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lokasi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $long = 107.688080;
        $lang = -6.526319;
        // -6.526613, 107.688170
        $tempatSampah = TempatSampah::all();
        foreach ($tempatSampah as $tempat_sampah ) {
            $id = $tempat_sampah;
        }

        return [
        'id_tempat_sampah'=>$id,
        'alamat'=>"subang",
        "latitude" => $this->faker->latitude(
            $min = ($lang * 10000 - rand(0, 50)) / 10000,
            $max = ($lang * 10000 + rand(0, 50)) / 10000
        ),
        "longitude" => $this->faker->longitude(
            $min = ($long * 10000 - rand(0, 50)) / 10000,
            $max = ($long * 10000 + rand(0, 50)) / 10000
        ),
        ];
    }
}
