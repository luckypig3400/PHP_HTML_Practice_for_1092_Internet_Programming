<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>9x9 Table</title>
</head>

<body>
    <?php
    echo "<table style=\"width:100%\" border=\"6\">";
    for ($i = 1; $i <= 9; $i++) {
        echo "<tr>";

        for ($j = 1; $j <= 9; $j++) {
            echo "<td>";
            echo "$i x $i = " . ($i*$j);
            echo "</td>";
        }

        echo "</tr>";
    }
    echo "</table>"
    ?>
</body>

</html>