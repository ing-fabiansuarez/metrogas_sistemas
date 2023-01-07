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
        Schema::create('inv_producto_historials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id')->constrained('inv_productos')->onDelete('cascade');
            $table->timestamps();
            $table->string('icon');
            $table->text('descripcion');
            $table->foreignId('responsable')->constrained('users');
            $table->integer('ubicacion_id');
            $table->string('ubicacion_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_producto_historials');
    }
};
