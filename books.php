<html>
    <head>
        <title>As Crônicas de Gelo e Fogo | Livros</title>
        <link rel="shortcut icon" href="./favicon.ico"/>
        <embed name="myMusic" loop="true" hidden="true" src="./music.mp3">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
            $id =basename($_SERVER['REQUEST_URI']);
            $books_url = 'https://anapioficeandfire.com/api/books/'.$id;
            $curl = curl_init($books_url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json'
            ]);
            $response = curl_exec($curl);
            curl_close($curl);
            $json = $response . PHP_EOL;
            $json = json_decode($json, TRUE);
        ?>
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="active"><a href="./index.php">Livros</a></li>
                <li><a href="./houses.php">Casas</a></li>
                <li><a href="./characters.php">Personagens</a></li>
            </ul>
            <h2>Detalhes do livro</h2>
            <div class="table-bordered">
                <table class="table">
                    <?php
                        echo "<tr><td><b>Nome</b></td><td>".$json["name"]."</td></tr>";
                        echo "<tr><td><b>ISBN</b></td><td>".$json["isbn"]."</td></tr>";
                        echo "<tr><td><b>Autores</b></td><td>".implode(", ",$json["authors"])."</td></tr>";
                        echo "<tr><td><b>Número de páginas</b></td><td>".$json["numberOfPages"]."</td></tr>";
                        echo "<tr><td><b>Editora</b></td><td>".$json["publisher"]."</td></tr>";
                        echo "<tr><td><b>País</b></td><td>".$json["country"]."</td></tr>";
                        echo "<tr><td><b>Tipo de mídia</b></td><td>".$json["mediaType"]."</td></tr>";
                        echo "<tr><td><b>Número de personagens</b></td><td>".count($json["characters"])."</td></tr>";
                        //echo "<tr><td>Released</td><td>".$json["released"]."</td></tr>";
                        echo "<tr><td><b>Lançamento</b></td><td>".date ("d/m/Y", strtotime($json["released"]))."</td></tr>";
                        //echo "<tr><td>Pov Characters</td><td>".implode(", ",$json["povCharacters"])."</td></tr>";
                        //echo "<tr><td>Characters</td><td>".implode(", ",$json["characters"])."</td></tr>";
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>