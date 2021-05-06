<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="./smhi.css">
</head>

<body>
    <div class="kontainer">
        <canvas id="myChart"></canvas>
    </div>
    <?php
    // url till smhi api
    $url = "https://opendata-download-metfcst.smhi.se/api/category/pmp3g/version/2/geotype/point/lon/18/lat/59/data.json";

    // hämta json-data
    $json =  file_get_contents($url);

    // avcoda json
    $jsonData = json_decode($json);

    //plocka ut publicerings datum¨
    $approvedTime = $jsonData->approvedTime;
    echo "<p>Prognosen publicerad $approvedTime</p>";
    echo "</div>";

    $timeSeries = $jsonData->timeSeries;

    // skapa en variabel för att samla ihop alla
    $tidpunkter = ""; 

    foreach ($timeSeries as $timeData) {
        $validTime = $timeData->validTime;
        echo "$validTime";
        $tidpunkter .= "'$validTime', ";
    }

    // skriv ut javascript
    echo "<script>";
    echo "const labels = [$tidpunkter];
    const data = {
        labels: labels,
        datasets: [{
            label: 'Tiodagars prognos',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [2, 10, 7, 9, 10, 10, 8],
            tension: 0.4,
        }]
    };const config = {
        type: 'line',
        data,
        options: {}
    };
    ";
    echo "</script>";
    
    ?>
</body>

</html>