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
            $table->foreignId('id_sede')->constrained('sede');
            $table->foreignId('id_periodoacademico')->constrained('periodoacademico');
            $table->integer('codigo');
            $table->foreignId('id_materia')->constrained('materia');
            $table->foreignId('id_docente')->constrained('docente');
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
