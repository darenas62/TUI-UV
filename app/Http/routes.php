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
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TestEvent implements ShouldBroadcast
{
    public $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function broadcastOn()
    {
        return ['test-channel'];
    }
}

get('/broadcast', function() {
    event(new TestEvent('Broadcasting in Laravel using Pusher!'));

    return view('welcome');
});

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
Route::get('secretaria', [
  'as' => 'secretaria',
  'uses' => 'Users\secretariaController@index'
  ]);
Route::post('secretaria', 
  ['as' => 'secretaria', 'uses' => 'Users\secretariaController@create']);
Route::get('estudiante', 'Users\estudianteController@index');
Route::get('admin', 'Users\adminController@index');
Route::get('profesor', 'Users\profesorController@index');

Route::resource('noticias', 'noticiaController');

get('/bridge', function() {
    $pusher = App::make('pusher');

    $pusher->trigger( 'test-channel',
                      'test-event', 
                      array('text' => 'Preparing the Pusher Laracon.eu workshop!'));
    
    return view('welcome');
});

Route::controller('notifications', 'NotificationController');
Route::controller('home', 'noticiaController');
Route::controller('/', 'noticiaController');
