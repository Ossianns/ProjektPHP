<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_redigera.css">
</head>

<body>
    <a href="index.php">
        <div class="hemknapp">Hem</div>
    </a>
    <div class="wrapper">
        <div class="rubrik">
            <h1>
                Redigera
            </h1>
        </div>
        <div class="tabell">tabell</div>
        <div class="lastrow">
            <form action="">
                <label for="">Ta bort artist:</label>
                <select name="artistnamn" id="artistnamn">
                    <option value="artistnamn">NULL</option>
                    <option value="artistnamn">exempel</option>
                </select>
                <input id="tabort" type="checkbox">
                <label for="tabort">Ta bort</label>
                <input type="submit" value="UTFÖR">
            </form>
        </div>
    </div>
</body>

</html>