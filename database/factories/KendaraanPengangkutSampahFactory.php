<?php

namespace Database\Factories;

use App\Models\KendaraanPengangkutSampah;
use Illuminate\Database\Eloquent\Factories\Factory;

class KendaraanPengangkutSampahFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = KendaraanPengangkutSampah::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'device_name'=>$this->faker->name(),
            'kapasitas_pengangkut_sampah'=> rand(10000,100000),
        ];
    }
}
