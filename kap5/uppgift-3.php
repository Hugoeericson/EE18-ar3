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
        <h1>Spara i gästboken</h1>
        <form action="#" method="POST">
            <label for="namn">Ange ditt namn</label>
            <input type="text" name="namn" id="namn">
            <label for="mail">Ange din mail</label>
            <input type="text" name="mail" id="mail">
            <label for="mail">Ange ditt meddelande</label>
            <textarea name="meddelande" id="meddelande" cols="30" rows="10"></textarea>
            <button type="submit" class="btn btn-primary">Spara</button>
        </form>

        <?php
        // Finns data? (När vi kommer tillbaka till sidan)
        if (isset($_POST["namn"], $_POST["mail"], $_POST["meddelande"])) {

            $namn = $_POST["namn"];
            $mail = $_POST["mail"];
            $meddelande = $_POST["meddelande"];

            $handtag = fopen("gastbok.txt", "a");

            fwrite($handtag, "$namn $mail <br>\n");

            fwrite($handtag, "$meddelande <br>\n");

            fclose($handtag);
        }
        ?>
    </div>
</body>

</html>