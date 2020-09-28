<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arrayer och foreach()</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    // EN array som innehåller länder
    $länder = ["Svergie", "Norge", "Finland"];

    // skriver ut en array
    print_r($länder);

    // skriva ut en del ur en array
    echo "<p>$länder[0]</p>";
    echo "<p>$länder[1]</p>";
    echo "<p>$länder[2]</p>";

    // utöka array
    $länder[] = "Danmark";
    echo "<p>$länder[3]</p>";

    // ta bort ett element ur en array
    unset($länder[2]);
    //print_r($länder);

    // Associativ array
    $elever = []; // tom array
    $elever["Hugo"] = "Piano";
    $elever["Hampus"] = "keyboard";
    $elever["Olle"] = "Munspel";
    print_r($elever);

    // skriva ut hela arrayen
    $länder[2] = "Finland";
    echo "<p>$länder[0]</p>";
    echo "<p>$länder[1]</p>";
    echo "<p>$länder[2]</p>";
    echo "<p>$länder[3]</p>";

    // Loopa igenom en array = foreach
    foreach ($länder as $land) {
        echo "<p>$land</p>";
    }
    foreach ($elever as $elev) {
        echo "<p>$instrument</p>";
    }
    foreach ($elever as $key => $instrument) {
        echo "<p>$key spelar $instrument</p>";
    }


    /* 
    <table>
        <tr>
            <td>John</td>
            <td>Doe</td>
        </tr>
        <tr>
            <td>Jane</td>
            <td>Doe</td>
        </tr>
    </table>
    */
    echo "<table>";
    echo "<tr>";
    echo "<td>John</td>";
    echo "<td>Doe</td>";
    echo "</tr>";
    echo "</table>";

    // dynamiskt skapad tabel
    echo "<table>";
    foreach ($länder as $land) {
        echo "<tr>";
        echo "<td>$land</td>";
        echo "</tr>";
    }
    echo "</table>";

    // skriv ut arrayen elever som en tabell
    echo "<table>";
    echo "<tr>
            <th>Namn</th>
            <th>instrument</th>
        </tr>";
    foreach ($elever as $key => $instrument) {
        echo "<tr>";
        echo "<td>$key</td>";
        echo "<td>$instrument</td>";
        echo "</tr>";
    }
    echo "</table>";

    $mening = "Newton's law of universal gravitation is usually stated as that every particle attracts every other particle in the universe with a force that is directly proportional to the product of their masses and inversely proportional to the square of the distance between their centers.";

    $allaOrd = explode(" ", $mening);

    // skriv ut alla ord numrerade
    echo "<table>";
    foreach ($allaOrd as $key => $ord) {
        $key = $key + 1;
        echo "<tr>";
        echo "<td>$key</td>";
        echo "<td>$ord</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>