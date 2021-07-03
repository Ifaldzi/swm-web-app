<?php

namespace Database\Factories;

use App\Models\KendaraanPengangkutSampah;
use App\Models\TempatSampah;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Type\Integer;

class TempatSampahFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TempatSampah::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'volume_tempat_sampah' =>  rand(1000,10000),
            'tinggi_tempat_sampah' =>  rand(15,100),
            'device_name' => $this->faker->name(),
            'id_administrator' => 1,
            'id_truk'=>KendaraanPengangkutSampah::factory(),
        ];

    }
}
