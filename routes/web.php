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
    $users = \App\User::with('roles')->get();
    
    return view('welcome',compact('users'));
});

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');

//-------------------------------------------------------------------
Route::resource('administracion/roles','RolesController',['except'=> [
    'edit','show','destroy'
]]);
Route::delete('administracion/roles/{role}','RolesController@destroy');
Route::get('administracion/roles/{slug}/edit','RolesController@edit');
//-------------------------------------------------------------------
Route::resource('administracion/usuarios','UserController',['except'=> [
    'edit','destroy'
]]);
Route::delete('administracion/usuarios/{user}','UserController@destroy');
Route::get('administracion/usuarios/{user}/edit','UserController@edit');
//-------------------------------------------------------------------
Route::resource('clientes','ClientsController',['except'=> [
    'edit','destroy'
]]);
Route::delete('clientes/{cliente}','ClientsController@destroy');
Route::get('clientes/{slug}/edit','ClientsController@edit');

//-------------------------------------------------------------------
Route::resource('materiales','MaterialController',['except'=> [
    'edit','destroy'
]]);
Route::delete('materiales/{materiales}','MaterialController@destroy');
Route::get('materiales/{slug}/edit','MaterialController@edit');
//-------------------------------------------------------------------
Route::resource('equipos','PlantController',['except'=> [
    'edit','destroy'
]]);
Route::delete('equipos/{equipos}','PlantController@destroy');
Route::get('equipos/{slug}/edit','PlantController@edit');
//-------------------------------------------------------------------