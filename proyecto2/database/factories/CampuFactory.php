<?php

namespace Database\Factories;

use App\Models\Campu;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CampuFactory extends Factory
{
    protected $model = Campu::class;

    public function definition()
    {
        return [
			'Nombre' => $this->faker->name,
			'telefono' => $this->faker->name,
			'email' => $this->faker->name,
			'direccion' => $this->faker->name,
			'provincia' => $this->faker->name,
			'pais' => $this->faker->name,
			'maps_url' => $this->faker->name,
        ];
    }
}
