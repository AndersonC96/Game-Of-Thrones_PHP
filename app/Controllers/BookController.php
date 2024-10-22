<?php
    namespace App\Controllers;
    use App\Models\Book;
    class BookController {
        // Método para exibir a lista de livros
        public function index() {
            // Obtém todos os livros do modelo Book
            $books = Book::getAllBooks();
            // Define o caminho da view para listar os livros
            $content = '../app/Views/books/index.php';
            // Chama o layout principal com o conteúdo da view
            require_once '../app/Views/layouts/layout.php';
        }
        // Método para exibir os detalhes de um livro específico
        public function details($id) {
            // Obtém o livro com base no ID
            $book = Book::getBookById($id);
            // Define o caminho da view para exibir os detalhes do livro
            $content = '../app/Views/books/details.php';
            // Chama o layout principal com o conteúdo da view
            require_once '../app/Views/layouts/layout.php';
        }
    }