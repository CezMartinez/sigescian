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

use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    $users = \App\User::with('roles')->get();
    
    return view('welcome',compact('users'));
});

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
Route::delete('materiales/{materiales}','MaterialController@destroy');
Route::get('materiales/{slug}/edit','MaterialController@edit');

/**---------------------------------------------- Equipos ------------------------------------------------**/

Route::group(['middleware' => ['permission:crear-equipos,ver-equipos']], function () {
    Route::resource('equipos','PlantController',['except'=> [
        'edit','destroy'
    ]]);
});
Route::delete('equipos/{equipos}','PlantController@destroy');
Route::get('equipos/{slug}/edit','PlantController@edit');
//-------------------------------------------------------------------

Route::resource('departamentos','DepartmentController',['except'=> [
    'edit','destroy'
]]);
Route::delete('departamentos/{departamento}','DepartmentController@destroy');
Route::get('departamentos/{slug}/edit','DepartmentController@edit');

Route::resource('laboratorios','LaboratoryController',['except'=> [
    'edit','destroy'
]]);
Route::delete('laboratorios/{laboratorio}','LaboratoryController@destroy');
Route::get('laboratorios/{slug}/edit','LaboratoryController@edit');

//---------------------------------

