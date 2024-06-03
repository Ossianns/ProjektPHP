<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_lista.css">
</head>

<body>
    <a href="index.php">
        <div class="hemknapp">Hem</div>
    </a>
    <div class="wrapper">
        <div class="firstrow">
            <form action="" method="POST">
                <label for="artistnamn">Lista</label>
                <select name="artist" id="artistnamn">
                    <?php
                    require_once "functions/functions.php";

                    // Denna funktion loopar ut artisterna i en drop down meny
                    listaartister();

                    // Denna option läggs till så att man kan välja "Alla artister" i drop down meyn
                    echo "<option >Alla artister</option>"
                        ?>
                </select>
                <input type="submit" name="utför3" value="UTFÖR">
            </form>
        </div>
        <div class="flow">
            <?php

            if (isset($_POST["artist"])) {
                // Tar fram inputen
                $artist = $_POST["artist"];

            }
            if ($_SERVER["REQUEST_METHOD"] == "POST" && $artist == "Alla artister" && isset($_POST["utför3"])) {

                require_once "functions/functions.php";

                // Denna funktion loopar ut artisterna i en drop down meny
                listaartister();

            } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["utför3"])) {

                try {
                    // Kopplar oss till databasen
                    require_once "php/connector.php";
                    $pdo = connectToDB();

                    // Selectar artisterna
                    $sql = "SELECT artistnamn FROM artister WHERE artistid = $artist;";
                    $stmt = $pdo->query($sql);
                    $result = $stmt->fetchAll();

                    // Selectar skivorna
                    $sql2 = "SELECT skivnamn FROM skivor WHERE artistid = $artist;";
                    $stmt2 = $pdo->query($sql2);
                    $result2 = $stmt2->fetchAll();

                    // Loopar ut artisterna
                    foreach ($result as $row) {
                        echo implode($row);
                        echo " ";
                    }

                    echo " - ";

                    // Tar fram längden på array:n
                    $längd2 = count($result2);

                    $x = 0;

                    // Loopar ut skivorna
                    foreach ($result2 as $row2) {
                        echo implode($row2);

                        // Så länge $x inte är lika med längden på arrayen så skriv ut ett ","
                        // Detta gör så att vi får ett kommatecken efter varje album förutom det sista
                        $x = $x + 1;
                        if ($x !== $längd2) {
                            echo ", ";
                        }
                    }
                } catch (PDOException $e) {
                    die("Fel: " . $e->getMessage());
                }

            } else {
                // medelande vid start
                echo "Vänligen välj en artist för att lista ut artisten och dess skivor <br> eller Alla artister för att lista ut alla artister";
            }
            ?>
        </div>
    </div>
</body>

</html>