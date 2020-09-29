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
    <link rel="stylesheet" href="./EE18-ar3/kap4/uppgift4-1.css">
</head>

<body>
    <div class="container col-3">
        <h1>Räkna ut ditt betyg</h1>
        <form action="#" method="POST">
            <!-- Namn 1 -->
            <label for="namn">Ange ett tal</label>
            <input id="namn" class="form-control" type="text" name="tal">

            <button type="submit" class="btn btn-primary">Räkna ut</button>
        </form>

        <?php
        // Finns data? (När vi kommer tillbaka till sidan)
        if (isset($_POST["tal"])) {

            $tal = $_POST["tal"];

            $siffror = ["Noll", "Ett", "Två", "Tre", "Fyra", "Fem", "Sex", "Sju", "Åtta", "Nio"];

            

            // skriv ut svaret som siffror
            if ($tal < 10) {
                echo "<p>$siffror[$tal]</p>";
            } else {
                echo "<p>$tal</p>";
            }
            
        }
        ?>
    </div>
</body>

</html>