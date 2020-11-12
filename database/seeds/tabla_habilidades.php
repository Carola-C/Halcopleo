<?php

use Illuminate\Database\Seeder;

class tabla_habilidades extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $var[1]='Capacidad de adaptación';
$var[2]='Trabajar en equipo';
$var[3]='Controlar el estrés';
$var[4]='Capacidad de negociación';
$var[5]='Comunicación';
$var[6]='Innovar y crear';
$var[7]='Iniciativa';
$var[8]='Toma de decisiones';
$var[9]='Actuar de manera racional';

		for ($i=1; $i <= 9; $i++) { 
			DB::table('habilidades')->insert([
        	'nombre'=>$var[$i],
        	'estatus'=>1,
        ]);
		}
    }
}
