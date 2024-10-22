<?php
    namespace App\Controllers;
    use App\Core\Controller;
    class HomeController extends Controller {
        // Método para exibir a página inicial
        public function index() {
            // Dados que podem ser passados para a view, se necessário
            $data = [
                'title' => 'Bem-vindo à API Game of Thrones',
                'description' => 'Explore informações sobre livros, personagens e casas do universo de Game of Thrones.'
            ];
            // Carrega a view da página inicial e passa os dados
            $this->view('home/index', $data);
        }
    }