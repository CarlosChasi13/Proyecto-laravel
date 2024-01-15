<?php

namespace Database\Factories;

use App\Models\Periodosacademico;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PeriodosacademicoFactory extends Factory
{
    protected $model = Periodosacademico::class;

    public function definition()
    {
        return [
			'nivel' => $this->faker->name,
			'siglas' => $this->faker->name,
			'mes_inicio' => $this->faker->name,
			'año_inicio' => $this->faker->name,
			'mes_fin' => $this->faker->name,
			'año_fin' => $this->faker->name,
        ];
    }
}
