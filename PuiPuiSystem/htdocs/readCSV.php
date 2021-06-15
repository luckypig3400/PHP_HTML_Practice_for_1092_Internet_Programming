<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV讀取範例</title>
</head>

<body align="center">
    <h3>讀取本機csv範例</h3>
    <?php
    //https://stackoverflow.com/questions/2805427/how-to-extract-data-from-csv-file-in-php

    $row = 1; //第一列為標題
    if (($handle = fopen("csv/exampleFormat.csv", "r")) !== false) {
        while (($data = fgetcsv($handle, 66666, ",")) !== false) {
            $numOfColumns = count($data);
            //echo "<p> $numOfColumns fields in line $row : <br> </p>\n";

            if ($row == 1) echo "<table border=\"3px\">"; //遇到第一列先建立table
            echo "<tr>";
            for ($c = 0; $c < $numOfColumns; $c++) { //c 表示column
                if ($row == 1) { //title row (columns name)
                    echo "<th>" . $data[$c] . "</th>";
                } else { //content rows (columns content)
                    echo "<td>" . $data[$c] . "</td>";
                }
            }
            echo "</tr>";

            $row++;
        }
        echo "</table>";
        fclose($handle);
    }
    ?>
</body>

</html>