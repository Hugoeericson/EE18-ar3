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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container col-3">
        <h1>Skriva det du vill spara i en text fil</h1>
        <form action="#" method="POST">
            <!-- Namn 1 -->
            <label for="namn">skriv in din text</label>
            <input type="text" name="filNamn">
            <button type="submit" class="btn btn-primary">Spara</button>
        </form>

        <?php
        // Finns data? (När vi kommer tillbaka till sidan)
        if (isset($_POST["filNamn"])) {

            $filNamn = $_POST["filNamn"];

            $rader = file("$filNamn");

            //skriv ut rader en och en
            foreach ($rader as $rad) {
                echo "<p>$rad</p>";
            }
        }
        ?>
    </div>
</body>

</html>