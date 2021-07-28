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
            $url = 'https://anapioficeandfire.com/api/characters?page=1&pageSize=50';
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
                <li><a href="index.php">Books</a></li>
                <li><a href="houses.php">Houses</a></li>
                <li  class="active"><a href="characters.php">Characters</a></li>
            </ul>
            <h1>Characters</h1>
            <div class="table-bordered">
                <table class="table">
                    <thead>
                        <td hidden>URL</td>
                        <td>Name</td>
                        <td>Gender</td>
                        <td>Culture</td>
                        <td>Born</td>
                        <td>Died</td>
                        <td>Titles</td>
                        <td>Aliases</td>
                        <td>Played By</td>
                    </thead>
                    <?php
                        foreach($json as $obj){
                            $id = str_replace("https://anapioficeandfire.com/api/characters/","",$obj["url"]);
                            echo "<tr>";
                            echo "<td hidden>".$obj["url"]."</td>";
                            echo "<td><a href='character_details.php/$id' target='blank'>".$obj["name"]."</a></td>";
                            echo "<td>".$obj["gender"]."</td>";
                            echo "<td>".$obj["culture"]."</td>";
                            echo "<td>".$obj["born"]."</td>";
                            echo "<td>".$obj["died"]."</td>";
                            echo "<td>".$obj["titles"][0]."</td>";
                            echo "<td><a href='character_details.php/$id' target='blank'>".$obj["aliases"][0]."</a></td>";
                            echo "<td>".$obj["playedBy"][0]."</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
                <ul class="pager">
                    <li class="previous"><a href="#">Previous</a></li>
                    <li class="next"><a href="#">Next</a></li>
                </ul>
            </div>
        </div>
    </body>
</html>