<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Text till morsekod</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Omvandla text till morsekod</h1>
        <form action="..." method="POST">
            ...
        </form>
        <?php

        /* Ta emot data som skickas */
        ...
        {
        
            /* Morsealfabetet A-Z och mellanslag */
            $morse['A'] = '.-';
            ...

            /* Omvandla texten till versaler (stora bokstäver) */
            ...
            
            /* Dela upp texten i dess bokstäver */
            ...
            
            /* Loopa igenom texten */
            ... {

                /* Skriv ut bokstavens morsekod */
                ...
            }
        }
        ?>
    </div>
</body>
</html>