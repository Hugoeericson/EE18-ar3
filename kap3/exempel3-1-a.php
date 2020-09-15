<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inloggnings</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Inloggning</h1>
        <form action="exempel3-1-b.php" method="POST">
            <label for="aNamn">Användarnamn</label>
            <input id="aNamn" class="form-control" type="text" name="användarNamn">
            <label for="lösen">Lösenord</label>
            <input id="lösen" class="form-control" type="password" name="lösenOrd">

            <button type="submit" class="btn btn-info">Skicka</button>
            <?php
            // Ta emot data som skickas
            $fel = $_GET["fel"];
            if ($fel == "1") {
                echo "<p><div class=\"alert alert-danger\" role=\"alert\">
            Fel inloggning!<br> Vg försök igen.
          </div></p>";
            }
            ?>
        </form>
    </div>
</body>
</html>