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
        Schema::create('periodosacademicos', function (Blueprint $table) {
            $table->id();
            $table->string('nivel', 10);
            $table->string('siglas', 4);
            $table->date('mes_inicio');
            $table->year('año_inicio');
            $table->date('mes_fin');
            $table->year('año_fin');
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
        Schema::dropIfExists('periodosacademicos');
    }
};
