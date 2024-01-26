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
        Schema::create('codigoareaconocimiento', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 20);
            $table->unsignedBigInteger('id_grado');
            $table->foreign('id_grado')->references('id')->on('grado');
            $table->unsignedBigInteger('id_areaconocimiento');
            $table->foreign('id_areaconocimiento')->references('id')->on('areaconocimiento');
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
        Schema::dropIfExists('codigoareaconocimiento');
    }
};
