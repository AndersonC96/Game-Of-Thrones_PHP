<?php
    namespace App\Controllers;
    use App\Models\House;
    class HouseController {
        public function index() {
            // Configurações de paginação
            $housesPerPage = 12;
            $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
            if ($currentPage < 1) {
                $currentPage = 1;
            }
            // Obtém as casas da API com paginação
            $houses = House::getAllHouses($currentPage, $housesPerPage);
            $totalHouses = 444;
            $totalPages = ceil($totalHouses / $housesPerPage);
            // Ajuste para mostrar os detalhes dos lordes e overlords
            foreach ($houses as &$house) {
                if (!empty($house['overlord'])) {
                    $house['overlordName'] = House::getHouseOrCharacterNameByUrl($house['overlord']);
                }
                if (!empty($house['currentLord'])) {
                    $house['currentLordName'] = House::getHouseOrCharacterNameByUrl($house['currentLord']);
                }
            }
            $content = '../app/Views/houses/index.php';
            require_once '../app/Views/layouts/layout.php';
        }
        public function details() {
            // Verifica se o ID foi passado na URL
            if (!isset($_GET['id'])) {
                die('ID da casa não fornecido');
            }
            $houseUrl = urldecode($_GET['id']);
            $house = House::getHouseByUrl($houseUrl);
            if (!$house) {
                die('Casa não encontrada.');
            }
            // Busca nomes para overlord e currentLord
            if (!empty($house['overlord'])) {
                $house['overlordName'] = House::getHouseOrCharacterNameByUrl($house['overlord']);
            }
            if (!empty($house['currentLord'])) {
                $house['currentLordName'] = House::getHouseOrCharacterNameByUrl($house['currentLord']);
            }
            // Paginação de personagens
            $charactersPerPage = 5; // Definindo 5 personagens por página
            $characters = $house['swornMembers'];
            $totalCharacters = count($characters);
            $totalCharacterPages = ceil($totalCharacters / $charactersPerPage);
            $characterPage = isset($_GET['characterPage']) ? (int)$_GET['characterPage'] : 1;
            if ($characterPage < 1) {
                $characterPage = 1;
            }
            // Paginar os personagens
            $startIndex = ($characterPage - 1) * $charactersPerPage;
            $charactersToShow = array_slice($characters, $startIndex, $charactersPerPage);
            // Pega os nomes dos personagens para exibir ao invés do link
            foreach ($charactersToShow as &$characterUrl) {
                $characterUrl = House::getHouseOrCharacterNameByUrl($characterUrl);
            }
            $content = '../app/Views/houses/details.php';
            require_once '../app/Views/layouts/layout.php';
        }
    }