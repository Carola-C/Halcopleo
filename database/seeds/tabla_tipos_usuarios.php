<?php

use Illuminate\Database\Seeder;

class tabla_tipos_usuarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_usuarios')->insert([
        	'nombre'=>'Administrador',
        	'estatus'=>1,
        ]);

        DB::table('tipos_usuarios')->insert([
        	'nombre'=>'Empleador',
        	'estatus'=>1,
        ]);
        DB::table('tipos_usuarios')->insert([
        	'nombre'=>'Candidato',
        	'estatus'=>1,
        ]);
    }
}
