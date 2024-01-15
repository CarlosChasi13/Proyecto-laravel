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
        Schema::create('publicacioncientificas', function (Blueprint $table) {
            $table->id();
            $table->string('doi',100);
            $table->string('titulo',100);
            $table->year('anio');
            $table->string('ies',100);
            $table->string('autor',100);
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
        Schema::dropIfExists('publicacioncientificas');
    }
};
