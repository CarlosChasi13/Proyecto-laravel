<?php

namespace Database\Factories;

use App\Models\Publicacioncientifica;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PublicacioncientificaFactory extends Factory
{
    protected $model = Publicacioncientifica::class;

    public function definition()
    {
        return [
			'id_docente' => $this->faker->name,
			'nombre' => $this->faker->name,
			'año' => $this->faker->name,
			'ies' => $this->faker->name,
			'observaciones' => $this->faker->name,
        ];
    }
}
