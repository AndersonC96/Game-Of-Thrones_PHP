<?php
    namespace App\Models;
    class Book {
        // Obtém a lista de todos os livros da API
        public static function getAllBooks() {
            $url = 'https://www.anapioficeandfire.com/api/books';
            $json = file_get_contents($url);
            return json_decode($json, true);
        }
        // Obtém os detalhes de um livro específico pelo ID e os nomes dos personagens
        public static function getBookById($id, $page = 1, $perPage = 9) {
            $url = 'https://www.anapioficeandfire.com/api/books/' . $id;
            $json = @file_get_contents($url); // Timeout e supressão de avisos
            $book = json_decode($json, true);
            if (!empty($book['characters'])) {
                $book['character_names'] = [];
                $totalCharacters = count($book['characters']);
                $start = ($page - 1) * $perPage;
                $end = $start + $perPage;
                $count = 0;
                // Pega apenas os personagens da página atual
                for ($i = $start; $i < $end && $i < $totalCharacters; $i++) {
                    $characterUrl = $book['characters'][$i];
                    $characterJson = @file_get_contents($characterUrl);
                    if ($characterJson) {
                        $character = json_decode($characterJson, true);
                        if (isset($character['name']) && !empty($character['name'])) {
                            $book['character_names'][] = $character['name'];
                        } else {
                            $book['character_names'][] = "Nome desconhecido";
                        }
                    }
                }
                // Adiciona informações de paginação
                $book['pagination'] = [
                    'total' => $totalCharacters,
                    'page' => $page,
                    'perPage' => $perPage,
                    'totalPages' => ceil($totalCharacters / $perPage)
                ];
            }
            return $book;
        }
    }