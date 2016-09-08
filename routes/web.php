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
    return redirect('login');
});

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');

Route::resource('administracion/roles','RolesController',['except'=> [
    'edit','show'
]]);
Route::get('administracion/roles/{slug}/edit','RolesController@edit');

Route::resource('administracion/usuarios','UserController',['except'=> [
    'edit',
]]);

Route::get('administracion/usuarios/{user}/edit','UserController@edit');


