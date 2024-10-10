<?php
    class CharacterController {
        public function index() {
            $characters = Character::all();
            if (isset($_GET['search'])) {
                $searchTerm = strtolower($_GET['search']);
                $characters = array_filter($characters, function ($character) use ($searchTerm) {
                    return strpos(strtolower($character['name']), $searchTerm) !== false;
                });
            }
            include '../app/views/characters/index.php';
        }
        public function show($id) {
            $character = Character::find($id);
            if ($character) {
                include '../app/views/characters/show.php';
            } else {
                http_response_code(404);
                echo "Personagem não encontrado!";
            }
        }
    }