<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_lugar',250);
$table->date('tiempo_inicio');
$table->date('tiempo_fin');
$table->foreignId('pais_id')->references('id')->on('paises');
$table->string('ciudad',250);
$table->string('cargo',250);
$table->text('descripcion');
$table->integer('estatus');

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
        Schema::dropIfExists('experiencias');
    }
}
