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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="kontainer">
        <header>
            <h1>Inloggning</h1>
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
                    $hash = $rad['hash'];

                    // Kontrollera lösenordet
                    if (password_verify($lösen, $hash)) {
                        // Inloggad!
                        echo "<p class=\"alert alert-success\">Du är inloggad!</p>";
                        $_SESSION["anamn"] = $anamn;
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