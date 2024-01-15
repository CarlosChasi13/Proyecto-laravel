<?php

namespace Database\Factories;

use App\Models\Rolopcione;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RolopcioneFactory extends Factory
{
    protected $model = Rolopcione::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'descripcion' => $this->faker->name,
        ];
    }
}
