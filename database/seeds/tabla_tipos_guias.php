<?php

use Illuminate\Database\Seeder;

class tabla_tipos_guias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('tipos_guias')->insert([
        	'nombre'=>'entrevista',
        	'estatus'=>1,
        ]);
        DB::table('tipos_guias')->insert([
        	'nombre'=>'presentacion',
        	'estatus'=>1,
        ]);

        DB::table('tipos_guias')->insert([
        	'nombre'=>'curriculum',
        	'estatus'=>1,
        ]);
        

    }
}
