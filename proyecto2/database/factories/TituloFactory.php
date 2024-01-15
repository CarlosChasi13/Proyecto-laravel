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
			'fecha' => $this->faker->name,
			'ies' => $this->faker->name,
			'nombre_titulo' => $this->faker->name,
			'observaciones' => $this->faker->name,
			'id_docente' => $this->faker->name,
        ];
    }
}
