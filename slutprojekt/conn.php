<?php
/*
* PHP version 7
* @category   Lånekalkylator
* @author     Hugo Ericson <hugo.ericson@elev.ga.ntig.se>
* @license    PHP CC
*/

$user = "hugo";
$db = "shortcuts";
$host = "localhost";
$pass = "c7dRoCPmH92KPcvH";

// Logga in på mysql-server och välj databas
$conn = new mysqli($host, $user, $pass, $db);

// gick det att ansluta?
if ($conn->connect_error) {
    die("Du lyckades inte att ansluta: " . $conn->connect_error);   
}