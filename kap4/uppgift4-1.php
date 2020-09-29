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
            <label for="namn">Namn 1</label>
            <input id="namn" class="form-control" type="text" name="namn[]" required>
            <!-- Namn 1 -->
            <label for="namn">Namn 2</label>
            <input id="namn" class="form-control" type="text" name="namn[]" required>
            <!-- Namn 1 -->
            <label for="namn">Namn 3</label>
            <input id="namn" class="form-control" type="text" name="namn[]" required>
            <!-- Namn 1 -->
            <label for="namn">Namn 4</label>
            <input id="namn" class="form-control" type="text" name="namn[]" required>

            <!-- Namn 2 -->
            <label for="namn">Namn 5</label>
            <input id="namn" class="form-control" type="text" name="namn[]" required>
            <button type="submit" class="btn btn-primary mt-5">Räkna ut</button>
        </form>

        <?php
        // Finns data? (När vi kommer tillbaka till sidan)
        if (isset($_POST["namn"])) {

            $namn = $_POST["namn"];

            var_dump($namn);

            sort($namn);

            foreach ($namn as $namnet) {
                echo "<p>$namnet</p>";
            }
        }
        ?>
    </div>
</body>

</html>