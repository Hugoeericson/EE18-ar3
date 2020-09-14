<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
    <?php
        $color = $_POST["färg"];
        echo "<body style=\"background: $color;\">";
    ?>
</body>
</html>