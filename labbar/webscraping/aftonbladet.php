<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    // Hämta sidan
    $sidan = file_get_contents("https://sv.wikipedia.org/wiki/Sverige");

    // Sök början på texten
    $start = strpos($sidan, "<b>Sv");

    if ($start !== false) {
        echo "<p>Horoskopet började på position $start</p>";
    } else {
        echo "<p>Hittade inte horoskopets början!</p>";
    }

    // Hitta var horoskopet slutar
    $slut = strpos($sidan, "Skagerrak</a>", $start);
    if ($slut !== false) {
        echo "<p>Horoskopet slutar på position $slut</p>";
    } else {
        echo "<p>Hittade inte horoskopets slut!</p>";
    }

    $caHoroskopText = substr($sidan, $start, $slut - $start);
    echo "<p>$caHoroskopText</p>";
    ?>
</body>

</html>