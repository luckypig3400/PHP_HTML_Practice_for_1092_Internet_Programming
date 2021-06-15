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
    $row = 1;
    if (($handle = fopen("csv/exampleFormat.csv", "r")) !== false) {
        while (($data = fgetcsv($handle, 66666, ",")) !== false) {
            $num = count($data);
            echo "<p> $num fields in line $row : <br> </p>\n";
            $row++;
            for ($c = 0; $c < $num; $c++) {
                echo $data[$c] . "<br> \n";
            }
        }
        fclose($handle);
    }
    ?>
</body>

</html>