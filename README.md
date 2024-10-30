# Game of Thrones API Interface
 
<p align="center">
  <img src="https://img.shields.io/badge/PHP-7.4%2B-blue" alt="PHP Version">
  <img src="https://img.shields.io/badge/Bootstrap-5.3.3-blueviolet" alt="Bootstrap Version">
  <img src="https://img.shields.io/badge/MySQL-Compatible-orange" alt="MySQL Compatibility">
  <img src="https://img.shields.io/badge/Composer-Compatible-brown" alt="Composer">
  <img src="https://img.shields.io/badge/Status-Em%20Desenvolvimento-green" alt="Status">
</p>

![image](https://github.com/user-attachments/assets/6c283560-ef8f-4467-b725-85fcbf3032bd)

# Descrição

Este projeto é uma interface web para explorar informações sobre o universo de Game of Thrones, utilizando a [An API of Ice and Fire](https://anapioficeandfire.com/). Ele permite visualizar personagens, casas e livros do universo, com uma navegação amigável, filtros e uma experiência visual estilizada.

A interface foi construída usando PHP para o backend, Bootstrap para o frontend e CSS customizado para a personalização de estilo. O projeto permite que o usuário busque informações, visualize detalhes de personagens e explore diferentes recursos do universo Game of Thrones.

# Funcionalidades

- **Exploração de Personagens: Listagem e pesquisa de personagens com paginação.
- **Visualização de Detalhes: Informações detalhadas sobre personagens, casas e livros.
- **Filtro de Pesquisa: Filtragem de personagens por nome.
- **Interface Estilizada: Layout customizado com temas escuros e efeitos visuais.

# Pré-requisitos

- **PHP (versão 7.4 ou superior)
- **Composer para gerenciamento de dependências (opcional)
- **Servidor local como XAMPP, WAMP, ou Laragon
- **Bootstrap e jQuery já incluídos no projeto

# Estrutura do Projeto

```bash
 .
├── app
│   ├── Controllers         # Controladores que gerenciam as requisições
│   ├── Models              # Modelos de dados para Personagens, Casas, e Livros
│   └── Views               # Arquivos de visualização para renderizar as páginas
│       ├── characters      # Views específicas para personagens
│       ├── houses          # Views específicas para casas
│       └── books           # Views específicas para livros
├── public
│   ├── index.php           # Arquivo de entrada principal
│   └── assets
│       ├── css             # Estilos customizados (custom.css)
│       └── js              # Scripts JS customizados
└── README.md               # Documentação do projeto
```
