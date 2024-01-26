<?php

namespace Database\Factories;

use App\Models\Docenteareaconocimiento;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DocenteareaconocimientoFactory extends Factory
{
    protected $model = Docenteareaconocimiento::class;

    public function definition()
    {
        return [
			'id_docente' => $this->faker->name,
			'id_codigoareaconocimiento' => $this->faker->name,
        ];
    }
}
