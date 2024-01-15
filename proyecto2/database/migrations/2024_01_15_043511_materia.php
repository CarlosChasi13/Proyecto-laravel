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
        Schema::create('materia', function (Blueprint $table) {
            $table->string('Codigo', 10)->primary();
            $table->unsignedBigInteger('Curso');
            $table->string('Nombre', 100);
            $table->text('Descripcion');
            $table->integer('Horas_creditos');
            $table->integer('Horas_teoria');
            $table->integer('Horas_laboratorio');
            $table->integer('Horas_otros');
            $table->timestamps();

            // Definición de la clave foránea
            $table->foreign('curso')->references('id')->on('curso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materia');
    }
};
