<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kontakt Formulär</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
            <h1>Kontakt Formulär</h1>
            <form action="uppgift-3-5-svar.php" method="POST">
            <label>Ange lånetid</label>
            <div>
                <input type="radio" name="lånetid" id="1" value="1" checked> 1
                <input type="radio" name="lånetid" id="3" value="3" checked> 3
                <input type="radio" name="lånetid" id="5" value="5" checked> 5
            </div><br>
            <label for="anamn">Ange lånebelopp</label>
            <input id="anamn" class="form-control" type="text" name="belopp">
            <label for="epost">Ange ränta i %</label>
            <input id="epost" class="form-control" type="text" name="ränta">

            <button type="submit" class="btn btn-info">Skicka</button>
        </form>
    </div>
</body>

</html>