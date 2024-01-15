<?php

namespace Database\Factories;

use App\Models\Materia;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MateriaFactory extends Factory
{
    protected $model = Materia::class;

    public function definition()
    {
        return [
			'codigo' => $this->faker->name,
			'id_curso' => $this->faker->name,
			'nombre' => $this->faker->name,
			'descripcion' => $this->faker->name,
			'horas_creditos' => $this->faker->name,
			'horas_teoria' => $this->faker->name,
			'horas_laboratorio' => $this->faker->name,
			'horas_otros' => $this->faker->name,
        ];
    }
}
