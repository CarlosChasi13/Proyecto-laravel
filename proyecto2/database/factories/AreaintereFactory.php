<?php

namespace Database\Factories;

use App\Models\Areaintere;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AreaintereFactory extends Factory
{
    protected $model = Areaintere::class;

    public function definition()
    {
        return [
			'id_docente' => $this->faker->name,
			'id_areaconocimiento' => $this->faker->name,
			'tema' => $this->faker->name,
			'descripcion' => $this->faker->name,
        ];
    }
}
