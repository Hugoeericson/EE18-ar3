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
        <?php
        if (isset($_POST['submit'])) {

            // Ta emot filen
            $file = $_FILES['file'];

            var_dump($file);

            // Filens info
            $fileName = $file["name"];
            $fileSize = $file["size"];
            $fileType = $file["type"];
            $fileTempName = $file["tmp_name"];
            $error = $file["error"];

            // Tillåtna filtyper
            $allowed = ["jpeg", "png", "gif"];

            // Bilden filtyp
            $delar = explode("/", $fileType);
            $imageType = $delar[1];

            // Är filen tillåten?
            if (in_array($imageType, $allowed)) {
                if ($error === 0) {
                    // Är filen för stor?
                    if ($fileSize < 200000) {
                       // Skapa ett unikt filnamn
                       $fileNameNew = uniqid('', true) . ".$imageType";

                       // vart filen ska hamna
                       $fileDestination = "./uppladdat/$fileNameNew";

                       // Flyttar filen in i mappen
                       move_uploaded_file($fileTempName, $fileDestination);
                       
                       echo "<p>Filen är uppladdad!</p>";
                    } else {
                        echo "<p>Filen är för stor!</p>";
                    }
                } else {
                    echo "<p>Det upstod ett fel!</p>";
                }
                
            } else {
                echo "<p>Du får bara ladda upp jpeg, png, eller gif filer!</p>";
            }
        }    
        ?>
    </div>
</body>
</html>