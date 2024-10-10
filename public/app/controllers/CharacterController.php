<?php
    class CharacterController {
        public function index() {
            $characters = Character::all();
            if (isset($_GET['search']) && !empty($_GET['search'])) {
                $searchTerm = filter_var($_GET['search'], FILTER_SANITIZE_STRING);
                $characters = array_filter($characters, function ($character) use ($searchTerm) {
                    return strpos(strtolower($character['name']), strtolower($searchTerm)) !== false;
                });
            }
            if (isset($_GET['house']) && !empty($_GET['house'])) {
                $house = filter_var($_GET['house'], FILTER_SANITIZE_STRING);
                $characters = array_filter($characters, function ($character) use ($house) {
                    return strpos(strtolower(implode(', ', $character['allegiances'])), strtolower($house)) !== false;
                });
            }
            if (isset($_GET['title']) && !empty($_GET['title'])) {
                $title = filter_var($_GET['title'], FILTER_SANITIZE_STRING);
                $characters = array_filter($characters, function ($character) use ($title) {
                    return strpos(strtolower(implode(', ', $character['titles'])), strtolower($title)) !== false;
                });
            }
            include '../app/views/characters/index.php';
        }
        public function show($id) {
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if ($id === false) {
                http_response_code(404);
                echo "Personagem não encontrado!";
                return;
            }
            $character = Character::find($id);
            if ($character) {
                include '../app/views/characters/show.php';
            } else {
                http_response_code(404);
                echo "Personagem não encontrado!";
            }
        }
    }