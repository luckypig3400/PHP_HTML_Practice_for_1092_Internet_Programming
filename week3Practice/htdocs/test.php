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
    $name = $_POST["userName"];
    $email = $_POST["emailVar"];
    $pwd = $_POST["pwd"];
    $pwdCheck = $_POST["pwdCheck"];
    echo "我收到的內容如下:<br>";
    echo "您好$name <br>";
    echo "日後請用電子郵件:$email 登入 <br>";
    if ($pwd === $pwdCheck) {
        echo "您的密碼為:$pwd 請牢記!!!";
    } else {
        echo "兩次的密碼輸入不相同 請檢查並重新輸入";
    }
    ?>
</body>

</html>