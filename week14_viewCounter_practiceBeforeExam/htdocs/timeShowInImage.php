<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>系統時間顯示器(圖片版)</title>
</head>

<body align="center">
    <h1>現在時間</h1>
    <?php
    echo date("Y-m-d H:i:s") . "<br>";

    $timeStr = date("Y-m-d H:i:s");
    $timeCharArray = str_split($timeStr);

    foreach ($timeCharArray as $number) {
        switch ($number) {
            case '-':
                echo "<img src=\"digits/001/d.gif\">";
                break;
            case ' ':
                echo "<br>";
                break;
            case ':':
                echo "<img src=\"digits/001/c.gif\">";
                break;
            default:
                echo "<img src=\"digits/001/" . $number . ".gif\">";
                break;
        }
    }
    ?>
</body>

</html>