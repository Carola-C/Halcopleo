<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiosCurriculumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudios_curriculums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curriculum_id')->references('id')->on('curriculums');
$table->foreignId('estudio_id')->references('id')->on('estudios');
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
        Schema::dropIfExists('estudios_curriculums');
    }
}
