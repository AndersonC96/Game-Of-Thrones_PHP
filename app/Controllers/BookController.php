<?php
    namespace App\Controllers;
    use App\Models\Book;
    class BookController {
        // Método para exibir a lista de livros
        public function index() {
            $books = Book::getAllBooks();
            $content = '../app/Views/books/index.php';
            require_once '../app/Views/layouts/layout.php';
        }
        // Método para exibir os detalhes de um livro específico
        public function details() {
            // Obtenha o ID via GET
            $id = $_GET['id'] ?? null;
            if ($id) {
                // Obtém os detalhes do livro com base no ID
                $book = Book::getBookById($id);
                $content = '../app/Views/books/details.php';
                require_once '../app/Views/layouts/layout.php';
            } else {
                echo "ID do livro não foi fornecido.";
            }
        }
    }