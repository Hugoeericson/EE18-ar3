<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Slumpa fram sex ordspråk</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="./EE18-ar3/kap4/ordsprak.css">
</head>
<body>
<?php
    // Skapa en array med tio ordspråk
    $ordsprak[] = "Man kan inte lära en gammal hund att sitta.";
    $ordsprak[] = "Man saknar inte kon förrän båset är tomt.";
    $ordsprak[] = "Man ska inte kasta sten i glashus. (Man ska inte kasta sten när man sitter i glashus)";
    $ordsprak[] = "Man ska inte ropa hej förrän man kommit över bäcken";
    $ordsprak[] = "Morgonstund har guld i mund";
    $ordsprak[] = "Mota Olle i grind";
    $ordsprak[] = "Nya kvastar sopar bäst.";
    $ordsprak[] = "Många bäckar små gör en stor å";
    $ordsprak[] = "Man skall inte ta till orda i oträngt mål";
    $ordsprak[] = "Man ser inte skogen för alla träd / Man ser inte skogen för bara träd";

    // Slumpa fram ett tal mellan 0 och 9 med funktionen rand()
    $tagna = [];

    for ($i = 0; $i < 6; $i++) {
        $index = rand(0, 9);
    echo "<p>$index</p>";

    if (!in_array($index, $tagna)) {
        
        echo "<p>$ordsprak[$index]</p>";

        $tagna[] = $index;
    } else {
        $i--;
    }

    print_r($tagna);
    }

?>
</body>
</html>