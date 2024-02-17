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
        Schema::create('periodoacademico', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_grado');
            $table->foreign('id_grado')->references('id')->on('grado');
            $table->unsignedBigInteger('id_sigla');
            $table->foreign('id_sigla')->references('id')->on('sigla');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
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
        Schema::dropIfExists('periodoacademico');
    }
};
