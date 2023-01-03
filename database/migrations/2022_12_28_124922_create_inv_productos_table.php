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
        Schema::create('inv_productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('codigo_interno');
            $table->string('serial');
            $table->foreignId('marca_id')->constrained('inv_marcas');

            /*  $table->unsignedBigInteger('bodega_id')->nullable();
            $table->foreign('bodega_id')->references('id')->on('inv_bodegas'); */

            $table->integer('ubicacion_id');
            $table->string('ubicacion_type');


            $table->timestamps();
            $table->foreignId('created_by')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_productos');
    }
};
