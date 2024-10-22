<?php
    namespace App\Models;
    class Book {
        // Obtém a lista de todos os livros da API
        public static function getAllBooks() {
            // URL da API para buscar todos os livros
            $url = 'https://api.gameofthrones.com/books'; // Substitua pela URL real da API
            // Faz a requisição GET para a API
            $json = file_get_contents($url);
            // Decodifica o JSON retornado e o transforma em um array associativo
            return json_decode($json, true);
        }
        // Obtém os detalhes de um livro específico pelo ID
        public static function getBookById($id) {
            // URL da API para buscar os detalhes de um livro específico pelo ID
            $url = 'https://api.gameofthrones.com/books/' . $id; // Substitua pela URL real da API
            // Faz a requisição GET para a API
            $json = file_get_contents($url);
            // Decodifica o JSON retornado e o transforma em um array associativo
            return json_decode($json, true);
        }
    }