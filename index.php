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

                // Kopplar oss till databasen
                require_once "php/connector.php";
                $pdo = connectToDB();

                // Väljer all data
                $sql = "SELECT * FROM skivor JOIN artister ON artister.artistid = skivor.artist_id;";
                $stmt = $pdo->query($sql);
                $result = $stmt->fetchAll();

                // Loopar igenom skivorna och deras tillhörande artister för att displaya dem 
                
                foreach ($result as $row) {
                    echo $row['skivnamn'] . " - " . $row['artistnamn'] . "<br> <br>";
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