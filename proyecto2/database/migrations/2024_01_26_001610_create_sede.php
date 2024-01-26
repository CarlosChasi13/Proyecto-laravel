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
        Schema::create('sede', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('telefono', 15);
            $table->string('email', 200);
            $table->text('direccion');
            $table->string('ciudad', 50);
            $table->unsignedBigInteger('id_provincia');
            $table->foreign('id_provincia')->references('id')->on('provinciaop');
            $table->unsignedBigInteger('id_pais');
            $table->foreign('id_pais')->references('id')->on('paisop');
            $table->string('maps_url', 2048);
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
        Schema::dropIfExists('sede');
    }
};
