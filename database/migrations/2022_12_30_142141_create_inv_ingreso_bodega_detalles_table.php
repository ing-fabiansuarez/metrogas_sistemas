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
        Schema::create('inv_ingreso_bodega_detalles', function (Blueprint $table) {
            /*  $table->id();
            $table->timestamps(); */
            $table->primary(['ingreso_bodega_encabezado_id', 'producto_id']);
            $table->foreignId('ingreso_bodega_encabezado_id')->constrained('inv_ingreso_bodega_encabezados');
            $table->foreignId('producto_id')->constrained('inv_productos');
            $table->bigInteger('cantidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_ingreso_bodega_detalles');
    }
};
