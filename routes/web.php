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

$router->group(['middleware' => 'client.credentials'], function () use ($router) {
    /*
    * Authors routes
    */
    $router->get('/authors', 'AuthorController@index');
    $router->get('/authors/{authorId}', 'AuthorController@show');
    $router->post('/authors', 'AuthorController@store');
    $router->put('/authors/{authorId}', 'AuthorController@update');
    $router->patch('/authors/{authorId}', 'AuthorController@update');
    $router->delete('/authors/{authorId}', 'AuthorController@destroy');

    /*
    * Books routes
    */
    $router->get('/books', 'BookController@index');
    $router->get('/books/{bookId}', 'BooKController@show');
    $router->post('/books', 'BooKController@store');
    $router->put('/books/{bookId}', 'BooKController@update');
    $router->patch('/books/{bookId}', 'BooKController@update');
    $router->delete('/books/{bookId}', 'BooKController@destroy');

    /*
    * Users routes
    */
    $router->get('/users', 'UserController@index');
    $router->get('/users/{userId}', 'UserController@show');
    $router->post('/users', 'UserController@store');
    $router->put('/users/{userId}', 'UserController@update');
    $router->patch('/users/{userId}', 'UserController@update');
    $router->delete('/users/{userId}', 'UserController@destroy');
});

/**
 * User credentials protected routes
 */

$router->group(['middleware' => 'auth:api'], function () use ($router) {
    /*
    * Return authenticated user
    */
    $router->get('/users/me', 'UserController@me');
});
