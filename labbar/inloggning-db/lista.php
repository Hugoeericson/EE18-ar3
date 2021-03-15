<?php
/*
* PHP version 7
* @category   Lånekalkylator
* @author     Hugo Ericson <hugo.ericson@elev.ga.ntig.se>
* @license    PHP CC
*/
include "./resurser/conn.php";
session_start();
if (!isset($_SESSION["anamn"])) {
    header("Location: ./login.php");
}
?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="kontainer">
        <header>
            <h1>Lista på användare</h1>
            <nav>
                <ul class="nav nav-tabs">
                    <?php if (isset($_SESSION["anamn"])) { ?>
                        <li class="nav-item"><a class="nav-link" href="./logout.php">Logga ut</a></li>
                        <li class="nav-item"><a class="nav-link active" href="./lista.php">Lista</a></li>
                        <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriv</a></li>
                        <li class="nav-item"><a class="nav-link" href="./sok.php">Sök</a></li>
                        <li class="nav-item"><a class="nav-link" href="./lasa.php">Läsa</a></li>
                        <li class="nav-item anamn"><?php echo $_SESSION["anamn"] . " (" . $_SESSION["antal"] . ")" ?></li>
                    <?php } else { ?>
                        <li class="nav-item"><a class="nav-link" href="./login.php">login</a></li>
                        <li class="nav-item"><a class="nav-link" href="./registrera.php">Registrera</a></li>
                        <li class="nav-item"><a class="nav-link" href="./sok.php">Sök</a></li>
                        <li class="nav-item"><a class="nav-link" href="./lasa.php">Läsa</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </header>
        <main>
            <?php
            // Hämta alla användare i tabellen
            $sql = "SELECT * FROM user";
            $result = $conn->query($sql);

            // Gick det bra?
            if (!$result) {
                die("Något gick snett: " . $conn->error);
            } else {
                echo "<p class=\"alert alert-success\">Hämtade " . $result->num_rows . " användare</p>";
            }

            // Steg 3
            echo "<table>";
            echo "<tr><th>Förnamn</th><th>Efternamn</th><th>Användarnamn</     th><th>Skapad</th></tr>";
            while ($rad = $result->fetch_assoc()) {
                echo "<tr>>";
                echo "<td>$rad[fnamn]</td>";
                echo "<td>$rad[enamn]</td>";
                echo "<td>$rad[anman]</td>";
                echo "<td>$rad[skapad]</td>";
                echo "</tr>";
            }
            echo "</table>";

            // Steg 4 stäng ned anslutningen
            $conn->close();
            ?>
        </main>
    </div>
</body>

</html>