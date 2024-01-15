<?php

namespace Database\Factories;

use App\Models\Responsabilidadopcione;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ResponsabilidadopcioneFactory extends Factory
{
    protected $model = Responsabilidadopcione::class;

    public function definition()
    {
        return [
			'cargo' => $this->faker->name,
			'descripcion' => $this->faker->name,
        ];
    }
}
