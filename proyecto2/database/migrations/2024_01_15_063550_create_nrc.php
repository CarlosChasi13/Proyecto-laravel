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
        Schema::create('nrc', function (Blueprint $table) {
            $table->id();
            $table->string('nrc', 10);
            $table->unsignedBigInteger('id_campus');
            $table->foreign('id_campus')->references('id')->on('campu');
            $table->unsignedBigInteger('id_departamento');
            $table->foreign('id_departamento')->references('id')->on('departamentos');
            $table->unsignedBigInteger('id_materia');
            $table->foreign('id_materia')->references('id')->on('materias');
            $table->unsignedBigInteger('id_docentes');
            $table->foreign('id_docentes')->references('id')->on('docente');
            $table->unsignedBigInteger('id_periodoacademico');
            $table->foreign('id_periodoacademico')->references('id')->on('periodosacademicos');
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
        Schema::dropIfExists('nrc');
    }
};
