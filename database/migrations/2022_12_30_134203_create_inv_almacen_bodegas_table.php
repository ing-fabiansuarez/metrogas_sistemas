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
        Schema::create('inv_almacen_bodegas', function (Blueprint $table) {
            //$table->id();
            $table->primary(['producto_id', 'bodega_id']);
            $table->foreignId('producto_id')->constrained('inv_productos')->primary;
            $table->foreignId('bodega_id')->constrained('inv_bodegas');
            $table->bigInteger('stock');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_almacen_bodegas');
    }
};
