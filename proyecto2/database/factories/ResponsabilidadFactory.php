<?php

namespace Database\Factories;

use App\Models\Responsabilidad;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ResponsabilidadFactory extends Factory
{
    protected $model = Responsabilidad::class;

    public function definition()
    {
        return [
			'id_docente' => $this->faker->name,
			'id_responsabilidad' => $this->faker->name,
        ];
    }
}
