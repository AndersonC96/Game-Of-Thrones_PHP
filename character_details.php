<html>
    <head>
        <title>As Crônicas de Gelo e Fogo | Personagens</title>
        <link rel="shortcut icon" href="./favicon.ico"/>
        <embed name="myMusic" loop="true" hidden="true" src="./music.mp3">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
            $id =basename($_SERVER['REQUEST_URI']);
            $url = 'https://anapioficeandfire.com/api/characters/'.$id;
            $curl = curl_init($url);
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
                <li><a href="./index.php">Livros</a></li>
                <li><a href="./houses.php">Casas</a></li>
                <li  class="active"><a href="./characters.php">Personagens</a></li>
            </ul>
            <h1>Detalhes do personagem</h1>
            <div class="table-bordered">
                <table class="table">
                    <?php
                        echo "<tr><td><b>Nome</b></td><td>".$json["name"]."</td></tr>";
                        echo "<tr><td><b>Apelido(s)</b></td><td>".implode(", ",$json["aliases"])."</td></tr>";
                        echo "<tr><td><b>Gênero</b></td><td>".$json["gender"]."</td></tr>";
                        echo "<tr><td><b>Cultura</b></td><td>".$json["culture"]."</td></tr>";
                        echo "<tr><td><b>Nascimento</b></td><td>".$json["born"]."</td></tr>";
                        echo "<tr><td><b>Morte</b></td><td>".$json["died"]."</td></tr>";
                        echo "<tr><td><b>Títulos</b></td><td>".implode(", ",$json["titles"])."</td></tr>";
                        echo "<tr><td><b>Pai</b></td><td>".$json["father"]."</td></tr>";
                        echo "<tr><td><b>Mãe</b></td><td>".$json["mother"]."</td></tr>";
                        /*echo "<tr><td>Father </td><td>".$json["father"]."</td></tr>";
                        echo "<tr><td>Mother </td><td>".$json["mother"]."</td></tr>";
                        echo "<tr><td>Spouse </td><td>".$json["spouse"]."</td></tr>";*/
                        echo "<tr><td><b>Série de TV</b></td><td>".implode(", ",$json["tvSeries"])."</td></tr>";
                        echo "<tr><td><b>Ator/Atriz</b></td><td>".implode(", ",$json["playedBy"])."</td></tr>";
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>