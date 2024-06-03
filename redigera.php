<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_redigera.css">
</head>

<body>
    <div class="hemknapp">
        <a href="index.php">
            <div class="hemhemknapp">Hem</div>
        </a>
    </div>
    <div class="wrapper">
        <div class="rubrik">
            <h1>
                Redigera
            </h1>
        </div>
        <div class="tabell">
            <?php

            try {
                require_once "php/connector.php";
                $pdo = connectToDb();

                $sql = "SELECT artister.artistnamn, skivor.skivnamn,skivor.genre,skivor.betyg FROM artister JOIN skivor ON artister.artistid = skivor.artistid;";
                $stmt = $pdo->query($sql);
                $result = $stmt->fetchAll();

                echo "<table style='border-collapse: collapse; border: 1px solid black;'>";
                foreach ($result as $row) {
                    echo "<tr>";
                    foreach ($row as $column) {
                        echo "<td style='border: 1px solid black; padding: 8px;'>" . $column . "</td>";
                    }
                    echo "</tr>";
                }
            } catch (PDOException $e) {
                die("Fel: " . $e->getMessage());
            }

            ?>
        </div>
    </div>
    <div class="lastrow">
        <form action="php/formRedigera.php" method="POST">
            <label for="">Ta bort artist och alla tillhörande skivor:</label>
            <select name="artist" id="artistnamn">
                <?php
                require_once "functions/functions.php";
                listaartister();
                ?>
            </select>
            <input name="tabort" id="tabort" type="checkbox">
            <label for="tabort">Ta bort</label>
            <input type="submit" name="utför4" value="UTFÖR">
        </form>
    </div>
</body>

</html>