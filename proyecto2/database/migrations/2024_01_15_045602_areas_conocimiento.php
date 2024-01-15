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
        Schema::create('areasConocimiento', function (Blueprint $table) {
            $table->id(); // Agregar un campo ID automáticamente (generalmente de tipo bigIncrements)
            $table->string('id', 9)->unique(); // Columna VARCHAR(9) con índice único
            $table->unsignedBigInteger('Conocimiento'); // Columna para la clave foránea
            $table->timestamps();

            // Definir las restricciones de clave foránea
            $table->foreign('id')->references('id')->on('docente');
            $table->foreign('conocimiento')->references('id')->on('areaConocimientoOpcion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areasConocimiento');
    }
};
