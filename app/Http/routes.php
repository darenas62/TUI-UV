<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/* Inicio V1 
Route::get('/', [
  'as' => 'home',
  'uses' => 'HomeController@index'
]);

/* Home Bootstrap 
Route::get('home', [
  'as' => 'home',
  'uses' => 'HomeController@index'
]);
/* */

/* Inicio con noticias RECARGADOOOO */
Route::get('/', [
  'as' => 'home',
  'uses' => 'noticiaController@index'
]);

/* Home Bootstrap */
Route::get('home', [
  'as' => 'home',
  'uses' => 'noticiaController@index'
]);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

// Usuarios


Route::get('estudiante', 'Users\estudianteController@index');
Route::get('admin', 'Users\adminController@index');

Route::resource('noticias', 'noticiaController');


Route::resource('calendars', 'CalendarController');

Route::get('calendars/{id}/delete', [
    'as' => 'calendars.delete',
    'uses' => 'CalendarController@destroy',
]);
