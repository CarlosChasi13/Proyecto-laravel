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
			'doi' => $this->faker->name,
			'titulo' => $this->faker->name,
			'anio' => $this->faker->name,
			'ies' => $this->faker->name,
			'autor' => $this->faker->name,
			'id_docente' => $this->faker->name,
        ];
    }
}
