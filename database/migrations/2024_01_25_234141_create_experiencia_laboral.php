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
        Schema::create('experiencialaboral', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_docente')->constrained('docente');
            $table->string('entidad', 100);
            $table->string('cargo', 20);
            $table->date('fecha_ingreso');
            $table->date('fecha_salida');
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
        Schema::dropIfExists('experiencialaboral');
    }
};
