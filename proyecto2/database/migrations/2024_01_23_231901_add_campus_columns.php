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
        Schema::table('campu', function (Blueprint $table) {
            $table->string('telefono', 10)
            ->after('nombre');
            $table->string('email', 200)
            ->after('telefono');
            $table->text('direccion')
            ->after('email');
            $table->string('provincia', 50)
            ->after('direccion');
            $table->string('pais', 50)
            ->after('provincia');
            $table->string('maps_url', 1024)
            ->after('pais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campu', function (Blueprint $table) {
            //
        });
    }
};
