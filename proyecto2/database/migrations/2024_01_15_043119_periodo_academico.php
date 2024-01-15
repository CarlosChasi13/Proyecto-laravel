<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodoAcademico', function (Blueprint $table) {
            $table->id();
            $table->string('Nivel', 10);
            $table->string('Siglas', 4);
            $table->date('Mes_inicio');
            $table->year('Año_inicio');
            $table->date('Mes_fin');
            $table->year('Año_fin');
            $table->timestamps();
        });
    }
   
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periodoAcademico');
    }
};
