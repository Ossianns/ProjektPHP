<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["utför4"]) && isset($_POST["tabort"])) {

    $artist = $_POST["artist"];

    // Kopplar oss till databasen
    try {
        require_once "connector.php";
        $pdo = connectToDB();

        // SQL Query
        $sql = "DELETE FROM artister WHERE artistid = $artist;";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $sql2 = "DELETE FROM skivor WHERE artistid = $artist;";

        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute();

        // Skickar tillbaka usern till Lägg till redigera sidan
        header("Location: ../redigera.php");

        exit;
    } catch (PDOException $e) {
        die("Fel: " . $e->getMessage());
    }

} else {
    echo "fel";
}