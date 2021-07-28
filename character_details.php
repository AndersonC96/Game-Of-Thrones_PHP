<html>
    <head>
        <title>A Song of Ice and Fire | Characters</title>
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
                <li><a href="./index.php">Books</a></li>
                <li><a href="./houses.php">Houses</a></li>
                <li  class="active"><a href="./characters.php">Characters</a></li>
            </ul>
            <h1>Character Detail</h1>
            <div class="table-bordered">
                <table class="table">
                    <?php
                        echo "<tr><td>Name </td><td>".$json["name"]."</td></tr>";
                        echo "<tr><td>Aliases </td><td>".implode(", ",$json["aliases"])."</td></tr>";
                        echo "<tr><td>Gender </td><td>".$json["gender"]."</td></tr>";
                        echo "<tr><td>Culture </td><td>".$json["culture"]."</td></tr>";
                        echo "<tr><td>Born </td><td>".$json["born"]."</td></tr>";
                        echo "<tr><td>Died </td><td>".$json["died"]."</td></tr>";
                        echo "<tr><td>Titles </td><td>".implode(", ",$json["titles"])."</td></tr>";
                        echo "<tr><td>Tv Series </td><td>".implode(", ",$json["tvSeries"])."</td></tr>";
                        echo "<tr><td>Played By </td><td>".implode(", ",$json["playedBy"])."</td></tr>";
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>