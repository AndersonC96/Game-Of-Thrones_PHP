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
        public function details($id) {
            // Verifica se a página foi passada na URL, caso contrário, define como 1
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            // Obtém o livro com base no ID e na página
            $book = Book::getBookById($id, $page);
            // Define o caminho da view para exibir os detalhes do livro
            $content = '../app/Views/books/details.php';
            // Chama o layout principal com o conteúdo da view
            require_once '../app/Views/layouts/layout.php';
        }
    }