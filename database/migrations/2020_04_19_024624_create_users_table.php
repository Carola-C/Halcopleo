<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',150);
$table->string('sexo',80);
$table->string('ap_pat',150);
$table->string('ap_mat',150);
$table->string('telefono',20);
$table->date('fecha_nac');
$table->string('username',150);
$table->string('password',150);
$table->foreignId('entidad_id')->references('id')->on('entidades');
$table->foreignId('municipio_id')->references('id')->on('municipios');
$table->string('colonia',150);
$table->string('calle',150);
$table->integer('no_casa')->nullable();
$table->string('foto_ruta',100);
$table->integer('cp');
$table->foreignId('tipo_usuario_id')->references('id')->on('tipos_usuarios');
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
        Schema::dropIfExists('users');
    }
}
