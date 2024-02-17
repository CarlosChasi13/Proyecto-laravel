<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SedeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sede')->insert([
            'id' => 1,
            'nombre' => 'Campus General Guillermo Rodríguez Lara',
            'telefono' => '32810-206',
            'email' => 'marketing-el@espe.edu.ec',
            'direccion' => 'Parroquia Belisario Quevedo, Barrio El Forastero',
            'ciudad' => 'Latacunga',
            'id_provincia' => 1,
            'id_pais' => 1,
            'maps_url' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7978.432019314663!2d-78.5804119!3d-0.9955815!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d4639e7c398d3f%3A0xc4999bdc40abfc48!2sUniversidad%20De%20Las%20Fuerzas%20Armadas%20ESPE%20Extensi%C3%B3n%20Belisario%20Quevedo!5e0!3m2!1ses!2sec!4v1705865379839!5m2!1ses!2sec',
        ]);
    }
}
