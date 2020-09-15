<?php
/*
* PHP version 7
* @category   Lånekalkylator
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        // Ta emot från formuläret
        $celsius = $_POST["celsius"];
        // omvandla till farenheit
        $farenheit = $celsius * 9 / 5 + 32;
        // skriv ut svaret
        echo "<p>$celsius &deg; celsius motsvarar $farenheit &deg; Fahrentheit</p>";
        ?>
    </div>
</body>
</html>