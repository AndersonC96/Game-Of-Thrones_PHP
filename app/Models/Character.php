<?php
    namespace App\Models;
    class Character {
        // Obtém a lista de todos os personagens da API
        public static function getAllCharacters() {
            // URL da API para buscar todos os personagens
            $url = 'https://www.anapioficeandfire.com/api/characters'; // Substitua pela URL real da API
            // Faz a requisição GET para a API
            $json = file_get_contents($url);
            // Decodifica o JSON retornado e o transforma em um array associativo
            return json_decode($json, true);
        }
        // Obtém os detalhes de um personagem específico pelo ID
        public static function getCharacterById($id) {
            // URL da API para buscar os detalhes de um personagem específico pelo ID
            $url = 'https://www.anapioficeandfire.com/api/characters/' . $id; // Substitua pela URL real da API
            // Faz a requisição GET para a API
            $json = file_get_contents($url);
            // Decodifica o JSON retornado e o transforma em um array associativo
            return json_decode($json, true);
        }
    }