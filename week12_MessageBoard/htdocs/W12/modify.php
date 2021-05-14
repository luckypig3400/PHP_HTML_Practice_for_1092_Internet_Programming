<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改留言</title>
</head>

<body align="center">
    <h1>修改留言</h1>

    <?php
    include "configure.php";

    $link = new PDO('mysql:host=' . $hostname . ';dbname=' . $database . ';charset=utf8', $username, $password);

    if (isset($_POST['msgID']) && !isset($_POST['msgTitile'])) { //從主頁點進來的
        $id = $_POST['msgID'];

        $queryDataCommand = "SELECT * FROM `note` WHERE `note`.`ID`= " . $id . ";";
        $result = $link->query($queryDataCommand);

        $titleToModify = "";
        $contentToModify = "";
        foreach ($result as $row) {
            $titleToModify = $row['Title'];
            $contentToModify = $row['Description'];
        }

        echo "<form action='./modify.php' method='POST'>標題:<input type='text' name='msgTitle' value=" . $titleToModify .
            "><br><br><br>內容:<textarea name='msgContent' cols='30' rows='15'>" . $contentToModify .
            "</textarea><br><input type='submit' value='確定修改'></form>";
        
    } elseif (isset($_POST['msgTitle']) && isset($_POST['msgContent'])) { //從本頁面修改後送出
        //todo:write modified text to SQL
    } else {
        echo "Error: No content sent";
    }
    ?>

</body>

</html>