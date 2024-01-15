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
        Schema::create('Docente', function (Blueprint $table) {
            $table->id();
            $table->string('cedula', 10);
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->date('fecha_nacimiento');
            $table->string('genero', 10);
            $table->string('telefono', 10);
            $table->string('email', 200);
            $table->string('direccion', 100);
            $table->text('observaciones');
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
        Schema::dropIfExists('Docente');
    }
};
