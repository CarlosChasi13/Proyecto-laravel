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
        DB::table('rol')->insert([
            'id' => 1,
            'nombre' => 'Administrador',
            'descripcion' => 'Rol que otorga privilegios y accesos administrativos completos en el sistema, permitiendo la gestión integral de usuarios, configuraciones y recursos',
        ]);
        DB::table('rol')->insert([
            'id' => 2,
            'nombre' => 'Planificador',
            'descripcion' => 'Rol designado para la planificación y organización de actividades y recursos en el sistema, facilitando la gestión estratégica y la asignación eficiente de tareas',
        ]);
        DB::table('rol')->insert([
            'id' => 3,
            'nombre' => 'Coordinador',
            'descripcion' => 'Rol con responsabilidades de coordinación, encargado de supervisar y gestionar procesos específicos, fomentando la colaboración y la eficacia en las operaciones del sistema',
        ]);
    }
}
