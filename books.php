<html>
    <head>
        <title>A Song of Ice and Fire | Books</title>
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
                <li class="active"><a href="./index.php">Books</a></li>
                <li><a href="./houses.php">Houses</a></li>
                <li><a href="./characters.php">Characters</a></li>
            </ul>
            <h2>Book Details</h2>
            <div class="table-bordered">
                <table class="table">
                    <?php
                        echo "<tr><td>Name</td><td>".$json["name"]."</td></tr>";
                        echo "<tr><td>ISBN</td><td>".$json["isbn"]."</td></tr>";
                        echo "<tr><td>Authors</td><td>".implode(", ",$json["authors"])."</td></tr>";
                        echo "<tr><td>Number of Pages</td><td>".$json["numberOfPages"]."</td></tr>";
                        echo "<tr><td>Publisher</td><td>".$json["publisher"]."</td></tr>";
                        echo "<tr><td>Country</td><td>".$json["country"]."</td></tr>";
                        echo "<tr><td>Media Type</td><td>".$json["mediaType"]."</td></tr>";
                        echo "<tr><td>Number of Characters</td><td>".count($json["characters"])."</td></tr>";
                        echo "<tr><td>Released</td><td>".count($json["released"])."</td></tr>";
                        echo "<tr><td>Pov Characters</td><td>".implode(", ",$json["povCharacters"])."</td></tr>";
                        echo "<tr><td>Characters</td><td>".implode(", ",$json["characters"])."</td></tr>";
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>