<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_läggtill.css">
</head>



<body>
    <a href="index.php">
        <div class="hemknapp">Hem</div>
    </a>
    <div class="wrapper">
        <div class="rubrik">
            <h1>Lägg till artist/skiva</h1>
        </div>
        <div class="namninput">
            <form action="php/form.php" method="post">
                <input type="text" id="artistnamn" name="artistnamn" placeholder="Artistnamn">
                <input type="submit" name="utför1" value="UTFÖR">
            </form>
        </div>
        <div class="skivinput">
            <form action="php/formSkiva.php" method="post">
                <select name="artist" id="">
                    <?php

                    // Kopplar oss till databasen
                    require_once "php/connector.php";
                    $pdo = connectToDB();

                    // Väljer all data
                    $sql = "SELECT * FROM artister;";
                    $stmt = $pdo->query($sql);
                    $result = $stmt->fetchAll();

                    // Loopar igenom artisterna för att displaya dem som options
                    foreach ($result as $row) {
                        echo "<option>" . $row['artistnamn'] . "</option>";
                    }

                    // $artist = $_POST["artist"];
                    echo "test";
                    ?>
                </select>
                <input type="text" name="skiva" placeholder="Skiva">
                <input type="text" name="genre" placeholder="Genre">
                <input type="number" name="betyg" placeholder="Betyg (1-10)">
                <input type="submit" name="utför2" value="UTFÖR">
            </form>
        </div>
    </div>
</body>

</html>