<?php

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('foo', function () {
    return 'Hello World';
});

$router->post('foo', function () {
    return 'Hello World of POST';
});
$router->get('user/{id}', function ($id) {
    return 'User '.$id;
});
$router->get('posts/{postId}/comments/{commentId}', function ($postId, $commentId) {
    return 'Post ID '.$postId." -- comment: ".$commentId;
});

$router->get('myrouter', 'UserController@hello');
$router->get('json', 'ReqController@update');

$router->get('user/{id}', 'UserController@show');
