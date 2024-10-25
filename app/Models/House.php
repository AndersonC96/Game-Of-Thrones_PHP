<?php
    namespace App\Models;
    class House {
        // Método para buscar todas as casas
        public static function getAllHouses($currentPage, $housesPerPage) {
            $url = 'https://www.anapioficeandfire.com/api/houses?page=' . $currentPage . '&pageSize=' . $housesPerPage;
            // Faz a requisição GET para a API
            $json = file_get_contents($url);
            // Verifica se a resposta é válida
            if ($json === FALSE) {
                error_log("Erro ao tentar acessar a API: $url");
                return [];
            }
            // Decodifica o JSON e verifica se é válido
            $houses = json_decode($json, true);
            // Verifica se o retorno da API é um array válido
            return is_array($houses) ? $houses : [];
        }
        // Método para buscar o nome de um personagem ou casa com base na URL
        public static function getHouseOrCharacterNameByUrl($url) {
            $json = file_get_contents($url);
            if ($json === FALSE) {
                error_log("Erro ao tentar acessar a URL: $url");
                return 'Nome não disponível';
            }
        // Decodifica o JSON e verifica se o campo 'name' está presente
        $data = json_decode($json, true);
        return !empty($data['name']) ? $data['name'] : 'Nome não disponível';
    }
        // Método para buscar detalhes de uma casa pelo URL
        public static function getHouseByUrl($url) {
            $json = file_get_contents($url);
            if ($json === FALSE) {
                error_log("Erro ao tentar acessar a URL: $url");
                return null;
            }
            // Retorna os dados decodificados em array associativo
            return json_decode($json, true);
        }
    }