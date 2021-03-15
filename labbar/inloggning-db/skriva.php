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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="kontainer">
        <h1>Min Blogg</h1>
        <nav>
            <ul class="nav nav-tabs">
                <?php if (isset($_SESSION["anamn"])) { ?>
                    <li class="nav-item"><a class="nav-link" href="./logout.php">Logga ut</a></li>
                    <li class="nav-item"><a class="nav-link" href="./lista.php">Lista</a></li>
                    <li class="nav-item"><a class="nav-link active" href="./skriva.php">Skriv</a></li>
                    <li class="nav-item"><a class="nav-link" href="./sok.php">Sök</a></li>
                    <li class="nav-item"><a class="nav-link" href="./lasa.php">Läsa</a></li>
                    <li class="nav-item anamn"><?php echo $_SESSION["anamn"] . " (" . $_SESSION["antal"] . ")" ?></li>
                <?php } else { ?>
                    <li class="nav-item"><a class="nav-link" href="./login.php">login</a></li>
                    <li class="nav-item"><a class="nav-link" href="./registrera.php">Registrera</a></li>
                <?php } ?>
            </ul>
        </nav>
        <form action="#" method="post">
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
            $sql = "INSERT INTO post (header, postText, user_id) VALUES ('$header', '$postText', '$_SESSION[user_id]')";
            var_dump($sql);

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