<?php

namespace Database\Factories;

use App\Models\Codigoareaconocimiento;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CodigoareaconocimientoFactory extends Factory
{
    protected $model = Codigoareaconocimiento::class;

    public function definition()
    {
        return [
			'codigo' => $this->faker->name,
			'id_grado' => $this->faker->name,
			'id_areaconocimiento' => $this->faker->name,
        ];
    }
}
