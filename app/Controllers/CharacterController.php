<?php
    namespace App\Controllers;
    use App\Models\Character;
    class CharacterController {
        // Método para listar todos os personagens com paginação
        public function index() {
            $charactersPerPage = 12; // Número de personagens por página
            $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            if ($currentPage < 1) {
                $currentPage = 1;
            }
            // Obtém os personagens da API com paginação
            $characters = Character::getAllCharacters($currentPage, $charactersPerPage);
            // Verifica se houve um erro ao buscar os personagens
            if (empty($characters)) {
                $charactersToShow = [];
            } else {
                $charactersToShow = $characters;
            }
            // Define o número total de personagens e de páginas (ajuste conforme necessário)
            $totalCharacters = 444; // Por exemplo, supondo que há 444 personagens
            $totalPages = ceil($totalCharacters / $charactersPerPage);
            // Renderiza a view passando as variáveis
            $content = '../app/Views/characters/index.php';
            require_once '../app/Views/layouts/layout.php';
        }
        public function details() {
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