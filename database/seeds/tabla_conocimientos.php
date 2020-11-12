<?php

use Illuminate\Database\Seeder;

class tabla_conocimientos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $var[1]='Control de uno o más idiomas además de la lengua materna';
$var[2]='Control y/o uso de maquinaria';
$var[3]='Conocimiento de lenguajes de programación';
$var[4]='Conocimiento en marketing';
$var[5]='Manejo de softwares de gestión';
$var[6]='Escritura correcta';

		for ($i=1; $i <= 6; $i++) { 
			DB::table('conocimientos')->insert([
        	'nombre'=>$var[$i],
        	'estatus'=>1,
        ]);
		}

    }
}
