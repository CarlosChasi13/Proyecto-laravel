<?php

namespace Database\Factories;

use App\Models\Periodoacademico;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PeriodoacademicoFactory extends Factory
{
    protected $model = Periodoacademico::class;

    public function definition()
    {
        return [
			'id_grado' => $this->faker->name,
			'id_sigla' => $this->faker->name,
			'fecha_inicio' => $this->faker->name,
			'fecha_fin' => $this->faker->name,
        ];
    }
}
