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
        Schema::create('inv_acta_entregas', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->date('fecha_entrega');
            $table->foreignId('responsable')->constrained('users');

            $table->string('area');
            $table->string('centro_operativo');
            $table->string('ubicacion');

            $table->tinyInteger('estado');
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
        Schema::dropIfExists('inv_acta_entregas');
    }
};
