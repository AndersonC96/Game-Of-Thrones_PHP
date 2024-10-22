<?php
    namespace App\Controllers;
    use App\Models\House;
    class HouseController {
        // Método para exibir a lista de casas
        public function index() {
            // Obtém todas as casas do modelo House
            $houses = House::getAllHouses();
            // Define o caminho da view para listar as casas
            $content = '../app/Views/houses/index.php';
            // Chama o layout principal com o conteúdo da view
            require_once '../app/Views/layouts/layout.php';
        }
        // Método para exibir os detalhes de uma casa específica
        public function details($id) {
            // Obtém a casa com base no ID
            $house = House::getHouseById($id);
            // Define o caminho da view para exibir os detalhes da casa
            $content = '../app/Views/houses/details.php';
            // Chama o layout principal com o conteúdo da view
            require_once '../app/Views/layouts/layout.php';
        }
    }
