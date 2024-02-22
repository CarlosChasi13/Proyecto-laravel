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
        Schema::create('areainteres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_docente')->constrained('docente');
            $table->foreignId('id_areaconocimiento')->constrained('areaconocimiento');
            $table->string('tema', 100);
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
        Schema::dropIfExists('areainteres');
    }
};
