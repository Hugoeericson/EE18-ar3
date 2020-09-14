<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>kapitel 2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    // skriver ut dagens dag
    //echo "Idag är det \"";
    //echo date("l");
    //echo "\".</p>";

    // ett smartare sätt att skriva det
    //echo "<p>Idag är det \"" . date("l") . "\".</p>";

    // med en variabel
    $idag = date("l");
    //echo "<p>Idag är det \"" . $idag . "\".</p>";

    //Ännu smartare sätt att skriva på
    //echo "<p>Idag är det \"$idag\".</p>";

    //men det här fungerar inte 
    //echo '<p>Idag är det \"$idag\".</p>';

    // dagens datum
    $dagensDatum = date("jS");
    $månad = date("F");
    echo "<p>Today it's \"$idag\" $dagensDatum $månad.</p>";

    // hämta ut några server variabler
    echo "<p>$_SERVER[SERVER_ADDR]</p>";

    
    ?>
</body>
</html>