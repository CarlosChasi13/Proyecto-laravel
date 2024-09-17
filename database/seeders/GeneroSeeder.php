<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genero')->updateOrinsert([
            'id' => 1,
            'nombre' => 'Femenino',
        ]);
        DB::table('genero')->updateOrinsert([
            'id' => 2,
            'nombre' => 'Masculino',
        ]);
        DB::table('genero')->insert([
            'id' => 3,
            'nombre' => 'Otro',
        ]);
    }
}
