<?php
    namespace App\Models;
    class House {
        // Obtém a lista de todas as casas da API
        public static function getAllHouses() {
            // URL da API para buscar todas as casas
            $url = 'https://api.gameofthrones.com/houses'; // Substitua pela URL real da API
            // Faz a requisição GET para a API
            $json = file_get_contents($url);
            // Decodifica o JSON retornado e o transforma em um array associativo
            return json_decode($json, true);
        }
        // Obtém os detalhes de uma casa específica pelo ID
        public static function getHouseById($id) {
            // URL da API para buscar os detalhes de uma casa específica pelo ID
            $url = 'https://api.gameofthrones.com/houses/' . $id; // Substitua pela URL real da API
            // Faz a requisição GET para a API
            $json = file_get_contents($url);
            // Decodifica o JSON retornado e o transforma em um array associativo
            return json_decode($json, true);
        }
    }