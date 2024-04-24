<?php

$check = $_POST["skiva"] !== "" && $_POST["genre"] !== "" && $_POST["betyg"] !== "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["utför2"]) && $check) {


    // Tar inputen i drop down menyn
    $artist = $_POST["artist"];
    $skiva = $_POST["skiva"];
    $genre = $_POST["genre"];
    $betyg = $_POST["betyg"];

    echo ($artist);
    // Kopplar oss till databasen
    try {
        require_once "connector.php";
        $pdo = connectToDB();

        // SQL Query
        $sql = "INSERT INTO skivor (artist_id,skivnamn,genre,betyg) VALUES ((SELECT artistid FROM artister WHERE artistnamn = ?),?,?,?);";

        /*
        INSERT INTO skivor (artist_id,skivnamn,genre,betyg)
        VALUES (
        (SELECT artistid FROM artister WHERE artistnamn = "Paul McCartney"),
        "album3",
        "Folk",
        10
        );
        */
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