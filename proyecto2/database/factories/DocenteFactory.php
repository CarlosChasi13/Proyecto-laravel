<?php

namespace Database\Factories;

use App\Models\Docente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DocenteFactory extends Factory
{
    protected $model = Docente::class;

    public function definition()
    {
        return [
			'cedula' => $this->faker->name,
			'nombre' => $this->faker->name,
			'apellido' => $this->faker->name,
			'foto_personal' => $this->faker->name,
			'fecha_nacimiento' => $this->faker->name,
			'id_genero' => $this->faker->name,
			'telefono' => $this->faker->name,
			'email' => $this->faker->name,
			'direccion' => $this->faker->name,
			'id_rol' => $this->faker->name,
			'acercade' => $this->faker->name,
			'observaciones' => $this->faker->name,
        ];
    }
}
