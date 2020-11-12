<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->references('id')->on('empresas');
$table->foreignId('tipo_oferta_id')->references('id')->on('tipos_ofertas');
$table->string('nombre',250);
$table->string('tiempo',250);
$table->float('salario');
$table->text('descripcion');
$table->string('calle',150);
$table->integer('no_edificio')->nullable();
$table->integer('cp');
$table->string('colonia',150);
$table->foreignId('entidad_id')->references('id')->on('entidades');
$table->foreignId('municipio_id')->references('id')->on('municipios');
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
        Schema::dropIfExists('ofertas');
    }
}
