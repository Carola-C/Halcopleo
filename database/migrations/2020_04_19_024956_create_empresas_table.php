<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('razon_social',250);
$table->string('rfc',250);
$table->foreignId('entidad_id')->references('id')->on('entidades');
$table->foreignId('municipio_id')->references('id')->on('municipios');
$table->string('colonia',150);
$table->string('calle',150);
$table->integer('no_edificio')->nullable();
$table->integer('cp');
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
        Schema::dropIfExists('empresas');
    }
}
