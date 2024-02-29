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
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'Administrador',
            'guard_name' => 'web',
        ]);
        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'Planificador',
            'guard_name' => 'web',
        ]);
        DB::table('roles')->insert([
            'id' => 3,
            'name' => 'Coordinador',
            'guard_name' => 'web',
        ]);
    }
}
