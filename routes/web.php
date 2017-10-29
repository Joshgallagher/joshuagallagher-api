<?php

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['prefix' => 'articles'], function () use ($router) {
        $router->get('/', 'ArticleController@index');
        $router->get('/{slug}', 'ArticleController@show');
    });
});
