<?php
    namespace App\Controllers;
    use App\Models\House;
    class HouseController {
        public function index() {
            // Configurações de paginação
            $housesPerPage = 12; // Exibir 12 casas por página
            $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
            if ($currentPage < 1) {
                $currentPage = 1;
            }
            // Obtém as casas da API com paginação
            $houses = House::getAllHouses($currentPage, $housesPerPage);
            $totalHouses = 444; // Definir manualmente, pois a API não retorna o total
            $totalPages = ceil($totalHouses / $housesPerPage);
            // Verifica se há casas retornadas
            if (empty($houses)) {
                $housesToShow = [];
            } else {
                foreach ($houses as &$house) {
                    // Busca o nome do overlord
                    if (!empty($house['overlord'])) {
                        $house['overlordName'] = House::getHouseOrCharacterNameByUrl($house['overlord']);
                    }
                    // Busca o nome do currentLord
                    if (!empty($house['currentLord'])) {
                        $house['currentLordName'] = House::getHouseOrCharacterNameByUrl($house['currentLord']);
                    }
                }
                $housesToShow = $houses;
            }
            // Define o caminho da view para listar as casas
            $content = '../app/Views/houses/index.php';
            require_once '../app/Views/layouts/layout.php';
        }
        // Adicionando o método details para exibir detalhes de uma casa
        public function details() {
            // Obtém o ID da casa a partir da URL
            if (!isset($_GET['id'])) {
                die('ID da casa não fornecido');
            }
            $houseUrl = urldecode($_GET['id']);
            // Busca os detalhes da casa pela URL
            $house = House::getHouseByUrl($houseUrl);
            if (!$house) {
                die('Casa não encontrada.');
            }
            // Busca nomes para overlord e currentLord, se aplicável
            if (!empty($house['overlord'])) {
                $house['overlordName'] = House::getHouseOrCharacterNameByUrl($house['overlord']);
            }
            if (!empty($house['currentLord'])) {
                $house['currentLordName'] = House::getHouseOrCharacterNameByUrl($house['currentLord']);
            }
            // Exibe a página de detalhes
            $content = '../app/Views/houses/details.php';
            require_once '../app/Views/layouts/layout.php';
        }
    }