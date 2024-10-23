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
}
