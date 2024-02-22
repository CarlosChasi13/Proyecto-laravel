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
            $table->id();
            $table->string('codigo', 20);
            $table->foreignId('id_codigoareaconocimiento')->constrained('codigoareaconocimiento');
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
        Schema::dropIfExists('materia');
    }
};
