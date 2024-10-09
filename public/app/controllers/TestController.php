<?php
    class TestController {
        public function index() {
            echo "Página inicial do sistema!";
        }
        public function hello($name) {
            echo "Olá, " . htmlspecialchars($name) . "!";
        }
    }