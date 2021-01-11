<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Regex</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Hitta match med regex</h1>
        <form action="#" method="POST">
            <label>Ange text
                <input type="text" name="text" required>
            </label>
            <button>Skicka</button>
        </form>
        <?php
        /* Ta emot data som skickas */
        $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING);

        if ($text) {
            echo "<h3>Inmattat</h3>";
            echo "<p>Text: <em>'$text'</em></p>";

            echo "<h3>Resultat</h3>";
            // Matcha "123"
            // Regex = regular expression = reguljära uttryck
            // På samma sätt som strstr()
            if (preg_match("/gatan/", $text)) {
                echo "<p>&#10003; Innehåller 'gatan'.</p>";
            } else {
                echo "<p>&#10005; Innehåller INTE 'gatan'.</p>";
            }  
            // matacha bokstav i alfabetet
            if (preg_match("/[a-zåäö]/", $text)) {
                echo "<p>&#10003; Innehåller en bokstav ur alfabetet.</p>";
            } else {
                echo "<p>&#10005; Innehåller INTE en bokstav ur alfabetet.</p>";
            }  
            // matacha siffror
            if (preg_match("/[0-9]/", $text)) {
                echo "<p>&#10003; Innehåller en siffra.</p>";
            } else {
                echo "<p>&#10005; Innehåller INTE en siffra.</p>";
            }  
            // negativ matchning
            if (preg_match("/[^_]/", $text)) {
                echo "<p>&#10003; Innehåller ej tecknet '_'.</p>";
            } else {
                echo "<p>&#10005; Innehåller tecknet '_'.</p>";
            }  
            // natcha stora och små bokstäver
            if (preg_match("/[a-zåäö]/i", $text)) {
                echo "<p>&#10003; Innehåller en stor eller liten bokstav ur alfabetet.</p>";
            } else {
                echo "<p>&#10005; Innehåller INTE en stor eller liten bokstav ur alfabetet.</p>";
            }  

            // sök efter 'a', 'aa' 'aaa' dvs en eller flera
            if (preg_match("/[a+]/i", $text)) {
                echo "<p>&#10003; Innehåller en eller flera 'a' i följd.</p>";
            } else {
                echo "<p>&#10005; Innehåller INTE en stor eller liten bokstav ur alfabetet.</p>";
            }  

            // sök efter 0 eller flera 'a'
            if (preg_match("/[a*]/i", $text)) {
                echo "<p>&#10003; Innehåller noll eller flera 'a'.</p>";
            } else {
                echo "<p>&#10005; Innehåller INTE noll eller flera 'a'.</p>";
            }  

            // matcha ett antal, tex en ip-adress som 192.168.0.1
            if (preg_match("/[0-9]{1,3}.[0-9]{1,3}.[0-9]{1}.[0-9]{1,1}/", $text)) {
                echo "<p>&#10003; matchar en ip-adress.</p>";
            } else {
                echo "<p>&#10005; matchar ej en ip-adress.</p>";
            }  

            // matcha ordet SAB eller SAAB
            if (preg_match("/SA{1,2}B/", $text)) {
                echo "<p>&#10003; matchar orden SAB eller SAAB.</p>";
            } else {
                echo "<p>&#10005; matchar ej ordenSAB eller SAAB.</p>";
            }  

            // matcha ordet SAB eller SAAB
            if (preg_match("/SAB|SAAB/", $text)) {
                echo "<p>&#10003; matchar orden SAB eller SAAB.</p>";
            } else {
                echo "<p>&#10005; matchar ej ordenSAB eller SAAB.</p>";
            } 

            // matcha orden Obs eller OBS eller obs
            if (preg_match("/Obs|OBS|obs/i", $text)) {
                echo "<p>&#10003; matchar orden Obs, OBS, obs.</p>";
            } else {
                echo "<p>&#10005; matchar ej orden Obs, OBS, obs.</p>";
            }

            // matcha orden Obs oavsett små eller stora bokstäver
            if (preg_match("/obs/i", $text)) {
                echo "<p>&#10003; matchar orden Obs, OBS, obs.</p>";
            } else {
                echo "<p>&#10005; matchar ej orden Obs, OBS, obs.</p>";
            }

            // matcha gatuadress tex Sveavägen 12, Sveavägen. 12
            if (preg_match("/Sveavägen|Svea [12]/i", $text)) {
                echo "<p>&#10003; matchar vägen sveavägen 12.</p>";
            } else {
                echo "<p>&#10005; matchar ej vägen sveavägen 12.</p>";
            }

        }
        ?>
    </div>
</body>
</html>