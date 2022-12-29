<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_producto_caracteristicas', function (
            Blueprint $table
        ) {
            $table->id();
            $table->string('nombre');
            $table->string('valor');
            $table
                ->foreignId('producto_id')
                ->constrained('inv_productos')
                ->onDelete('cascade');
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
        Schema::dropIfExists('inv_producto_caracteristicas');
    }
};
