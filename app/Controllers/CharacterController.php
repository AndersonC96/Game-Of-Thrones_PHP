<?php
    namespace App\Controllers;
    use App\Models\Character;
    class CharacterController {
        public function index() {
            // Verificar se existe uma busca pelo nome
            $search = $_GET['search'] ?? null;
            $page = $_GET['page'] ?? 1;
            if ($search) {
                // Se houver uma busca, filtrar por nome
                $characters = Character::searchCharacterByName($search, $page);
            } else {
                // Caso contrário, obter todos os personagens
                $characters = Character::getAllCharacters($page);
            }
            $content = '../app/Views/characters/index.php';
            require_once '../app/Views/layouts/layout.php';
        }
    }