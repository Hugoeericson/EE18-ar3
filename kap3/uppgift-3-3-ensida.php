<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lånekalkylator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Kontaktformulär</h1>
        <form action="#" method="POST">
            <label for="namn">Ange tal 1</label>
            <input id="namn" class="form-control" type="text" name="tal1" required>
            <label for="epost">Ange tal 2</label>
            <input id="epost" class="form-control" type="text" name="tal2" required>
            <button type="submit" class="btn btn-primary">Skriv ut</button>
        </form>

        <?php
        // Finns data?
        if (isset($_POST["tal1"], $_POST["tal2"])) {

            // Ta emot data från formuläret
            $tal1 = $_POST["tal1"] + 1;
            $tal2 = $_POST["tal2"];

            // Är tal1  < tal2?
            if ($tal1 < $tal2) {
                for ($i = $tal1; $i < $tal2; $i++) {
                    echo "$i ";
                }
            } else {
                echo "<p>tal1 måste vara mindre än tal 2, vg försök igen!</p>";
            }


            // Skriv ut resultatet
        }

        ?>
    </div>
</body>

</html>