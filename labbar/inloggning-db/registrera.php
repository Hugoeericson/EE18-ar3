<?php
/*
* PHP version 7
* @category   Lånekalkylator
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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="kontainer">
        <header>
            <h1>Inloggning</h1>
        </header>
        <main>
            <form action="#" method="post">
                <label>Förnamn <input type="text" name="fnamn" required></label>
                <label>Efternamn <input type="text" name="enamn" required></label>
                <label>Användarnamn <input type="text" name="anamn" required></label>
                <label>Lösenord <input type="password" name="lösen1" required></label>
                <label>Upprepa Lösenord <input type="password" name="lösen2" required></label>
                <button>Registrera</button>
            </form>
            <?php
            $fnamn = filter_input(INPUT_POST, "fnamn", FILTER_SANITIZE_STRING);
            $enamn = filter_input(INPUT_POST, "enamn", FILTER_SANITIZE_STRING);
            $anamn = filter_input(INPUT_POST, "anamn", FILTER_SANITIZE_STRING);
            $lösen1 = filter_input(INPUT_POST, "lösen1", FILTER_SANITIZE_STRING);
            $lösen2 = filter_input(INPUT_POST, "lösen2", FILTER_SANITIZE_STRING);

            if ($fnamn && $enamn && $anamn && $lösen1 && $lösen2) {

                $sql = "SELECT * FROM user WHERE anamn = '$anamn'";
                $result = $conn->query($sql);

                if ($result->num_rows != 0) {
                    echo "<p>Användar namnet finns redan</p>";
                } else {
                    if ($lösen1 == $lösen2) {
                        //var_dump($fnamn, $enamn, $anamn, $lösen1);

                        $hash = password_hash($lösen1, PASSWORD_DEFAULT);

                        $sql = "INSERT INTO user (fnamn, enamn, anamn, hash) VALUES ('$fnamn', '$enamn', '$anamn', '$hash')";
                        $conn->query($sql);

                        echo "<p>Anändaren registrerad</p>";
                    } else {
                        echo "<p>Lösenorden matchar inte, vg försök igen!</p>";
                    }
                }
            }
            ?>
        </main>
    </div>
</body>

</html>