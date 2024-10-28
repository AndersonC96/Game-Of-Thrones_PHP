<?php
    namespace App\Models;
    class Character {
        // Método para obter todos os personagens com paginação
        public static function getAllCharacters($page = 1, $limit = 12) {
            $url = 'https://www.anapioficeandfire.com/api/characters?page=' . $page . '&pageSize=' . $limit;
            $json = file_get_contents($url);
            $characters = json_decode($json, true);
            foreach ($characters as &$character) {
                if (!empty($character['allegiances'])) {
                    foreach ($character['allegiances'] as &$houseUrl) {
                        $houseUrl = self::getHouseName($houseUrl);
                    }
                }
            }
            return $characters;
        }
        // Novo método para obter detalhes de um personagem pelo ID
        public static function getCharacterById($id) {
            $url = 'https://www.anapioficeandfire.com/api/characters/' . $id;
            $json = file_get_contents($url);
            return json_decode($json, true);
        }
        // Método para buscar detalhes de um personagem pelo URL
        public static function getCharacterByUrl($url) {
            $json = file_get_contents($url);
            if ($json === FALSE) {
                error_log("Erro ao tentar acessar a URL: $url");
                return null;
            }
            return json_decode($json, true);
        }
        // Método para buscar o nome de um personagem ou casa a partir de uma URL
        public static function getCharacterOrHouseNameByUrl($url) {
            $json = file_get_contents($url);
            if ($json === FALSE) {
                error_log("Erro ao tentar acessar a URL: $url");
                return 'Nome não disponível';
            }
            // Decodifica o JSON e verifica se o campo 'name' está presente
            $data = json_decode($json, true);
            return !empty($data['name']) ? $data['name'] : 'Nome não disponível';
        }
        // Método para obter o nome da casa
        public static function getHouseName($url) {
            $json = @file_get_contents($url);
            if ($json === false) {
                return 'Nome da casa não disponível';
            }
            $data = json_decode($json, true);
            return $data['name'] ?? 'Nome da casa não disponível';
        }
        public static function searchCharacterByName($name, $page = 1, $limit = 12) {
            $url = 'https://www.anapioficeandfire.com/api/characters?name=' . urlencode($name) . '&page=' . $page . '&pageSize=' . $limit;
            $json = file_get_contents($url);
            return json_decode($json, true);
        }
    }