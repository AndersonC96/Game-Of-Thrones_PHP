<?php

namespace App\Controllers;

use App\Models\Character;

class CharacterController
{
    public function details()
    {
        // Verifica se o ID do personagem foi passado na URL
        if (!isset($_GET['id'])) {
            die('ID do personagem não fornecido');
        }

        $characterUrl = urldecode($_GET['id']);
        $character = Character::getCharacterByUrl($characterUrl);

        // Verifica se o personagem foi encontrado
        if (!$character) {
            die('Personagem não encontrado.');
        }

        // Busca o nome do pai, se o campo `father` contiver uma URL
        if (!empty($character['father'])) {
            $character['fatherName'] = Character::getCharacterOrHouseNameByUrl($character['father']);
        }

        // Renderiza a view passando as variáveis
        $content = '../app/Views/characters/details.php';
        require_once '../app/Views/layouts/layout.php';
    }
}
