<?php

use Illuminate\Support\Facades\Route;

/* 
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'web'], function(){
    Route::get('/', function () {
    return view('welcome');
});
Route::get('soporte1', function(){
        return view('mensaje.soporte');
    });
    Route::get('terminos1', function(){
        return view('mensaje.termino');
    });
Route::get('bienvenida', function () {
    return view('bienvenida');
});

Route::get('login','Auth\LoginController@getLogin');
Route::post('login','Auth\LoginController@postLogin');
Route::get('register', 'Auth\LoginController@getRegister');
Route::post('register', 'Auth\LoginController@postRegister');
//Crear ruta ajax
Route::get('combo_municipios_x_entidad/{entidad_id}','Auth\LoginController@combo_municipios_x_entidad');

}
);
Route::group(['middleware' => 'auth'], function(){
    Route::get('soporte', function(){
        return view('mensaje.soporte');
    });
    Route::get('terminos', function(){
        return view('mensaje.termino');
    });
    Route::resource('users','UsersController');
    Route::resource('guias','GuiasController');

    Route::get('combo_municipios_x_entidad1/{entidad_id}','AjaxController@combo_municipios_x_entidad1');
    Route::get('mostrar/{id}','AjaxController@mostrar');
    Route::resource('curriculums','CurriculumsController');
    Route::get('logout','Auth\LoginController@getLogout');
    Route::get('inicio','HomeController@index');
    Route::get('ver_perfil','HomeController@ver_perfil');
    Route::get('show_c/{id}','CurriculumsController@show')->name('show_c');
    Route::get('vist_ofer','OfertasController@vist_ofer');

    Route::get('vist_guias','GuiasController@vist_guias');
    
    

    Route::get('sin_acceso', function(){
        $usuarioactual=\Auth::user();
        return view("mensaje.error_acceso")->with('mjs','Debes ser un administrador para tener acceso a esta sección.')->with("usuario",$usuarioactual);
    });
    Route::get('sin_acceso2', function(){
        $usuarioactual=\Auth::user();
        return view("mensaje.error_acceso")->with('mjs','Debes ser un candidato para tener acceso a esta sección.')->with("usuario",$usuarioactual);
    });
    Route::get('sin_acceso3', function(){
        $usuarioactual=\Auth::user();
        return view("mensaje.error_acceso")->with('mjs','Debes ser un empleador para tener acceso a esta sección.')->with("usuario",$usuarioactual);
    });
    Route::get('sin_acceso4', function(){
        $usuarioactual=\Auth::user();
        return view("mensaje.error_acceso")->with('mjs','Debes ser un empleador para tener acceso a esta sección.')->with("usuario",$usuarioactual);
    });
});







Route::group(['middleware' => 'usuarioCandidato'], function(){
    
Route::get('agregar_conocimiento/{conocimiento}/{noselect}','AjaxController@agregar_conocimiento');
Route::get('agregar','CurriculumsController@agregar');
Route::get('agregar_h','HabilidadesController@agregar_h');
Route::get('agregar_habilidad/{habilidad}/{noselect}','AjaxController@agregar_habilidad');

Route::get('favorito/{id}','AjaxController@favorito');
Route::get('favorito_g/{id}','AjaxController@favorito_g');
Route::get('postular/{id}','AjaxController@postular');
Route::get('show_p/{id}','PostulacionesController@show1')->name('show_p');
//Actualizar curriculum
Route::post('actualizar_c/{foto}/{grado}/{escuela}/{descripcion}','AjaxController@actualizar_c');
Route::get('agregar_estudio/{fe_ini}/{fe_fin}/{titulo}/{escuela}/{pais}/{ciudad}','AjaxController@agregar_estudio');
Route::get('agregar_experiencia/{fe_ini}/{fe_fin}/{nombre}/{cargo}/{descr}/{pais}/{ciudad}','AjaxController@agregar_experiencia');

Route::get('index_f','PostulacionesController@index_f');

Route::get('show1/{id}','OfertasController@show1')->name('show1');
Route::resource('habilidades','HabilidadesController');
Route::resource('conocimientos','ConocimientosController');
//Ruta de estudio
//Route::get('estudios','EstudiosController@create');
//Route::post('estudios','EstudiosController@store');
//Route::get('estudios/{id}','EstudiosController@edit1')->name('estudios_e');
//Ruta de experiencias
Route::resource('experiencias','ExperienciasController');
//Ruta de curriculum
Route::get('curriculums_c','CurriculumsController@create');
Route::get('curriculum/{id}','CurriculumsController@edit');
Route::get('opciones/{tipo}','CurriculumsController@opciones');
Route::post('conocimientos_a','CurriculumsController@conocimientos_a')->name('Candidato.conocimientos_a');
Route::post('habilidades_a','CurriculumsController@habilidades_a')->name('Candidato.habilidades_a');

Route::resource('habilidades_curriculums','Habilidades_curriculumsController');
Route::resource('conocimientos_curriculums','Conocimientos_curriculumsController');
Route::resource('experiencias_curriculums','Experiencias_curriculumsController');
Route::resource('estudios_curriculums','Estudios_curriculumsController');
Route::resource('estudios','EstudiosController');
Route::resource('prestaciones_ofertas','Prestaciones_ofertasController');

Route::resource('evaluaciones_candidatos','Evaluaciones_candidatosController');


Route::resource('guias_favoritas','Guias_favoritasController');
}
);




Route::group(['middleware' => 'usuarioEmpleador'], function(){
Route::get('empresa_ini','Empresas_empleadoresController@empresa_ini')->name('empresa_ini');
Route::get('unir_em/{id}','Empresas_empleadoresController@create1')->name('unir_em');
Route::get('agregar_prestacion/{prestacion}/{noselect}/{id}','AjaxController@agregar_prestacion');
Route::get('editar_e/{id}/{cal}/{com}','AjaxController@editar_e');

Route::resource('habilidades','HabilidadesController');
Route::resource('conocimientos','ConocimientosController');
//oute::resource('users','UsersController');


Route::resource('conocimientos_curriculums','Conocimientos_curriculumsController');



Route::resource('empresas_empleadores','Empresas_empleadoresController');


Route::resource('prestaciones_ofertas','Prestaciones_ofertasController');

Route::resource('evaluaciones_candidatos','Evaluaciones_candidatosController');



}
);
Route::group(['middleware'=>'usuarionoRegis'], function(){
    Route::resource('empresas','EmpresasController');
    /////////////////////////GRAFICAS
    Route::get('graficas','GraficasController@graficas');
    Route::get('grafica_1','GraficasController@grafica_ejemplo1');
    Route::get('grafica_2','GraficasController@grafica_ejemplo2');

    Route::resource('prestaciones','PrestacionesController');
});

Route::group(['middleware'=>'usuarionEmp_Cand'],function(){
    Route::resource('ofertas','OfertasController');
    Route::get('ver_mas/{tipo}/{curri}','AjaxController@ver_mas');
    Route::get('mostrar2/{id}/{tipo}','AjaxController@mostrar2');
    Route::resource('postulaciones','PostulacionesController');
    Route::resource('estudios_curriculums','Estudios_curriculumsController');
    Route::resource('experiencias_curriculums','Experiencias_curriculumsController');
    Route::resource('habilidades_curriculums','Habilidades_curriculumsController');
    Route::resource('prestaciones_ofertas','Prestaciones_ofertasController');
    //Route::resource('estudios1','EstudiosController');

});




Route::group(['middleware' => 'usuarioAdmin'], function(){
Route::get('index_a/{btn}','OfertasController@index_a')->name('index_a');
Route::get('index_guias/{btn}','GuiasController@index_guias')->name('index_guias');

////////////////Gráficas
Route::get('grafica_usuarios','GraficasController@grafica_usuarios');
Route::get('graficas_guias','GraficasController@graficas_guias');

//////////////Reportes
Route::get('reportes','PdfController@reportes');
Route::get('crear_reporte_ofer_emp/{tipo}','PdfController@crear_reporte_ofer_emp');
Route::get('crear_reporte_empresas/{tipo}','PdfController@crear_reporte_empresas');
Route::get('crear_reporte_guias/{tipo}','PdfController@crear_reporte_guias');

/////////////Mail
Route::get('formulario', 'CorreoController@create');
Route::post('enviar_correo','CorreoController@enviar');

Route::resource('tipos_usuarios','Tipos_usuariosController');
Route::resource('entidades','EntidadesController');
Route::resource('municipios','MunicipiosController');
Route::resource('paises','PaisesController');
//Route::resource('users','UsersController');
Route::resource('habilidades','HabilidadesController');
Route::resource('conocimientos','ConocimientosController');
Route::resource('grados_max_estudios','Grados_max_estudiosController');

Route::get('cambiar/{tipo}/{id}','AjaxController@cambiar');
Route::get('cambiar_g/{tipo}/{id}','AjaxController@cambiar_g');
Route::get('mostrar_g/{id}','AjaxController@mostrar_g');

Route::resource('empresas_empleadores','Empresas_empleadoresController');
Route::resource('tipos_ofertas','Tipos_ofertasController');
Route::resource('prestaciones','PrestacionesController');

//Route::resource('prestaciones_ofertas','Prestaciones_ofertasController');
Route::resource('tipos_guias','Tipos_guiasController');
//Route::resource('guias','GuiasController');
Route::get('cruds', function () {
    return view('cruds');
});
}
);



