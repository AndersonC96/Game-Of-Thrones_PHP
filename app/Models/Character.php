<?php
    namespace App\Models;
    class Character {
        public static function getAllCharacters($page = 1, $limit = 12) {
            $offset = ($page - 1) * $limit;
            $url = 'https://www.anapioficeandfire.com/api/characters?page=' . $page . '&pageSize=' . $limit;
            $json = file_get_contents($url);
            $characters = json_decode($json, true);
            // Para cada personagem, vamos buscar o nome da casa
            foreach ($characters as &$character) {
                if (!empty($character['allegiances'])) {
                    foreach ($character['allegiances'] as &$houseUrl) {
                        $houseUrl = self::getHouseName($houseUrl);
                    }
                }
            }
            return $characters;
        }
        public static function getHouseName($url) {
            // Faz uma requisição GET para buscar os detalhes da casa
            $json = @file_get_contents($url);
            if ($json === false) {
                return 'Nome da casa não disponível';
            }
            $data = json_decode($json, true);
            return $data['name'] ?? 'Nome da casa não disponível';
        }
        public static function searchCharacterByName($name, $page = 1, $limit = 12) {
            $offset = ($page - 1) * $limit;
            $url = 'https://www.anapioficeandfire.com/api/characters?name=' . urlencode($name) . '&page=' . $page . '&pageSize=' . $limit;
            $json = file_get_contents($url);
            return json_decode($json, true);
        }
    }