<?php

namespace Database\Factories;

use App\Models\Experiencialaboral;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ExperiencialaboralFactory extends Factory
{
    protected $model = Experiencialaboral::class;

    public function definition()
    {
        return [
			'id_docente' => $this->faker->name,
			'entidad' => $this->faker->name,
			'cargo' => $this->faker->name,
			'fecha_ingreso' => $this->faker->name,
			'fecha_salida' => $this->faker->name,
			'observaciones' => $this->faker->name,
        ];
    }
}
