<?php

function listaartister()
{
    // Kopplar oss till databasen
    require_once "php/connector.php";
    $pdo = connectToDB();

    // Väljer all data
    $sql = "SELECT * FROM artister;";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetchAll();

    // skapar denna variabel för att det ska fungera
    $artistid = 'artistid';

    // Loopar igenom artisterna för att displaya dem som options
    foreach ($result as $row) {
        echo "<option  value='$row[$artistid]'>" . $row['artistnamn'] . "</option>";
    }
}