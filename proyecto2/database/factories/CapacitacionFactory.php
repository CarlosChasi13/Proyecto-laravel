<?php

namespace Database\Factories;

use App\Models\Capacitacion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CapacitacionFactory extends Factory
{
    protected $model = Capacitacion::class;

    public function definition()
    {
        return [
			'id_docente' => $this->faker->name,
			'ies' => $this->faker->name,
			'nombre' => $this->faker->name,
			'fecha' => $this->faker->name,
			'horas' => $this->faker->name,
			'descripcion' => $this->faker->name,
        ];
    }
}
