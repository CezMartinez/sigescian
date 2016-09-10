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

Route::resource('administracion/roles','RolesController',['except'=> [
    'edit','show'
]]);
Route::get('administracion/roles/{slug}/edit','RolesController@edit');

Route::resource('administracion/usuarios','UserController',['except'=> [
    'edit','destroy'
]]);

Route::get('administracion/usuarios/{user}/edit','UserController@edit');
Route::delete('administracion/usuarios/{user}','UserController@destroy');


