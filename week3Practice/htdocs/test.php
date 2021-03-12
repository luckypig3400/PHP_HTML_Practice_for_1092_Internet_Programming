<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form variables getter</title>
</head>

<body>
    <?php
        $a = $_POST["test1"];
        echo "我收到的內容如下:<br>";
        echo "$a";
    ?>
</body>

</html>