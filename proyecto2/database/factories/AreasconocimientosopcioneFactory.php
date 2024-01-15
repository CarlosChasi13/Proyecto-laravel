<?php

namespace Database\Factories;

use App\Models\Areasconocimientosopcione;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AreasconocimientosopcioneFactory extends Factory
{
    protected $model = Areasconocimientosopcione::class;

    public function definition()
    {
        return [
			'codigo' => $this->faker->name,
			'nombre' => $this->faker->name,
        ];
    }
}
