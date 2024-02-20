<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asignatura')->insert([
            'id' => 1,
            'id_codigoareaconocimiento' => 13,
            'codigo' => 'A0G09',
            'nombre' => 'Desarrollo Web Avanzado',
            'descripcion' => 'El desarrollo web es el proceso de construir aplicaciones web y sitios web para hospedarlos en el internet o una intranet, su desarrollo requiere el conocimiento de lenguajes como HTML, CSS, JavaScript, Java, SQL, entre otras que permitan construir aplicaciones web dinámicas, modulares, seguras, con el uso de frameworks de front-end y back-end',
            'horas_teoria' => 3,
            'horas_laboratorio' => 3,
            'horas_otros' => 3,
        ]);
        DB::table('asignatura')->insert([
            'id' => 2,
            'id_codigoareaconocimiento' => 3,
            'codigo' => 'A0H04',
            'nombre' => 'Sistemas Avanzados de Base de Datos',
            'descripcion' => 'Esta asignatura permite optimizar y mejorar un diseño de base de datos mediante la técnica orientada a objetos con la finalidad de otorgar integridad y seguridad al momento de resolver el procesamiento de consultas y transacciones en la base de datos, además se centrará en el uso de grandes volúmenes de datos que mediante un diseño multidimensional permita enfocarse a la toma de decisiones.',
            'horas_teoria' => 3,
            'horas_laboratorio' => 3,
            'horas_otros' => 3,
        ]);
    }
}
