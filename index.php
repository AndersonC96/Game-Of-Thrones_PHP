<html>
    <head>
        <title>A Song of Ice and Fire | Game of Thrones</title>
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
                <li class="active"><a href="./index.php">Books</a></li>
                <li><a href="./houses.php">Houses</a></li>
                <li><a href="./characters.php">Characters</a></li>
            </ul>
            <h2>Books of A Song of Ice and Fire</h2>
            <div class="table-bordered">
                <table class="table">
                    <thead>
                        <td hidden>URL</td>
                        <td>Name</td>
                        <td>ISBN</td>
                        <td>Authors</td>
                        <td>Number Of Pages</td>
                        <td>Publisher</td>
                        <td>Country</td>
                        <td>Media Type</td>
                        <td>Released</td>
                        <td>Number of Characters</td>
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
                            echo "<td>".$obj["released"]."</td>";
                            echo "<td>".count($obj["characters"])."</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>