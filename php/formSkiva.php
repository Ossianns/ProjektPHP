<?php

$check = $_POST["skiva"] !== "" && $_POST["genre"] !== "" && $_POST["betyg"] !== "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["utför2"]) && $check) {


    // Tar inputen i drop down menyn
    $artist = $_POST["artist"];

    // Tar de andra inputs:en

    $skiva = $_POST["skiva"];
    // Filter av indata så att en user inte kan skriva in skadlig kod / skadliga tecken såsom </>
    $skiva = htmlspecialchars($skiva);

    $genre = $_POST["genre"];
    $genre = htmlspecialchars($genre);

    $betyg = $_POST["betyg"];


    // Vilkor så att man inte kan sätta tal över 10 eller negativa tal som betyg
    if ($betyg > 10) {
        $betyg = 10;
    } elseif ($betyg < 1) {
        $betyg = 1;
    }

    echo $artist;
    // Kopplar oss till databasen
    try {
        require_once "connector.php";
        $pdo = connectToDB();

        // SQL Query
        $sql = "INSERT INTO skivor (artistid,skivnamn,genre,betyg) VALUES (?,?,?,?);";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$artist, $skiva, $genre, $betyg]);

        // Skickar tillbaka usern till Lägg till artist/skiva sidan
        header("Location: ../läggtill.php");

        exit;
    } catch (PDOException $e) {
        die("Fel: " . $e->getMessage());
    }
} else {
    echo "fel";
}