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
                    <li class="nav-item"><a class="nav-link" href="blogg.php">Alla inlägg</a></li>
                    <li class="nav-item"><a class="active nav-link" href="spara.php">Skriva inlägg</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <form action="#" method="post">
                <textarea class="form-control" name="inlagg" id="inlagg" cols="30" rows="10"></textarea>
                <button class="btn btn-primary">Spara inlägg</button>
            </form>
            <?php
            // Ta emot data från formuläret
            if (isset($_POST["inlagg"])) {

                // skapa en intern variabel från datan 
                $texten = $_POST["inlagg"];

                // förbered texten för htlm-utskrift
                $textenMedBr = str_replace("\n", "<br>", $texten);

                // Tiden och dagens datum
                setlocale(LC_ALL, "sv_SE.utf8");
                $datumStämpel = strftime("%A %y %B kl %H %M");

                // vad heter text filen
                $filnamn = "blogg.txt";

                // steg 1; Öppna text filen för att skriva
                $handtag = fopen($filnamn, "a");

                // steg 2: Skriv texten
                fwrite($handtag, "<p class=\"alert alert-primary\">$datumStämpel<br>$textenMedBr</p>\n");

                // steg 3: stäng ner anslutningen
                fclose($handtag);

                // skriv ut en bekräftelse
                echo "<p class=\"alert alert-success\">Inlägget har sparats!</p>";
            }
            ?>
        </main>
        <footer>
            2020
        </footer>
    </div>
</body>

</html>