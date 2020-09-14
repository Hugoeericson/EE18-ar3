<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Svar på formulär</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Resultat</h1>
        <?php
        // Tar emot data från forumläret
        $förNamn = $_POST["anamn"];
        $epost = $_POST["epost"];
        $mobil = $_POST["tele"];
        $kontakt = $_POST["kontakt"];

        echo "<p>Namn: $förNamn</p>";
        echo "<p>Namn: $epost</p>";
        echo "<p>Namn: $mobil</p>";

        // vad innehåller kontakt
        var_dump($kontakt);

        if ($kontakt == "epost") {
            echo "<p>Vi kommer att kontakta dig inom snarast per epost</p>";
        } else {
            echo "<p>Vi kommer att kontakta dig inom snarast per mobil</p>";

        }
        
        ?>
    </div>
</body>

</html>