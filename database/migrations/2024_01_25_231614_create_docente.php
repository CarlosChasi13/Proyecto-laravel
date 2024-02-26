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
        Schema::create('docente', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 9)->unique();
            $table->string('cedula', 10)->unique();
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('foto_personal', 1024)->nullable();
            $table->date('fecha_nacimiento');
            $table->foreignId('id_genero')->constrained('genero');
            $table->string('telefono', 15);
            $table->string('email', 200);
            $table->text('direccion');
            $table->text('acercade');
            $table->foreignId('id_user')->constrained('users');
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
        Schema::dropIfExists('docente');
    }
};
