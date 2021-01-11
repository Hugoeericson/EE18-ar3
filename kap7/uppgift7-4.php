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

            // matcha .com, .net, .org
            if (preg_match("/(.com|.net|.org)$/", $text)) {
                echo "<p>&#10003; slutar på .com, .net, .org .</p>";
            } else {
                echo "<p>&#10005; slutar inte på .com, .net, .org.</p>";
            }
            // matcha a-z, 0-9, @ och -
            if (preg_match("/[a-z0-9\-@\-\.]+/", $text)) {
                echo "<p>&#10003; Innehåller a-z, 0-9, @ och -.</p>";
            } else {
                echo "<p>&#10005; Innehåller inte a-z, 0-9, @ och -.</p>";
            }
            // första tecknet måste vara en bokstav
            if (preg_match("/^[a-z]/", $text)) {
                echo "<p>&#10003; första tecknet måste vara en bokstav.</p>";
            } else {
                echo "<p>&#10005; första tecknet är inte en bokstav.</p>";
            }
            // längden 6-200 tecken
            if (preg_match("/.{6,200}/", $text)) {
                echo "<p>&#10003; den är 6-200 tecken.</p>";
            } else {
                echo "<p>&#10005; den är inte 6-200 tecken.</p>";
            }
        }
        ?>
    </div>
</body>
</html>