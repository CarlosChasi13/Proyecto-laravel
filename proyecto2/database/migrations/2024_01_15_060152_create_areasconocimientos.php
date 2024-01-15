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
        Schema::create('areasconocimientos', function (Blueprint $table) {
            $table->string('id', 9)->primary();

            // Restricciones de clave foránea
            $table->unsignedBigInteger('id_docentes');
            $table->foreign('id_docentes')->references('id')->on('docente');
            $table->unsignedBigInteger('id_area_con');
            $table->foreign('id_area_con')->references('id')->on('areasconocimientosopciones');
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
        Schema::dropIfExists('areasconocimientos');
    }
};
