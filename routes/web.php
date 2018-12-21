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


$router->get('/', 'PacoteController@index');
$router->get('/api/pacotes', 'PacoteController@buscarTodosPacotes');

$router->group(['prefix' => 'api/pacote'], function() use ($router){
    $router->get('/{id}', 'PacoteController@buscarPacote');
    $router->get('/{id}/detalhes', 'PacoteController@buscarDetalhesPacote');
    $router->post('/', 'PacoteController@criarPacote');
    $router->put('/{id}', 'PacoteController@editarPacote');
    $router->delete('/{id}', 'PacoteController@excluirPacote');
});

