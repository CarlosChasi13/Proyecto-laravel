<?php

namespace Database\Factories;

use App\Models\Paisop;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PaisopFactory extends Factory
{
    protected $model = Paisop::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
        ];
    }
}
