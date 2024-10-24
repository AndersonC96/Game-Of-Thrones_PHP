<?php
    namespace App\Models;
    class House {
        // Método para buscar todas as casas (já existente)
        public static function getAllHouses($currentPage, $housesPerPage) {
            $url = 'https://www.anapioficeandfire.com/api/houses?page=' . $currentPage . '&pageSize=' . $housesPerPage;
            $json = @file_get_contents($url);
            if ($json === FALSE) {
                return [];
            }
            $houses = json_decode($json, true);
            return is_array($houses) ? $houses : [];
        }
        // Método para buscar o nome de um overlord ou currentLord com base na URL
        public static function getHouseOrCharacterNameByUrl($url) {
            $json = @file_get_contents($url);
            if ($json === FALSE) {
                return 'Nome não disponível';
            }
            $data = json_decode($json, true);
            return !empty($data['name']) ? $data['name'] : 'Nome não disponível';
        }
        // Novo método para buscar detalhes de uma casa pelo URL
        public static function getHouseByUrl($url) {
            $json = @file_get_contents($url);
            if ($json === FALSE) {
                return null;
            }
            return json_decode($json, true);
        }
    }