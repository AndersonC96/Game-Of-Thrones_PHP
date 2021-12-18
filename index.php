<html>
    <head>
        <title>As Crônicas de Gelo e Fogo | Game of Thrones</title>
        <link rel="shortcut icon" href="./favicon.ico"/>
        <embed name="myMusic" loop="true" hidden="true" src="./music.mp3">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="active"><a href="./index.php">Livros</a></li>
                <li><a href="./houses.php">Casas</a></li>
                <li><a href="./characters.php">Personages</a></li>
            </ul>
            <h2>Livros of As Crônicas de Gelo e Fogo</h2>
            <div class="table-bordered">
                <table class="table">
                    <thead>
                        <td hidden>URL</td>
                        <td>Nome</td>
                        <td>ISBN</td>
                        <td>Autores</td>
                        <td>Número de páginas</td>
                        <td>Editora</td>
                        <td>País</td>
                        <td>Tipo de mídia</td>
                        <td>Released</td>
                        <td>Número de personagens</td>
                    </thead>
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
                            //echo "<td>".$obj["released"]."</td>";//date("d/m/Y", strtotime($obj["released"]))."</td>";
                            echo "<td>".date("d/m/Y", strtotime($obj["released"]))."</td>";
                            echo "<td>".count($obj["characters"])."</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>