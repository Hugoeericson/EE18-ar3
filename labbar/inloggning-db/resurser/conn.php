<?php
// skickar felmeddelanden
error_reporting(E_ALL);
// Inloggningsuppgifter till databasen
$host = "localhost";
$db = "register";
$user = "register";
$pass = "lZVhQMoIWGkb2Pfq";

// steg 1 - skapa en anslutning
$conn = new mysqli($host, $user, $pass, $db);

// Gick det att ansluta
if ($conn->connect_error) {
    die("Kunde inte ansluta: " . $conn->error);
} else {
    echo "<p>Ansluten</p>";
}
