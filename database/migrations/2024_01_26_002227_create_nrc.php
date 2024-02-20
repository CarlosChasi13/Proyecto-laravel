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
            $table->unsignedBigInteger('id_sede');
            $table->foreign('id_sede')->references('id')->on('sede');
            $table->unsignedBigInteger('id_periodoacademico');
            $table->foreign('id_periodoacademico')->references('id')->on('periodoacademico');
            $table->unsignedBigInteger('id_asignatura');
            $table->foreign('id_asignatura')->references('id')->on('asignatura');
            $table->unsignedBigInteger('id_docente');
            $table->foreign('id_docente')->references('id')->on('docente');
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
