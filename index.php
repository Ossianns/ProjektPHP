<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_index.css">
</head>

<body>
    <div class="wrapper">
        <div class="sen_flo">
            <div class="rubrik">
                <h1>Senast tillagda</h1>
            </div>
            <div class="flow">
                <?php
                try {
                    // Kopplar oss till databasen
                    require_once "php/connector.php";
                    $pdo = connectToDB();

                    // Väljer datan
                    $sql = "SELECT * FROM skivor JOIN artister ON artister.artistid = skivor.artistid;";
                    $stmt = $pdo->query($sql);
                    $result = $stmt->fetchAll();

                    // Skapar en array som vi sedan fyller med artistnamn och skiva 
                    $array = [];

                    // Skapar en loop som lägger till elementen i $array
                    foreach ($result as $row) {

                        $array[] = [
                            'skivnamn' => $row['skivnamn'],
                            'artistnamn' => $row['artistnamn']
                        ];

                    }

                    // reversar arrayen så att det senaste man la till hamnar högst upp på sidan
                    $array = array_reverse($array);

                    // Loopar och skriver ut skivnamn och artistnamn
                    foreach ($array as $item) {
                        echo $item['skivnamn'] . " - " . $item['artistnamn'] . "<br> <br>";
                    }
                } catch (PDOException $e) {
                    die("Fel: " . $e->getMessage());
                }
                ?>
            </div>
        </div>
        <div class="knappar">
            <a href="läggtill.php" class="länk">
                <div class="knapp knapp_artist">Lägg till artister/skiva</div>
            </a>
            <a href="redigera.php" class="länk">
                <div class="knapp">Redigera</div>
            </a>
            <a href="lista.php" class="länk">
                <div class="knapp">Lista</div>
            </a>
        </div>
    </div>
</body>

</html>