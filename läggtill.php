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
                <select name="artist" value="" id="">
                    <?php
                    require_once "functions/functions.php";
                    listaartister()
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