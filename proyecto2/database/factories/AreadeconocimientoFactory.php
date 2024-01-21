<?php

namespace Database\Factories;

use App\Models\Areadeconocimiento;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AreadeconocimientoFactory extends Factory
{
    protected $model = Areadeconocimiento::class;

    public function definition()
    {
        return [
			'id_docente' => $this->faker->name,
			'id_area' => $this->faker->name,
        ];
    }
}
