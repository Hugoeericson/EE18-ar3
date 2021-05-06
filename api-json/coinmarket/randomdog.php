<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dagen väder</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="kontainer">
        <?php

   

        $url = "https://random.dog/woof.json?ref=apilist.fun";


        $json = file_get_contents($url);


        $jsonData = json_decode($json);


        echo "<img src=\"$jsonData->url\">";

        //var_dump($jsonData);
        ?>
    </div>
</body>

</html>