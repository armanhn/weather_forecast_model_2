<?php
$url = "https://api.openweathermap.org/data/2.5/forecast?q=Dhaka&appid=4a68645c7ae1136b967350d71a88207f&units=metric";
$contents = file_get_contents($url);
$data = json_decode($contents);
$each = $data->list;
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">


    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Five Days Forecast</h1>
        <div class="container">
            <table id="mytable" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Date and Time</th>
                        <th scope="col">Temperature Maximum</th>
                        <th scope="col">Temperature Minimum</th>
                        <th scope="col">Weather Information</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < 40; $i++) {
                        echo "<tr>";
                        $b = $i;
                        $a = strval($b + 1);
                        echo "<th scope='row'>$a</th>";
                        echo "<td>";

                        $data = $each[$i]->dt;
                        $data_time = date('F j, Y, g:i a', $data);
                        echo $data_time;

                        echo "</td>";
                        echo "<td>";

                        $temp_max = $each[$i]->main->temp_max;

                        echo $temp_max . "&degC";

                        echo "</td>";
                        echo "<td>";

                        $temp_min = $each[$i]->main->temp_min;

                        echo $temp_min . "&degC";

                        echo "</td>";
                        echo "<td>";

                        $weather = $each[$i]->weather[0]->main;
                        $weather_description = $each[$i]->weather[0]->description;
                        $icon = $each[$i]->weather[0]->icon;

                        echo $weather . ", " . $weather_description . " " . "<img src='https://openweathermap.org/img/w/$icon.png' alt=''>";

                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="index.js"></script>
</body>

</html>