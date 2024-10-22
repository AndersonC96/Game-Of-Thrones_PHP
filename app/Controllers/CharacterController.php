<?php
    namespace App\Controllers;
    use App\Models\Character;
    class CharacterController {
        // Método para exibir a lista de personagens
        public function index() {
            // Obtém todos os personagens do modelo Character
            $characters = Character::getAllCharacters();
            // Define o caminho da view para listar os personagens
            $content = '../app/Views/characters/index.php';
            // Chama o layout principal com o conteúdo da view
            require_once '../app/Views/layouts/layout.php';
        }
        // Método para exibir os detalhes de um personagem específico
        public function details($id) {
            // Obtém o personagem com base no ID
            $character = Character::getCharacterById($id);
            // Define o caminho da view para exibir os detalhes do personagem
            $content = '../app/Views/characters/details.php';
            // Chama o layout principal com o conteúdo da view
            require_once '../app/Views/layouts/layout.php';
        }
    }