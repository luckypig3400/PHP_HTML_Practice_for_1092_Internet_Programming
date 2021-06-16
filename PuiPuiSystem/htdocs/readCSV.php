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

    <form action="" method="GET">
        <input type="text" name="filePath" value="csv/exampleFormat.csv" hidden>
        <input type="submit" value="使用格式範例檔">
    </form>
    <form action="" method="GET">
        <input type="text" name="filePath" value="csv/201904.csv" hidden>
        <input type="submit" value="使用醫資試題">
    </form>

    <?php
    isset($_GET['filePath']) ? $filePath = $_GET['filePath'] : $filePath = "csv/exampleFormat.csv";
    //https://stackoverflow.com/questions/2805427/how-to-extract-data-from-csv-file-in-php

    $row = 1; //第一列為標題
    if (($handle = fopen($filePath, "r")) !== false) {
        while (($data = fgetcsv($handle, 66666, ",")) !== false) {
            $numOfColumns = count($data);
            //echo "<p> $numOfColumns fields in line $row : <br> </p>\n";

            if ($row == 1) echo "<div style=\"overflow-x:auto;\"><table border=\"3px\" align=\"center\">"; //遇到第一列先建立table
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
        echo "</table></div>";
        //響應式表格:
        //https://www.w3schools.com/howto/howto_css_table_responsive.asp
        fclose($handle);
    }
    ?>
</body>

<script src="assets/js/readCSV.js"></script>

</html>