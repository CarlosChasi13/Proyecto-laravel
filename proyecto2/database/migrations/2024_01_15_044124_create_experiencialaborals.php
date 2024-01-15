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
        Schema::create('experiencialaborals', function (Blueprint $table) {
            $table->id();
            $table->string('entidad',100);
            $table->string('cargo',100);
            $table->date('fecha_ingreso');
            $table->date('fecha_salida');
            $table->text('observacion');
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
        Schema::dropIfExists('experiencialaborals');
    }
};
