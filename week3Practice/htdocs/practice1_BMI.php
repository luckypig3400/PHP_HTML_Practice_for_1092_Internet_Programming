<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI計算機</title>
</head>

<body align="center">
    <h1>BMI計算機</h1>
    <h2>計算結果如下:</h2>
    <?php
    $h = $_POST['height'];
    $w = $_POST['weight'];
    $bmi = $w / ($h * $h);
    echo '身高:' . $h . '公尺<br>' . '體重:' . $w . '公斤<br>';
    echo '<h2>BMI:' . $bmi . '</h2>';
    ?>
</body>

</html>