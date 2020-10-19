<?php
/*
* En enkel blogg där inlägg lagras i en text
* PHP version 7
* @category   Webbapp
* @author     Hugo Ericson <hugo.ericson@elev.ga.ntig.se>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Min enkla blogg</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/minty/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="kontainer">
        <header>
            <h1>Bloggen</h1>
            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="active nav-link" href="blogg.php">Alla inlägg</a></li>
                    <li class="nav-item"><a class="nav-link" href="spara.php">Skriva inlägg</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <?php
            // vad heter text filen
            $filnamn = "blogg.txt";

            // Steg 1: Läs in hela text filen
            $rader = file($filnamn);

            // vänd på arrayen
            $raderOmvänd = array_reverse($rader);

            //Steg 2: Skriv ut raderna
            foreach ($raderOmvänd as $rad) {
                echo $rad;
            }
            ?>
        </main>
        <footer>
            2020
        </footer>
    </div>
</body>
</html>