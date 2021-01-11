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
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label>Ange filnamn
                <input type="file" name="file">
            </label>
            <button type="submit" name="submit">Ladda upp</button>
        </form>
    </div>
</body>

</html>