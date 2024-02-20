<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CodigoAreaConocimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('codigoareaconocimiento')->insert([
            'id' => 1,
            'codigo' => 'COMP-A0F',
            'id_grado' => 1,
            'id_areaconocimiento' => 1
        ]);
        DB::table('codigoareaconocimiento')->insert([
            'id' => 2,
            'codigo' => 'COMP-L0F',
            'id_grado' => 2,
            'id_areaconocimiento' => 1
        ]);
        DB::table('codigoareaconocimiento')->insert([
            'id' => 3,
            'codigo' => 'COMP-A0H',
            'id_grado' => 1,
            'id_areaconocimiento' => 2
        ]);
        DB::table('codigoareaconocimiento')->insert([
            'id' => 4,
            'codigo' => 'COMP-L0H',
            'id_grado' => 2,
            'id_areaconocimiento' => 2
        ]);
        DB::table('codigoareaconocimiento')->insert([
            'id' => 5,
            'codigo' => 'COMP-A0I',
            'id_grado' => 1,
            'id_areaconocimiento' => 3
        ]);
        DB::table('codigoareaconocimiento')->insert([
            'id' => 6,
            'codigo' => 'COMP-L0I',
            'id_grado' => 2,
            'id_areaconocimiento' => 3
        ]);
        DB::table('codigoareaconocimiento')->insert([
            'id' => 7,
            'codigo' => 'COMP-A0K',
            'id_grado' => 1,
            'id_areaconocimiento' => 4
        ]);
        DB::table('codigoareaconocimiento')->insert([
            'id' => 8,
            'codigo' => 'COMP-A0J',
            'id_grado' => 1,
            'id_areaconocimiento' => 5
        ]);
        DB::table('codigoareaconocimiento')->insert([
            'id' => 9,
            'codigo' => 'COMP-L0J',
            'id_grado' => 2,
            'id_areaconocimiento' => 5
        ]);
        DB::table('codigoareaconocimiento')->insert([
            'id' => 10,
            'codigo' => 'COMP-A0O',
            'id_grado' => 1,
            'id_areaconocimiento' => 6
        ]);
        DB::table('codigoareaconocimiento')->insert([
            'id' => 11,
            'codigo' => 'COMP-MAT',
            'id_grado' => 2,
            'id_areaconocimiento' => 6
        ]);
        DB::table('codigoareaconocimiento')->insert([
            'id' => 12,
            'codigo' => 'SW',
            'id_grado' => 1,
            'id_areaconocimiento' => 7
        ]);
        DB::table('codigoareaconocimiento')->insert([
            'id' => 13,
            'codigo' => 'COMP-A0G',
            'id_grado' => 1,
            'id_areaconocimiento' => 8
        ]);
        DB::table('codigoareaconocimiento')->insert([
            'id' => 14,
            'codigo' => 'COMP-L0G',
            'id_grado' => 2,
            'id_areaconocimiento' => 8
        ]);
        DB::table('codigoareaconocimiento')->insert([
            'id' => 15,
            'codigo' => 'COMP-A0L',
            'id_grado' => 1,
            'id_areaconocimiento' => 9
        ]);
        DB::table('codigoareaconocimiento')->insert([
            'id' => 16,
            'codigo' => 'COMP-L0L',
            'id_grado' => 2,
            'id_areaconocimiento' => 9
        ]);
    }
}
