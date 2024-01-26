<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiglaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sigla')->insert([
            'id' => 1,
            'nombre' => 'S-I',
            'descripcion' => 'Primer periodo academico anual',
        ]);
        DB::table('sigla')->insert([
            'id' => 2,
            'nombre' => 'S-II',
            'descripcion' => 'Segundo periodo academico anual',
        ]);
    }
}
