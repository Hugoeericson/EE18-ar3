<?php
/*
* En enkel blogg som använder en databas 
*
* PHP version 7
* @category   Webbapplikation med databas
* @author     Hugo Ericson <hugo.ericson@elev.ga.ntig.se>
* @license    PHP CC
*/
include "./resurser/conn.php";
?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="kontainer">
        <h1>Min Blogg</h1>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="./lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link active" href="./skriva.php">Skriva</a></li>
                <li class="nav-item"><a class="nav-link" href="./sok.php">Sök</a></li>
            </ul>
        </nav>
        <form action="#" method="POST">
            <label>Ange Rubrik <input type="text" name="header"></label>
            <label>Ange Text <textarea name="postText"></textarea></label>
            <button>Spara</button>
        </form>
        <?php
        // Ta emot det som skickas
        $header = filter_input(INPUT_POST, 'header', FILTER_SANITIZE_STRING);
        $postText = filter_input(INPUT_POST, 'postText', FILTER_SANITIZE_STRING);

        // Om data finns..
        if ($header && $postText) {
            // SQL satsen
            $sql = "INSERT INTO post (header, postText) VALUES ('$header', '$postText')";

            // Steg 2: köra sql-satsen
            $result = $conn->query($sql);

            // Fungerade sql satsen
            if (!$result) {
                die("något gick fel");
            } else {
                echo "<p>Inlägget är upplagt</p>";
            }

            // steg 3: stänga ner anslutningen
            $conn->close();
        }
        ?>
    </div>
</body>

</html>