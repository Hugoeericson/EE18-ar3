<?php
/*
* PHP version 7
* @category   Lånekalkylator
* @author     Hugo Ericson <hugo.ericson@elev.ga.ntig.se>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
    <?php
    //öppna filen för läsning
    $handtag = fopen("style.css", "r");

    // läs in 10 tecken
    $text = fread($handtag, 10);
    echo "<p>$text</p>";

    // stäng filen
    fclose($handtag);

    // skriva till en fil
    $handtag = fopen("mandag.txt", "w");

    //skriv en rad
    fwrite($handtag, "Idag ska jag äta\n");
    fwrite($handtag, "hej på dig\n");
    echo "<p>du har skrivit 2 rader tillkeekppfo</p>";

    // stäng filen
    fclose($handtag);

    // läsa in hela textfilen på en gång
    $rader = file("mandag.txt");
    print_r($rader);

    //skriv ut rader en och en
    foreach ($rader as $rad) {
        echo "<p>$rad</p>";
    }

    $alltext = file_get_contents("mandag.txt");
    echo "<p>$alltext</p>";

    //läsa in en fil från nätet
    $hemsida = file_get_contents("https://www.youtube.com/");
    echo "<p>$hemsida</p>";

    //spara ned hemsidna i en fil
    $handtag =fopen("youtube.com", "w");
    fwrite($handtag, $hemsida);
    fclose($handtag);
    ?>
    </div>
</body>
</html>