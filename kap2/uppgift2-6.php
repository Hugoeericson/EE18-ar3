<?php
/*
* PHP version 7
* @category   Lånekalkylator
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
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
        <h1>Resultat</h1>
        <?php
        // Ta emot från formuläret
        $tempratur = $_POST["temperatur"];
        $omvandla = $_POST["omvandla"];
        // omvandla till farenheit
        if ($omvandla == "CF") {
            $fahrenheit = $tempratur * 9 / 5 + 32;
            echo "<p>$tempratur &deg; celsius motsvarar $fahrenheit &deg; Fahrentheit</p>";
        } elseif($omvandla == "FC") {
            $celsius = ($tempratur - 32) * 5 / 9;
            echo "<p>$tempratur&deg; fahrenheit motsvarar $celsius&deg; Celsius</p>";
        } else {
            $kelvin = $tempratur - 273 ;
            echo "<p>$tempratur&deg; Celsius motsvarar $kelvin&deg; Kelvin</p>";
        }
        // skriv ut svaret
        ?>
    </div>
</body>
</html>