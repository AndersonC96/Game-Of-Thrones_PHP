<?php
    // Ativa o relatório de erros para desenvolvimento
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    // Carrega o autoload do Composer
    require_once '../vendor/autoload.php';
    // Função básica para limpar o URL e pegar o caminho
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    // Remove a barra inicial e final do caminho da URL
    $uri = trim($uri, '/');
    // Roteamento básico para direcionar as requisições
    if ($uri == '') {
        // Página inicial (rota raiz)
        $controller = new App\Controllers\HomeController();
        $controller->index();
    } elseif ($uri == 'books') {
        // Rota para a lista de livros
        $controller = new App\Controllers\BookController();
        $controller->index();
    } elseif (preg_match('/^books\/details\/(\d+)$/', $uri, $matches)) {
        // Rota para detalhes de um livro específico
        $controller = new App\Controllers\BookController();
        $controller->details($matches[1]);
    } elseif ($uri == 'characters') {
        // Rota para a lista de personagens
        $controller = new App\Controllers\CharacterController();
        $controller->index();
    } elseif (preg_match('/^characters\/details\/(\d+)$/', $uri, $matches)) {
        // Rota para detalhes de um personagem específico
        $controller = new App\Controllers\CharacterController();
        $controller->details($matches[1]);
    } elseif ($uri == 'houses') {
        // Rota para a lista de casas
        $controller = new App\Controllers\HouseController();
        $controller->index();
    } elseif (preg_match('/^houses\/details\/(\d+)$/', $uri, $matches)) {
        // Rota para detalhes de uma casa específica
        $controller = new App\Controllers\HouseController();
        $controller->details($matches[1]);
    } else {
        // Página 404 - Não encontrado
        header("HTTP/1.0 404 Not Found");
        echo "Página não encontrada.";
    }