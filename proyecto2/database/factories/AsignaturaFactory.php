<?php

namespace Database\Factories;

use App\Models\Asignatura;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AsignaturaFactory extends Factory
{
    protected $model = Asignatura::class;

    public function definition()
    {
        return [
			'id_periodoacademico' => $this->faker->name,
			'id_codigoareaconocimiento' => $this->faker->name,
			'codigo' => $this->faker->name,
			'nombre' => $this->faker->name,
			'descripcion' => $this->faker->name,
			'horas_teoria' => $this->faker->name,
			'horas_laboratorio' => $this->faker->name,
			'horas_otros' => $this->faker->name,
        ];
    }
}
