<?php

namespace App\Controllers;

use App\Models\Character;

class CharacterController
{
    public function index()
    {
        $charactersPerPage = 12;
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($currentPage < 1) {
            $currentPage = 1;
        }

        $search = isset($_GET['search']) ? trim($_GET['search']) : '';

        if ($search) {
            $characters = Character::searchCharactersByName($search, $currentPage, $charactersPerPage);
        } else {
            $characters = Character::getAllCharacters($currentPage, $charactersPerPage);
        }

        $charactersToShow = !empty($characters) ? $characters : [];
        $totalCharacters = 444; // Ajuste conforme o número total de personagens
        $totalPages = ceil($totalCharacters / $charactersPerPage);

        $content = '../app/Views/characters/index.php';
        require_once '../app/Views/layouts/layout.php';
    }

    public function details()
    {
        if (!isset($_GET['id'])) {
            die('ID do personagem não fornecido');
        }

        $characterUrl = urldecode($_GET['id']);
        $character = Character::getCharacterByUrl($characterUrl);

        if (!$character) {
            die('Personagem não encontrado.');
        }

        if (!empty($character['father'])) {
            $character['fatherName'] = Character::getCharacterOrHouseNameByUrl($character['father']);
        }

        $content = '../app/Views/characters/details.php';
        require_once '../app/Views/layouts/layout.php';
    }
}
