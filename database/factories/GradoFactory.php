<?php

namespace Database\Factories;

use App\Models\Grado;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GradoFactory extends Factory
{
    protected $model = Grado::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
        ];
    }
}
