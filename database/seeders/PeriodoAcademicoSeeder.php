<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodoAcademicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periodoacademico')->insert([
            'id' => 1,
            'id_grado' => 1,
            'id_sigla' => 2,
            'fecha_inicio' => '2023-11-01',
            'fecha_fin' => '2024-03-01'
        ]);
    }
}
