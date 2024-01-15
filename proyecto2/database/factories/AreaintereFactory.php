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
			'tema' => $this->faker->name,
			'descripcion' => $this->faker->name,
			'id_docente' => $this->faker->name,
        ];
    }
}
