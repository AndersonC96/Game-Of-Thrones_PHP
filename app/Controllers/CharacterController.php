<?php
    namespace App\Controllers;
    use App\Models\Character;
    class CharacterController {
        // Método para listar personagens com paginação e busca
        public function index() {
            $search = $_GET['search'] ?? null;
            $page = $_GET['page'] ?? 1;
            if ($search) {
                $characters = Character::searchCharacterByName($search, $page);
            } else {
                $characters = Character::getAllCharacters($page);
            }
            $content = '../app/Views/characters/index.php';
            require_once '../app/Views/layouts/layout.php';
        }
        // Método para exibir detalhes de um personagem
        public function details($id) {
            // Extrai o ID numérico do final da URL
            $id = basename($id);
            // Obtém o personagem com base no ID
            $character = Character::getCharacterById($id);
            // Define o caminho da view para exibir os detalhes do personagem
            $content = '../app/Views/characters/details.php';
            require_once '../app/Views/layouts/layout.php';
        }
    }