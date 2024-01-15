<?php

namespace Database\Factories;

use App\Models\Nrc;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NrcFactory extends Factory
{
    protected $model = Nrc::class;

    public function definition()
    {
        return [
			'nrc' => $this->faker->name,
			'id_campus' => $this->faker->name,
			'id_departamento' => $this->faker->name,
			'id_materia' => $this->faker->name,
			'id_docentes' => $this->faker->name,
			'id_periodoacademico' => $this->faker->name,
        ];
    }
}
