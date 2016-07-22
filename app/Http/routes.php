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
$router->auth(); 
$router->group(['namespace' => 'Tasks', 'prefix' => 'amrit'],function($router){
  $router->resource('task', 'TaskController');
});

$router->get('/', 'IndexController@index');

$router->get('/index', 'IndexController@index');

$router->get('/login', function () {

    return view('auth/login');
});
$router->get('register/confirm/{token}','Auth\AuthController@confirmEmail');

$router->get('users','UsersController@index');

$router->get('/home', 'HomeController@index');
