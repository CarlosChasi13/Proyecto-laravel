<?php

namespace Database\Factories;

use App\Models\Nrc;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NrcFactory extends Factory
{
    protected $model = Nrc::class;

    public function definition()
    {
        return [
			'id_sede' => $this->faker->name,
			'id_asignatura' => $this->faker->name,
			'id_docente' => $this->faker->name,
        ];
    }
}
