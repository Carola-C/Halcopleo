<?php

use Illuminate\Database\Seeder;

class tabla_grados_max_estudios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $var[1]='Primaria';
$var[2]='Secundaria';
$var[3]='Preparatoria';
$var[4]='Universidad';
$var[5]='Maestria';
$var[6]='Doctorado';
		

		for ($i=1; $i <= 6; $i++) { 
			DB::table('grados_max_estudios')->insert([
        	'nombre'=>$var[$i],
        	'estatus'=>1,
        ]);
		}
    }
}
