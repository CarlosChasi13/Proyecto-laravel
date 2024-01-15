<?php

namespace Database\Factories;

use App\Models\Areasconocimiento;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AreasconocimientoFactory extends Factory
{
    protected $model = Areasconocimiento::class;

    public function definition()
    {
        return [
			'conocimiento' => $this->faker->name,
			'id_docentes' => $this->faker->name,
			'id_area_con' => $this->faker->name,
        ];
    }
}
