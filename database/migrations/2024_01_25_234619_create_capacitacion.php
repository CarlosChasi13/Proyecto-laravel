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
        Schema::create('capacitacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_docente');
            $table->foreign('id_docente')->references('id')->on('docente');
            $table->string('ies', 100);
            $table->string('nombre', 100);
            $table->date('fecha');
            $table->unsignedInteger('horas');
            $table->text('descripcion');
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
        Schema::dropIfExists('capacitacion');
    }
};
