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
        Schema::create('asignatura', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_codigoareaconocimiento');
            $table->foreign('id_codigoareaconocimiento')->references('id')->on('codigoareaconocimiento');
            $table->string('codigo', 20);
            $table->string('nombre', 100);
            $table->text('descripcion');
            $table->unsignedInteger('horas_teoria');
            $table->unsignedInteger('horas_laboratorio');
            $table->unsignedInteger('horas_otros');
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
        Schema::dropIfExists('asignatura');
    }
};
