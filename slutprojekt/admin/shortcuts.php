<?php
/* 
*
* PHP version 7
* @category   Webbapplikation med databas
* @author     Hugo Ericson <hugo.ericson@elev.ga.ntig.se>
* @license    PHP CC
*/
include "../conn.php";
?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Genvägar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <div class="kontainer">
        <?php
        $url = "https://randomuser.me/api";
        $json = file_get_contents($url);


        $jsonData = json_decode($json);

        $results = $jsonData->results;
        $name = $results[0]->name;
        $first = $name->first;
        $last = $name->last;
        $gender = $results[0]->$gender;

        echo "<p>$first</p>";
        echo "<p>$last</p>";
        echo "<p>$gender</p>";
        ?>
        <h1>Dina genvägar</h1>
        <div class="bgwrapper">
            <h3>Lägg till genvägar</h3>
            <div class="gridwrapper">
                <div class="links">
                    <?php

                    // infogar nya genvägar
                    $namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING);
                    $link = filter_input(INPUT_POST, 'link', FILTER_SANITIZE_STRING);
                    $color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_STRING);

                    // Om data finns..
                    if ($namn && $link) {
                        // SQL satsen
                        $sql = "INSERT INTO links (namn, link, color) VALUES ('$namn', '$link', '$color')";

                        // Steg 2: köra sql-satsen
                        $result = $conn->query($sql);

                        // Fungerade sql satsen
                        if (!$result) {
                            die("något gick fel");
                        }
                    }
                    // dritar ut inlägg från databasen
                    $sql = "SELECT * FROM links";
                    $result = $conn->query($sql);

                    // Gick det bra?
                    if (!$result) {
                        die("Något gick snett: " . $conn->error);
                    }

                    // Steg 3
                    while ($rad = $result->fetch_assoc()) {
                        echo "<div style=\"background:$rad[color]\" class=\"item hover\">";
                        echo "<h2><a href=\"$rad[link]\" target=\"_blank\">$rad[namn]</a></h2>";
                        //echo "<p>$rad[postDate]</p>";
                        echo "</div>";
                    }
                    // steg 3: stänga ner anslutningen
                    $conn->close();
                    ?>
                    <div class="item hover plus" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <!-- Button trigger modal -->
                        <a class="active" aria-current="page" href="#">
                            <svg viewBox="0 0 24 24" width="48" height="48" stroke="white" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                                <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Lägg till genväg</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="#" method="POST">
                        <div class="modal-body">
                            <input class="form-control" type="text" placeholder="Namn" aria-label="default input example" name="namn" required>
                            <input class="form-control" type="text" placeholder="Webbadress" aria-label="default input example" name="link" required>
                            <p>Välj en färg på genvägsrutan</p>
                            <input type="color" name="color" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Stäng</button>
                            <button type="submit" class="btn btn-primary">Spara genväg</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="../skript.js"></script>

</body>

</html>