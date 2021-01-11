<?php
/*
* En enkel hemsida som vissar min 5 top låtar med hjälp utav en databas 
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
        <h1>Hugo's Top 5 låtar</h1>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" href="./top-5.php">Top 5</a></li>
                <li class="nav-item"><a class="nav-link" href="./admin/add.php">Lägg till låtar</a></li>
            </ul>
        </nav>
        <?php
            // steg 2. SQL frågan
            $sql = "SELECT * FROM musik";
            $result = $conn->query($sql);

            // Gick det bra?
            if (!$result) {
                die("Något gick snett: " . $conn->error);
            } else {
                echo "<p class=\"alert alert-success\">Hämtade " . $result->num_rows . " inlägg</p>";
            }

            // Steg 3
            while ($rad = $result->fetch_assoc()) {
                echo "<div class=\"inlägg\">";
                echo "<h5>$rad[artist]</h5>";
                echo "<h6>$rad[song]</h6>";
                //echo "<p>$rad[postDate]</p>";
                echo "</div>";
            }

            // Steg 4 stäng ned anslutningen
            $conn->close();
            
        ?>
    </div>
</body>

</html>