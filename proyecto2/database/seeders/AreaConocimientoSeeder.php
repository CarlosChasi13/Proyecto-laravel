<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaConocimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areaconocimiento')->insert([
            'id' => 1,
            'nombre' => 'Ciencias Computacionales'
        ]);
        DB::table('areaconocimiento')->insert([
            'id' => 2,
            'nombre' => 'Diseño y Administración de Base de datos'
        ]);
        DB::table('areaconocimiento')->insert([
            'id' => 3,
            'nombre' => 'Diseño y Administración de Redes'
        ]);
        DB::table('areaconocimiento')->insert([
            'id' => 4,
            'nombre' => 'Programas Interdisciplinarios TICS'
        ]);
        DB::table('areaconocimiento')->insert([
            'id' => 5,
            'nombre' => 'Programación'
        ]);
        DB::table('areaconocimiento')->insert([
            'id' => 6,
            'nombre' => 'Computación'
        ]);
        DB::table('areaconocimiento')->insert([
            'id' => 7,
            'nombre' => 'Ingeniería de Software'
        ]);
        DB::table('areaconocimiento')->insert([
            'id' => 8,
            'nombre' => 'Desarrollo y Análisis de Software y Aplicaciones de Software'
        ]);
        DB::table('areaconocimiento')->insert([
            'id' => 9,
            'nombre' => 'Sistemas de Información'
        ]);
    }
}
