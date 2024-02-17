<?php

namespace Database\Factories;

use App\Models\Sigla;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SiglaFactory extends Factory
{
    protected $model = Sigla::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'descripcion' => $this->faker->name,
        ];
    }
}
