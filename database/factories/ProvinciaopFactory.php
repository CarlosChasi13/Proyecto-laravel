<?php

namespace Database\Factories;

use App\Models\Provinciaop;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProvinciaopFactory extends Factory
{
    protected $model = Provinciaop::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
        ];
    }
}
