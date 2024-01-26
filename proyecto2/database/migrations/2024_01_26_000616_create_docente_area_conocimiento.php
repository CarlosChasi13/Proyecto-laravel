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
        Schema::create('docenteareaconocimiento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_docente');
            $table->foreign('id_docente')->references('id')->on('docente');
            $table->unsignedBigInteger('id_codigoareaconocimiento');
            $table->foreign('id_codigoareaconocimiento')->references('id')->on('codigoareaconocimiento');
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
        Schema::dropIfExists('docenteareaconocimiento');
    }
};
