<?php

namespace Database\Factories;

use App\Models\Titulo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TituloFactory extends Factory
{
    protected $model = Titulo::class;

    public function definition()
    {
        return [
			'id_docente' => $this->faker->name,
			'fecha' => $this->faker->name,
			'ies' => $this->faker->name,
			'nombre' => $this->faker->name,
			'observaciones' => $this->faker->name,
        ];
    }
}
