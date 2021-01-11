<?php
// skickar felmeddelanden
error_reporting(E_ALL);
// Inloggningsuppgifter till databasen
$host = "localhost";
$db = "Top_5";
$user = "Top_5";
$pass = "yYGNTdnWd3BcOWBp";

// steg 1 - skapa en anslutning
$conn = new mysqli($host, $user, $pass, $db);

// Gick det att ansluta
if ($conn->connect_error) {
    die("Kunde inte ansluta: " . $conn->error);
} else {
    //echo "<p>Ansluten</p>";
}
