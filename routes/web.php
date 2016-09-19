<?php

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

/**---------------------------------------------- Clientes ------------------------------------------------**/

Route::group(['middleware' => ['permission:crear-clientes,ver-clientes']], function () {
    Route::resource('clientes','ClientsController',['except'=> [
        'edit','destroy'
    ]]);
});
Route::delete('clientes/{cliente}','ClientsController@destroy')->middleware('permission:eliminar-clientes');
Route::get('clientes/{slug}/edit','ClientsController@edit')->middleware('permission:editar-clientes');

/**---------------------------------------------- Materiales ------------------------------------------------**/

Route::group(['middleware' => ['permission:crear-materiales,ver-materiales']], function () {
    Route::resource('materiales','MaterialController',['except'=> [
        'edit','destroy'
    ]]);
});
Route::delete('materiales/{materiales}','MaterialController@destroy')->middleware('permission:eliminar-materiales');
Route::get('materiales/{slug}/edit','MaterialController@edit')->middleware('permission:editar-materiales');

/**---------------------------------------------- Equipos ------------------------------------------------**/

Route::group(['middleware' => ['permission:crear-equipos,ver-equipos']], function () {
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

Route::post('procedimiento/administrativo/{procedure}/archivos-adjuntos','AnnexedFilesController@uploadFile');
Route::resource('procedimientos/administrativos','AdministrativeController');
Route::delete('procedimiento/administrativo/archivos/anexo/{procedure}/{annexedFile}','AnnexedFilesController@deleteAnnexedFile');
Route::delete('procedimiento/administrativo/archivos/flujograma/{procedure}/{flowChartFile}','AnnexedFilesController@deleteFlowChartFile');
Route::delete('procedimiento/administrativo/archivos/formato/{procedure}/{formatFile}','AnnexedFilesController@deleteFormatFile');

Route::get('archivos/procedimientos/administrativos/anexos/{procedure}','AnnexedFilesController@getAllAnnexedFiles');
Route::get('archivos/procedimientos/administrativos/flujograma/{procedure}','AnnexedFilesController@getFlowCharFileFiles');
Route::get('archivos/procedimientos/administrativos/formatos/{procedure}','AnnexedFilesController@getAllFormatsFiles');

