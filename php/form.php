<?php

// Kollar så att rätt knapp är tryckt och att artistnamn kolumnen är ifylld
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["utför1"]) && $_POST["artistnamn"] !== "") {

    // Tar inputen
    $artistnamn = $_POST["artistnamn"];

    // Filter av indata så att en user inte kan skriva in skadlig kod
    $artistnamn = htmlspecialchars($artistnamn);

    // Kopplar oss till databasen
    try {
        require_once "connector.php";
        $pdo = connectToDB();

        // SQL Query
        $sql = "INSERT INTO artister (artistnamn) VALUES (?);";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$artistnamn]);

        // Skickar tillbaka usern till Lägg till artist/skiva sidan
        header("Location: ../läggtill.php");

        exit;
    } catch (PDOException $e) {
        die("Fel: " . $e->getMessage());
    }
} else {
    echo "fel";
}