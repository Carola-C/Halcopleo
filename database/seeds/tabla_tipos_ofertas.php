<?php

use Illuminate\Database\Seeder;

class tabla_tipos_ofertas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $var[1]='administrativo';
$var[2]='computacion';
$var[3]='repartidor';
$var[4]='mercantil';
$var[5]='limpieza';
		

		for ($i=1; $i <= 5; $i++) { 
			DB::table('tipos_ofertas')->insert([
        	'nombre'=>$var[$i],
        	'estatus'=>1,
        ]);
		}
    }
}
