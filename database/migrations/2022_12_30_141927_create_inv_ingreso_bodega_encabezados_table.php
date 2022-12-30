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
        Schema::create('inv_ingreso_bodega_encabezados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bodega_id')->constrained('inv_bodegas');
            $table->text('justificacion');
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
        Schema::dropIfExists('inv_ingreso_bodega_encabezados');
    }
};
