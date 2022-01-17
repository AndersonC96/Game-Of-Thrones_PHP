<html>
    <head>
        <title>As Crônicas de Gelo e Fogo | Casas</title>
        <link rel="shortcut icon" href="./favicon.ico"/>
        <embed name="myMusic" loop="true" hidden="true" src="./music.mp3">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
            $id =basename($_SERVER['REQUEST_URI']);
            $url = 'https://anapioficeandfire.com/api/houses/'.$id;
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
                <li><a href="index.php">Livros</a></li>
                <li class="active"><a href="houses.php">Casas</a></li>
                <li><a href="characters.php">Personagens</a></li>
            </ul>
            <h1>Detalhes da casa</h1>
            <div class="table-bordered">
                <table class="table">
                    <?php
                        echo "<tr><td><span><b>Nome</b></span></td><td>".$json["name"]."</td></tr>";
                        echo "<tr><td><b>Região</b></td><td>".$json["region"]."</td></tr>";
                        echo "<tr><td><b>Brazão</b></td><td>".$json["coatOfArms"]."</td></tr>";
                        echo "<tr><td><b>Lema</b></td><td>".$json["words"]."</td></tr>";
                        echo "<tr><td><b>Títulos</b></td><td>".implode(", ",$json["titles"])."</td></tr>";
                        echo "<tr><td><b>Residência</b></td><td>".implode(", ",$json["seats"])."</td></tr>";
                        echo "<tr><td><b>Criação</b></td><td>".$json["founded"]."</td></tr>";
                        echo "<tr><td><b>Fundador</b></td><td>".$json["founder"]."</td></tr>";
                        echo "<tr><td><b>Extinção</b></td><td>".$json["diedOut"]."</td></tr>";
                        echo "<tr><td><b>Armas Ancestrais</b></td><td>".implode(", ",$json["ancestralWeapons"])."</td></tr>";
                        //echo "<tr><td>Cadet Branches</td><td>".implode(", ",$json["cadetBranches"])."</td></tr>";
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>