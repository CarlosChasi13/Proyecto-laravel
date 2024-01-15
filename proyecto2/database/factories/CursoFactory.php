<?php

namespace Database\Factories;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CursoFactory extends Factory
{
    protected $model = Curso::class;

    public function definition()
    {
        return [
			'Nombre' => $this->faker->name,
        ];
    }
}
