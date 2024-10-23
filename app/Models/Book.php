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
        public static function getBookById($id) {
            $url = 'https://www.anapioficeandfire.com/api/books/' . $id;
            $json = file_get_contents($url);
            $book = json_decode($json, true);
            // Verifica se o livro tem personagens e busca os nomes dos personagens
            if (!empty($book['characters'])) {
                $book['character_names'] = [];
                foreach ($book['characters'] as $characterUrl) {
                    // Faz a requisição para cada personagem
                    $characterJson = file_get_contents($characterUrl);
                    $character = json_decode($characterJson, true);
                    // Adiciona o nome do personagem ao array
                    if (isset($character['name']) && !empty($character['name'])) {
                        $book['character_names'][] = $character['name'];
                    } else {
                        // Caso o personagem não tenha um nome, adiciona uma string de aviso
                        $book['character_names'][] = "Nome desconhecido";
                    }
                }
            }
            return $book;
        }
    }