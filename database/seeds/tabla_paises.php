<?php

use Illuminate\Database\Seeder;

class tabla_paises extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paises')->insert([
        	'nombre'=>'Alemania',
        	'clave'=>'DE',
        	'estatus'=>1,
        ]);

        DB::table('paises')->insert([
        	'nombre'=>'España',
        	'clave'=>'Es',
        	'estatus'=>1,
        ]);
        DB::table('paises')->insert([
        	'nombre'=>'Estados Unidos',
        	'clave'=>'US',
        	'estatus'=>1,
        ]);
        DB::table('paises')->insert([
        	'nombre'=>'México',
        	'clave'=>'MX',
        	'estatus'=>1,
        ]);
    }
}
