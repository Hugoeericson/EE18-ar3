<?php
/*
* En enkel blogg som använder en databas 
*
* PHP version 7
* @category   Webbapplikation med databas
* @author     Hugo Ericson <hugo.ericson@elev.ga.ntig.se>
* @license    PHP CC
*/
include "../resurser/conn.php";
?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="kontainer">
        <h1>Hugo's Top 5 låtar</h1>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="../top-5.php">Top 5</a></li>
                <li class="nav-item"><a class="nav-link active" href="./add.php">Lägg till låtar</a></li>
            </ul>
        </nav>
        <form action="#" method="POST">
            <label>Ange Artist <input type="text" name="artist"></label>
            <label>Ange Låt <textarea name="song"></textarea></label>
            <button>Spara</button>
        </form>
        <?php
        // Ta emot det som skickas
        $artist = filter_input(INPUT_POST, 'artist', FILTER_SANITIZE_STRING);
        $song = filter_input(INPUT_POST, 'song', FILTER_SANITIZE_STRING);

        // Om data finns..
        if ($artist && $song) {
            // SQL satsen
            $sql = "INSERT INTO musik (artist, song) VALUES ('$artist', '$song')";

            // Steg 2: köra sql-satsen
            $result = $conn->query($sql);

            // Fungerade sql satsen
            if (!$result) {
                die("något gick fel");
            } else {
                echo "<p>Nu är låten tillagd!</p>";
            }

            // steg 3: stänga ner anslutningen
            $conn->close();
        }
        ?>
    </div>
</body>

</html>