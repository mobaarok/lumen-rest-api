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

//get all todos
$router->get('todos', ['uses' => 'TodoController@getAll']);
//get single toto
$router->get('todo/{id}', ['uses' => 'TodoController@show']);
// create todo in post method
$router->post('todo', [ 'uses' => 'TodoController@create']);
//update todo
$router->put('todo/{id}', [ 'uses' => 'TodoController@update']);
//delete todo
 $router->delete('todo/{id}', ['uses' => 'TodoController@delete']);
