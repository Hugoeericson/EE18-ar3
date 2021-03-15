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
session_start();
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
        <h1>Sök på inlägg</h1>
        <nav>
            <ul class="nav nav-tabs">
                <?php if (isset($_SESSION["anamn"])) { ?>
                    <li class="nav-item"><a class="nav-link" href="./logout.php">Logga ut</a></li>
                    <li class="nav-item"><a class="nav-link" href="./lista.php">Lista</a></li>
                    <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriv</a></li>
                    <li class="nav-item"><a class="nav-link active" href="./sok.php">Sök</a></li>
                    <li class="nav-item"><a class="nav-link" href="./lasa.php">Läsa</a></li>
                    <li class="nav-item anamn"><?php echo $_SESSION["anamn"] . " (" . $_SESSION["antal"] . ")" ?></li>
                <?php } else { ?>
                    <li class="nav-item"><a class="nav-link" href="./login.php">login</a></li>
                    <li class="nav-item"><a class="nav-link" href="./registrera.php">Registrera</a></li>
                    <li class="nav-item"><a class="nav-link active" href="./sok.php">Sök</a></li>
                    <li class="nav-item"><a class="nav-link" href="./lasa.php">Läsa</a></li>

                <?php } ?>
            </ul>
        </nav>
        <form action="#" method="POST">
            <label>Ange sökterm <input type="text" name="sökterm"></label>
            <button>Sök</button>
        </form>
        <?php
        // Ta emot det som skickas
        $sökterm = filter_input(INPUT_POST, 'sökterm', FILTER_SANITIZE_STRING);

        // Om data finns..
        if ($sökterm) {
            // SQL satsen
            $sql = "SELECT * FROM post WHERE header LIKE '%$sökterm%' OR postText LIKE '%$sökterm%'";

            // Steg 2: köra sql-satsen
            $result = $conn->query($sql);

            // Fungerade sql satsen?
            if (!$result) {
                die("Något gick snett: " . $conn->error);
            } else {
                echo "<p class=\"alert alert-success\">Hämtade " . $result->num_rows . " inlägg</p>";
            }

            while ($rad = $result->fetch_assoc()) {
                echo "<div class=\"inlägg\">";
                echo "<h5>$rad[header]</h5>";
                echo "<h6>$rad[postText]</h6>";
                echo "<p>$rad[postDate]</p>";
                echo "</div>";
            }

            // steg 3: stänga ner anslutningen
            $conn->close();
        }
        ?>
    </div>
</body>

</html>