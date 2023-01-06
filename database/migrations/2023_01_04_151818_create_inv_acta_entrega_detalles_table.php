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
        Schema::create('inv_acta_entrega_detalles', function (Blueprint $table) {
            /* $table->id();
            $table->timestamps(); */
            $table->primary(['producto_id', 'acta_entrega_id']);
            $table->foreignId('producto_id')->constrained('inv_productos');
            $table->foreignId('acta_entrega_id')->constrained('inv_acta_entregas')->onDelete('cascade');
            $table->bigInteger('stock');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_acta_entrega_detalles');
    }
};
