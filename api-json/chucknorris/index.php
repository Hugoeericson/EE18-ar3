<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chuck norris</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="kontainer">
        <h1>Chuck norris skämt</h1>
        <?php
        $url = "https://api.chucknorris.io/jokes/random";

        $json = file_get_contents($url);


        $jsonData = json_decode($json);

        echo "<p>$jsonData->value</p>";
        echo "<p>Skapad den $jsonData->created_at</p>";
        echo "<img src=\"$jsonData->icon_url\">";
        ?>
    </div>
</body>

</html>