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
    date_default_timezone_set("Asia/Taipei");
    //https://lamb-mei.com/138/php-%E6%99%82%E5%8D%80-timezone-%E8%A8%AD%E5%AE%9A/

    echo date("Y-m-d H:i:s") . "<br>";

    $timeStr = date("Y-m-d H:i:s");
    $timeCharArray = str_split($timeStr);

    $dirs = array_filter(glob('digits/*'), 'is_dir');
    //print_r("digits內的資料夾數:" . sizeof($dirs) . "<br>");
    //print_r($dirs);
    //https://stackoverflow.com/questions/2524151/php-get-all-subdirectories-of-a-given-directory

    echo "<h3>預設造型時鐘:</h3>";
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

    echo "<h3>隨機造型時鐘:</h3>";
    $digitFolder = $dirs[rand(0, sizeof($dirs))];
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
                echo "<img src=\"" . $digitFolder . "/" . $number . ".gif\">";
                break;
        }
    }
    ?>
</body>

</html>