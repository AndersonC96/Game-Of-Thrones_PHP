<?php
    namespace App\Core;
    class Model {
        // Método básico para fazer uma requisição GET em uma API
        public function get($url) {
            // Faz a requisição GET para a URL especificada
            $response = file_get_contents($url);
            // Decodifica o JSON retornado e o transforma em um array associativo
            return json_decode($response, true);
        }
    }