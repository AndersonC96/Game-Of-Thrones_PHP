<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>As Crônicas de Gelo e Fogo | Game of Thrones</title>
        <link rel="shortcut icon" href="./favicon.ico"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    </head>
    <body>
        <?php
            $books_url = 'https://anapioficeandfire.com/api/books?page=1&pageSize=50';
            $curl = curl_init($books_url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json'
            ]);
            $response = curl_exec($curl);
            curl_close($curl);
            $json = $response . PHP_EOL;
            $json = json_decode($json, TRUE);
            function released($released){
                return date("d/m/Y", strtotime($released));
            }
        ?>
        <nav class="container-fluid">
            <ul>
                <li><strong>Game of Thrones</strong></li>
            </ul>
            <ul>
                <li><a href="./index.php">Livros</a></li>
                <li><a href="./houses.php">Casas</a></li>
                <li><a href="./characters.php">Personagens</a></li>
            </ul>
        </nav>
        <main class="container">
            <div class="grid">
                <section>
                    <hgroup>
                        <h2>Livros de As Crônicas de Gelo e Fogo</h2>
                        <h3>Explore a saga épica</h3>
                    </hgroup>
                    <p>Descubra os detalhes de cada livro da série que inspirou a aclamada série de TV Game of Thrones.</p>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>ISBN</th>
                                    <th>Autores</th>
                                    <th>Número de páginas</th>
                                    <th>Editora</th>
                                    <th>País</th>
                                    <th>Tipo de mídia</th>
                                    <th>Lançamento</th>
                                    <th>Número de personagens</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($json as $obj){
                                        $id = str_replace("https://anapioficeandfire.com/api/books/","",$obj["url"]);
                                        echo "<tr>";
                                        echo "<td hidden>".$obj["url"]."</td>";
                                        echo "<td><a href='books.php/$id' target='blank'>".$obj["name"]."</a></td>";
                                        echo "<td>".$obj["isbn"]."</td>";
                                        echo "<td>".$obj["authors"][0]."</td>";
                                        echo "<td>".$obj["numberOfPages"]."</td>";
                                        echo "<td>".$obj["publisher"]."</td>";
                                        echo "<td>".$obj["country"]."</td>";
                                        echo "<td>".$obj["mediaType"]."</td>";
                                        echo "<td>".date("d/m/Y", strtotime($obj["released"]))."</td>";
                                        echo "<td>".count($obj["characters"])."</td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </main>
        <footer class="container">
            <small>
                <a href="#">Política de Privacidade</a> • <a href="#">Termos de Uso</a>
            </small>
        </footer>
    </body>
</html>