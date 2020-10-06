<?php
/*
 * Skapa en PHP-webbapplikation som räknar ut din lön efter skatt.
 * Du skall kunna mata in namn, bruttolönen och skattesatsen (tex 30 för 30%).
 * Beräkning: lön efter skatt heter nettolön = bruttolön * (100 - skattesatsen) / 100.
 *
 * PHP version 7
 * @category   Skatteberäkning
 * @author     Hugo Ericson
 * @license    PHP CC
 */
; ?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Skatteberäkning</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="prov1.css">
</head>
<body>
    <div class="kontainer">
        <h1>Lön efter skatt</h1>
        <form action="#" method="POST">
            <!-- Namn 1 -->
            <label for="namn">Namn</label>
            <input id="namn" class="form-control" type="text" name="namn" required>
            <!-- Namn 1 -->
            <label for="brutto">bruttolön</label>
            <input id="brutto" class="form-control" type="text" name="brutto" required>
            <!-- Namn 1 -->
            <label for="skatt">Skattesat</label>
            <input id="skatt" class="form-control" type="text" name="skatt" required>
            <button type="submit" class="btn btn-primary mt-5">Skicka in</button>
        </form>

        <?php
        if (isset($_POST["namn"], $_POST["brutto"], $_POST["skatt"])) {

            // Tar emot data från html
            $namn = $_POST["namn"];
            $brutto = $_POST["brutto"];
            $skatt = $_POST["skatt"];

            // kollar om bruttolönen är mellan 10000 och 45000
            if ($brutto < 10000 || $brutto > 45000) {


                echo "<p class= varning> Skatteberäkningen fungerar bara för bruttolön mellan 10000 kr och 45000 kr</p>";
            // räknar ut den totala lönen
            } else {
                $nettoLön = $brutto * (100 - $skatt) / 100;

                echo "<h2>Lönebesked</h2>";
                echo "<p>$namn:s lön är $nettoLön kr efter skatt</p>";
                echo "<p>Beräkning baserat på bruttolön $brutto kr och satsen på $skatt%</p>";

            }

        }
        ?>
    </div>
</body>
</html>