<?php

$router->group(['prefix' => 'articles'], function () use ($router) {
    $router->get('/', 'ArticleController@index');
});
