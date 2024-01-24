<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rolopciones')->insert([
            'id' => 1,
            'nombre' => 'Administrador',
            'descripcion' => 'Descripción de rol de docente',
        ]);
        DB::table('rolopciones')->insert([
            'id' => 2,
            'nombre' => 'Planificador',
            'descripcion' => 'Descripción de rol de docente',
        ]);
        DB::table('rolopciones')->insert([
            'id' => 3,
            'nombre' => 'Coordinador',
            'descripcion' => 'Descripción de rol de docente',
        ]);
    }
}
