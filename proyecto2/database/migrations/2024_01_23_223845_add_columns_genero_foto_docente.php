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
        Schema::table('docente', function (Blueprint $table) {
            $table->unsignedBigInteger('id_genero')
            ->after('fecha_nacimiento');

            $table->foreign('id_genero')
            ->references('id')
            ->on('genero');

            $table->string('foto_personal', 2048)
            ->after('id_genero')
            ->nullable();

            $table->text('acercade')
            ->after('direccion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('docente', function (Blueprint $table) {
            $table->dropColumn(array_merge([
                'genero',
            ]));
        });
    }
};
