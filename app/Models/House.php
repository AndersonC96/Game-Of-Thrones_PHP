<?php

namespace App\Models;

class House
{
    public static function getAllHouses($currentPage, $housesPerPage)
    {
        $url = 'https://www.anapioficeandfire.com/api/houses?page=' . $currentPage . '&pageSize=' . $housesPerPage;

        // Faz a requisição GET para a API
        $json = @file_get_contents($url);

        // Verificar se a requisição foi bem-sucedida
        if ($json === FALSE) {
            return []; // Retorna uma lista vazia se a requisição falhar
        }

        // Decodifica o JSON retornado
        $houses = json_decode($json, true);

        // Certifique-se de que o resultado seja um array
        if (!is_array($houses)) {
            return [];
        }

        return $houses;
    }

    public static function getHouseOrCharacterNameByUrl($url)
    {
        $json = @file_get_contents($url);
        if ($json === FALSE) {
            return 'Nome não disponível'; // Se não conseguir buscar o nome
        }
        $data = json_decode($json, true);
        return !empty($data['name']) ? $data['name'] : 'Nome não disponível';
    }

    public static function getHouseById($id)
    {
        $url = 'https://www.anapioficeandfire.com/api/houses/' . $id;
        $json = @file_get_contents($url);
        if ($json === FALSE) {
            return null;
        }
        return json_decode($json, true);
    }
}
