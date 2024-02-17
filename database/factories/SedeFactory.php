<?php

namespace Database\Factories;

use App\Models\Sede;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SedeFactory extends Factory
{
    protected $model = Sede::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'telefono' => $this->faker->name,
			'email' => $this->faker->name,
			'direccion' => $this->faker->name,
			'ciudad' => $this->faker->name,
			'id_provincia' => $this->faker->name,
			'id_pais' => $this->faker->name,
			'maps_url' => $this->faker->name,
        ];
    }
}
