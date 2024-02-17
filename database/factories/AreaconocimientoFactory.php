<?php

namespace Database\Factories;

use App\Models\Areaconocimiento;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AreaconocimientoFactory extends Factory
{
    protected $model = Areaconocimiento::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
        ];
    }
}
