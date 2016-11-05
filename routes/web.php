<?php

use App\Model\Section;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');


/**---------------------------------------------- Roles ------------------------------------------------**/

Route::group(['middleware' => ['permission:crear-roles,ver-roles']], function () {
    Route::resource('administracion/roles','RolesController',['except'=> [
        'edit','show','destroy'
    ]]);
});
Route::delete('administracion/roles/{role}','RolesController@destroy')->middleware('permission:eliminar-roles');
Route::get('administracion/roles/{slug}/edit','RolesController@edit')->middleware('permission:editar-roles');



/**---------------------------------------------- Usuarios ------------------------------------------------**/
Route::group(['middleware' => ['permission:crear-usuarios,ver-usuarios']], function () {

    Route::resource('administracion/usuarios','UserController',['except'=> [
        'edit','destroy'
    ]]);
});
Route::delete('administracion/usuarios/{user}','UserController@destroy')->middleware('permission:eliminar-usuarios');
Route::get('administracion/usuarios/{user}/edit','UserController@edit')->middleware('permission:editar-usuarios');

/**---------------------------------------------- Materiales ------------------------------------------------**/

Route::group(['middleware' => ['permission:crear-materiales,ver-materiales']], function () {
    Route::resource('materiales','MaterialController',['except'=> [
        'edit','destroy'
    ]]);
});
Route::delete('materiales/{materiales}','MaterialController@destroy')->middleware('permission:eliminar-materiales');
Route::get('materiales/{slug}/edit','MaterialController@edit')->middleware('permission:editar-materiales');

/**---------------------------------------------- Equipos ------------------------------------------------**/

Route::group(['middleware' => ['permission:crear-equipos,ver-equipos,calibrar-equipos']], function () {
    Route::resource('equipos','EquipmentController',['except'=> [
        'edit','destroy'
    ]]);
});
Route::delete('equipos/{equipos}','EquipmentController@destroy')->middleware('permission:eliminar-equipos');
Route::get('equipos/{slug}/edit','EquipmentController@edit')->middleware('permission:editar-equipos');
Route::get('equipos/{slug}/calibrar','EquipmentController@calibrar')->middleware('permission:calibrar-equipos');
Route::post('equipos/{id}/calibrate','EquipmentController@calibrate')->middleware('permission:calibrar-equipos');

/**---------------------------------------------- Departamentos ------------------------------------------------**/

Route::group(['middleware' => ['permission:crear-departamentos,ver-departamentos']], function () {
    Route::resource('departamentos','DepartmentController',['except'=> [
        'edit','destroy'
    ]]);
});

Route::delete('departamentos/{departamento}','DepartmentController@destroy')->middleware('permission:eliminar-departamentos');
Route::get('departamentos/{slug}/edit','DepartmentController@edit')->middleware('permission:editar-departamentos');

/**---------------------------------------------- Laboratorios ------------------------------------------------**/
Route::group(['middleware' => ['permission:crear-laboratorios,ver-laboratorios']], function () {
    Route::resource('laboratorios','LaboratoryController',['except'=> [
        'edit','destroy'
    ]]);
});
Route::delete('laboratorios/{laboratorio}','LaboratoryController@destroy')->middleware('permission:eliminar-laboratorios');
Route::get('laboratorios/{slug}/edit','LaboratoryController@edit')->middleware('permission:editar-laboratorios');

/**---------------------------------------------- Procedimientos Administrativos ------------------------------------------------**/
Route::group(['middleware' => ['permission:crear-procedimientos-generales,ver-procedimientos-generales,editar-procedimientos-generales']], function () {
    Route::resource('procedimientos/administrativos', 'AdministrativeController');
});
Route::get('subsecciones/{seccion}',function(Section $seccion){
    return $seccion->subsections()->get()->pluck('section','id')->toArray();
});
/**---------------------------------------------- Procedimientos Tecnicos ------------------------------------------------**/

Route::group(['middleware' => ['permission:crear-procedimientos-tecnicos,ver-procedimientos-tecnicos,editar-procedimientos-tecnicos']], function () {
    Route::resource('procedimientos/tecnicos','TechnicianController');
});
Route::post('pasos/procedimientos/tecnicos/{procedure}','TechnicianController@steps');
Route::get('procedimiento/instrucciones/{procedure}','TechnicianController@instructions');

/**---------------------------------------------- Manejo de archivos ------------------------------------------------**/
Route::post('procedimiento/administrativo/{procedure}/archivos-adjuntos','AnnexedFilesController@uploadFile');
Route::post('procedimiento/tecnico/{procedure}/archivos-adjuntos','AnnexedFilesController@uploadFile');

Route::delete('procedimiento/archivos/anexo/{procedure}/{annexedFile}/{type}','AnnexedFilesController@deleteAnnexedFile');
Route::delete('procedimiento/archivos/flujograma/{procedure}/{flowChartFile}/{type}','AnnexedFilesController@deleteFlowChartFile');
Route::delete('procedimiento/archivos/formato/{procedure}/{formatFile}/{type}','AnnexedFilesController@deleteFormatFile');
Route::delete('procedimiento/archivos/procedimiento/{procedure}/{procedureDocument}/{type}','AnnexedFilesController@deleteProcedureFile');

Route::get('archivos/procedimientos/anexos/{procedure}/{type}','AnnexedFilesController@getAllAnnexedFiles');
Route::get('archivos/procedimientos/flujograma/{procedure}','AnnexedFilesController@getFlowCharFileFiles');
Route::get('archivos/procedimientos/formatos/{procedure}/{type}','AnnexedFilesController@getAllFormatsFiles');
Route::get('archivos/procedimientos/procedimiento/{procedure}/{type}','AnnexedFilesController@getProcedureFile');
Route::get('archivos/procedimientos/{file_type}/{procedure_type}/{file_name}','AnnexedFilesController@getFile');


/**---------------------------------------------- Lista Maestra ------------------------------------------------**/

Route::get('listaMaestra', 'MainListController@showAll');
Route::get('procedimiento/buscar','MainListController@searchProcedure');

/**---------------------------------------------- Solicitudes ------------------------------------------------**/
Route::get('servicios','MainListController@solicitudes');
Route::resource('servicios/radio-agua-226','ApplicationRadio226Controller');
Route::resource('servicios/frotis-radiacion','ApplicationFrotisController');
/**---------------------------------------------- Documentos ------------------------------------------------**/
Route::get('documentos/{type}','DocumentsViewController@show');
