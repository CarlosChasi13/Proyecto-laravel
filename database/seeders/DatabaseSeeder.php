<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GeneroSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(PermisosSeeder::class);
        $this->call(ProvinciaSeeder::class);
        $this->call(PaisSeeder::class);
        $this->call(SedeSeeder::class);
        $this->call(SiglaSeeder::class);
        $this->call(GradoSeeder::class);
        $this->call(PeriodoAcademicoSeeder::class);
        $this->call(AreaConocimientoSeeder::class);
        $this->call(CodigoAreaConocimientoSeeder::class);
        $this->call(MateriaSeeder::class);
        $this->call(UserSeeder::class);
    }
}
