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
        Schema::create('responsabilidad', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_docente');
            $table->foreign('id_docente')->references('id')->on('docente');
            $table->unsignedBigInteger('id_responsabilidad');
            $table->foreign('id_responsabilidad')->references('id')->on('responsabilidadopciones');
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
        Schema::dropIfExists('responsabilidad');
    }
};