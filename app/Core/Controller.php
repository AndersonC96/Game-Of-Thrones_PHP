<?php
    namespace App\Core;
    class Controller {
        // Método para carregar uma view com dados
        public function view($view, $data = []) {
            // Extrai os dados para variáveis
            extract($data);
            // Verifica se o arquivo de view existe
            if (file_exists("../app/Views/$view.php")) {
                // Inclui o arquivo de view
                require_once "../app/Views/$view.php";
            } else {
                // Lança um erro se a view não for encontrada
                die("View $view não encontrada.");
            }
        }
        // Método para redirecionar para outra página
        public function redirect($url) {
            header("Location: $url");
            exit;
        }
    }