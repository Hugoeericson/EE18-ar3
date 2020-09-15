<?php
/*
* PHP version 7
* @category   Lånekalkylator
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        //Ta emot data från formuläret
        $Anamn = $_POST["användarNamn"];
        $lösen = $_POST["lösenOrd"];
        // kontrollera inloggnings uppgifter
        if ($Anamn == "hugo" && $lösen == "jelly") {
            echo "<p><div class=\"alert alert-success\" role=\"alert\">
            Du är inloggning!
          </div></p>";
        } else {
            header("Location:exempel3-1-a.php?fel=1");
        
        }
        
        //skriv ut svaret
        ?>
    </div>
</body>
</html>