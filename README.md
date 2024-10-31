# Game of Thrones API Interface
 
<p align="center">
  <img src="https://img.shields.io/badge/PHP-7.4%2B-blue" alt="PHP Version">
  <img src="https://img.shields.io/badge/Bootstrap-5.3.3-blueviolet" alt="Bootstrap Version">
  <img src="https://img.shields.io/badge/MySQL-Compatible-orange" alt="MySQL Compatibility">
  <img src="https://img.shields.io/badge/Composer-Compatible-brown" alt="Composer">
  <img src="https://img.shields.io/badge/Status-Em%20Desenvolvimento-green" alt="Status">
</p>

<p align="center">
![image](https://github.com/user-attachments/assets/6c283560-ef8f-4467-b725-85fcbf3032bd)
</p>

# Descrição

Este projeto é uma interface web para explorar informações sobre o universo de Game of Thrones, utilizando a [An API of Ice and Fire](https://anapioficeandfire.com/). Ele permite visualizar personagens, casas e livros do universo, com uma navegação amigável, filtros e uma experiência visual estilizada.

A interface foi construída usando PHP para o backend, Bootstrap para o frontend e CSS customizado para a personalização de estilo. O projeto permite que o usuário busque informações, visualize detalhes de personagens e explore diferentes recursos do universo Game of Thrones.

# Funcionalidades

- **Exploração de Personagens**: Listagem e pesquisa de personagens com paginação.
- **Visualização de Detalhes**: Informações detalhadas sobre personagens, casas e livros.
- **Filtro de Pesquisa**: Filtragem de personagens por nome.
- **Interface Estilizada**: Layout customizado com temas escuros e efeitos visuais.

# Pré-requisitos

- **PHP** (versão 7.4 ou superior)
- **Composer** para gerenciamento de dependências (opcional)
- Servidor local como **XAMPP**, **WAMP**, ou **Laragon**
- **Bootstrap** e **jQuery** já incluídos no projeto

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

# Instalação

1. **Clone o repositório**:

```bash
git clone https://github.com/AndersonC96/Game-Of-Thrones_PHP.git
cd Game-Of-Thrones_PHP
```

2. **Instale as dependências**:

```bash
git clone https://github.com/AndersonC96/Game-Of-Thrones_PHP.git
cd Game-Of-Thrones_PHP
```

3. **Configure o servidor local**:

Coloque o projeto em um ambiente de servidor local. Se estiver usando **XAMPP**, mova-o para a pasta `htdocs`. Acesse `http://localhost/Game-Of-Thrones_PHP` no navegador.

4. **Configurando o arquivo `index.php`**:

Certifique-se de que o arquivo `public/index.php` aponta corretamente para os controladores e rotas da aplicação.

5. **Verifique a API**:

Assegure-se de que a [An API of Ice and Fire](https://anapioficeandfire.com/) esteja acessível, pois o projeto depende dela para obter dados sobre personagens, casas e livros.

# Como Usar

1. **Acessando o Projeto**:
Abra o navegador e vá para `http://localhost/Game-Of-Thrones_PHP`.

2. **Navegação**:
-**Livros**: Exibe uma lista de livros com título, autor e data de lançamento.
-**Personagens**: Permite pesquisar personagens pelo nome e ver os detalhes como afiliações e família.
-**Casas**: Visualize casas com detalhes como região, lema, brasão e membros.

3. **Detalhes dos Itens**:

Clicando em "**Ver detalhes**" em qualquer item da lista, você será redirecionado para uma página com detalhes completos sobre o personagem, casa ou livro selecionado.

4. **Paginação e Navegação**:
Use os botões de paginação na parte inferior das listas para navegar entre os resultados.

# Exemplo de Código

Aqui está um exemplo de como o controlador de personagens é configurado no projeto:

```bash
namespace App\Controllers;

use App\Models\Character;

class CharacterController {
    public function index() {
        // Configurações de paginação
        $charactersPerPage = 12;
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // Obtém personagens da API
        $characters = Character::getAllCharacters($currentPage, $charactersPerPage);
        $content = '../app/Views/characters/index.php';
        require_once '../app/Views/layouts/layout.php';
    }
}
```

# Customização

O estilo do projeto foi configurado no arquivo `custom.css`, que inclui:

**Tema escuro** para a interface principal
**Estilos personalizados** para cards, botões e elementos de navegação
**Efeitos de hover** em botões e cards
Para personalizar ainda mais, edite o arquivo `public/assets/css/custom.css`.
