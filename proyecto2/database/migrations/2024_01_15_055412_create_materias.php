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
        Schema::create('materias', function (Blueprint $table) {
            $table->string('codigo', 10)->primary();
            $table->unsignedBigInteger('curso');
            $table->string('nombre', 100);
            $table->text('descripcion');
            $table->integer('horas_creditos');
            $table->integer('horas_teoria');
            $table->integer('horas_laboratorio');
            $table->integer('horas_otros');

            $table->unsignedBigInteger('id_cursos');
            $table->foreign('id_cursos')->references('id')->on('cursos');

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
        Schema::dropIfExists('materias');
    }
};
