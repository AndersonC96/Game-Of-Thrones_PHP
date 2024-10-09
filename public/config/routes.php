<?php
    $routes = [
        '/test' => 'TestController@index',
        '/hello/{name}' => 'TestController@hello',
        '/characters' => 'CharacterController@index',
        '/characters/{id}' => 'CharacterController@show',
        '/houses' => 'HouseController@index',
        '/houses/{id}' => 'HouseController@show',
        '/books' => 'BookController@index',
        '/books/{id}' => 'BookController@show',
    ];
    function resolveRoute($uri, $routes) {
        foreach ($routes as $route => $controllerAction) {
            $pattern = preg_replace('/\{[^\}]+\}/', '(\d+)', $route);
            if (preg_match("#^$pattern$#", $uri, $matches)) {
                array_shift($matches);
                return [$controllerAction, $matches];
            }
        }
        return null;
    }