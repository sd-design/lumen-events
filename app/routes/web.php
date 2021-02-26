<?php

/** @var \Laravel\Lumen\Routing\Router $router */


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/','EventsController@index');

$router->get('/events/{id}','EventsController@events');

$router->get('/places/{id}','EventsController@places');

$router->get('test','UserController@test');

$router->post('reserve', 'UserController@reserve');