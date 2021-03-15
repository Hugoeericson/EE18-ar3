<?php
/*
* PHP version 7
* @category   Lånekalkylator
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="kontainer">
        <header>
            <h1>Inloggning</h1>
            <nav>
                <ul class="nav nav-tabs">
                    <?php if (isset($_SESSION["anamn"])) { ?>
                        <li class="nav-item"><a class="nav-link active" href="./logout.php">Logga ut</a></li>
                        <li class="nav-item"><a class="nav-link" href="./lista.php">Lista</a></li>
                    <?php } else { ?>
                        <li class="nav-item"><a class="nav-link active" href="./login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="./registrera.php">Registrera</a></li>
                        <li class="nav-item"><a class="nav-link" href="./sok.php">Sök</a></li>
                        <li class="nav-item"><a class="nav-link" href="./lasa.php">Läsa</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </header>
        <main>
            <form action="#" method="post">
                <label>Användarnamn <input type="text" name="anamn" required></label>
                <label>Lösenord <input type="password" name="lösen" required></label>
                <button>Logga in</button>
            </form>
            <?php
            $anamn = filter_input(INPUT_POST, "anamn", FILTER_SANITIZE_STRING);
            $lösen = filter_input(INPUT_POST, "lösen", FILTER_SANITIZE_STRING);

            if ($anamn && $lösen) {
                
                //Finns användaren i tabellen?
                $sql = "SELECT * FROM user WHERE anamn = '$anamn'";
                $result = $conn->query($sql);

                if ($result->num_rows == 0) {
                    echo "<p>Användar namnet finns inte</p>";
                } else {

                    // Plocka ut hashet för användaren 
                    $rad = $result->fetch_assoc();
                    $hash = $rad["hash"];

                    // Kontrollera lösenordet
                    if (password_verify($lösen, $hash)) {
                        // Inloggad!
                        echo "<p class=\"alert alert-success\">Du är inloggad!</p>";

                        $_SESSION["anamn"] = $anamn;
                        $_SESSION["user_id"] = $rad["id"];

                        //Räkna antal
                        $antal = $rad['antal'] + 1;

                        // Registrera ny inloggning
                        $sql = "UPDATE user SET antal = '$antal' WHERE id = $rad[id]";
                        $conn->query($sql);
                        $_SESSION["antal"] = $antal;

                        // Hoppa till sidan lista
                        header("Location: ./lista.php");
                    } else {
                        // Fel!
                        echo "<p class=\"alert alert-success\">Lösenordet stämmer inte!</p>";
                    }
                }
            }
            ?>
        </main>
    </div>
</body>

</html>