<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionesCandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluaciones_candidatos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('postulacion_id')->references('id')->on('postulaciones');
$table->float('calificacion');
$table->text('comentario')->nullable();
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
        Schema::dropIfExists('evaluaciones_candidatos');
    }
}
