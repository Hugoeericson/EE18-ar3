<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Djuralfabetet</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="kontainer">
        <h2>Djuralfabetet</h2>
        <p>Här söker du djur efter deras första bokstav.<br>
            Tex. djur som börjar på 'a' med: skriv 'a'.<br>
            Tex. djur som börjar på 'a' eller 'b' med: skriv 'a, b'.</p>
        <form class="kol2" action="#" method="post">
            <label>Ange sökterm</label>
            <input type="text" name="sokterm">
            <button>Sök</button>
        </form>
        <?php
        //ta emot data från formuläret
        $sokterm = filter_input(INPUT_POST, "sokterm, FILTER_SANITIZE_STRING");
        if ($sokterm) {

            // Läs in hela textfilen
            $rader =  file("animals.txt");

            // Antal djur
            $antalDjur = count($rader);

            // Hitta alla djur som börjar på 'a'
            // Loopa igenom raderna
            $antalTräffar = 0;
            foreach ($rader as $rad) {

                // Börjar raden på $sokterm?
                if ($rad[0 == $sokterm]) {
                    echo "<p>$rad</p>";
                    $antalTräffar++;
                }
            }
        }
        ?>
    </div>
</body>
</html>