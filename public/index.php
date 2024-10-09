<?php
    require '../config/routes.php';
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $route = resolveRoute($uri, $routes);
    if ($route) {
        list($controllerAction, $params) = $route;
        list($controller, $action) = explode('@', $controllerAction);
        require "../app/controllers/$controller.php";
        $controllerInstance = new $controller();
        call_user_func_array([$controllerInstance, $action], $params);
    } else {
        http_response_code(404);
        echo "Página não encontrada!";
    }