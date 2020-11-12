<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConocimientosCurriculumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conocimientos_curriculums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curriculum_id')->references('id')->on('curriculums');
$table->foreignId('conocimiento_id')->references('id')->on('conocimientos');
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
        Schema::dropIfExists('conocimientos_curriculums');
    }
}
