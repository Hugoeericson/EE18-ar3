<?php
/**
* PHP version 7
* @category   Lånekalkylator
* @author     Hugo Ericson <hugo.ericson@elev.ga.ntig.se>
* @license    PHP CC
*/
session_start();

// Logga ut genom att döda session variablerna
session_destroy();

// Hoppa till logga in
header("Location: ./login.php");
