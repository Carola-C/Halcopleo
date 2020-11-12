<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestacionesOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestaciones_ofertas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prestacion_id')->references('id')->on('prestaciones');
$table->foreignId('oferta_id')->references('id')->on('ofertas');
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
        Schema::dropIfExists('prestaciones_ofertas');
    }
}
