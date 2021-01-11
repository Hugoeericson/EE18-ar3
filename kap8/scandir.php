<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Skanna katalog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Skanna katalog</h1>
        <?php
            // Välj katalog
            $katalog = "/var/www";

            // skriv ut vilken katalog som ska skannas
            echo "<p>Katalogen: '$katalog'</p>";

            // skanna av katalogen
            $resultat = scandir($katalog);

            //vad innehåller resultat?
            //var_dump($resultat);

            // Loopa igenom arrayen  $resultat
            foreach ($resultat as $objekt) {
                // skippa '.' och '..'
                if ($objekt == "." || $objekt == "..") {
                    continue;
                }

                // skippa underkataloger
                if (is_dir($katalog/$objekt)) {
                    continue;
                }

                // skaffa fram lite info om filen
                $info = pathinfo($objekt);
                var_dump($info);
                
                echo "<p>$objekt</p>";
            }
        ?>
    </div>
</body>
</html>