<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grado')->insert([
            'id' => 1,
            'nombre' => 'Pregrado',
        ]);
        DB::table('grado')->insert([
            'id' => 2,
            'nombre' => 'Tecnologia',
        ]);
    }
}
