<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabilidadesCurriculumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habilidades_curriculums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curriculum_id')->references('id')->on('curriculums');
$table->foreignId('habilidad_id')->references('id')->on('habilidades');
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
        Schema::dropIfExists('habilidades_curriculums');
    }
}
