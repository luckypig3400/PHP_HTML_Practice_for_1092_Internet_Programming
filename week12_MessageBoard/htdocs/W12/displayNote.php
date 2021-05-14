<?php
include("configure.php");
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>北護簡易PHP留言板</title>
</head>

<body align="center">
    <h1>北護簡易PHP留言板</h1>

    <h3><a href="./addnote.html">我要留言~</a></h3>

    <h3>留言板內容</h3>
    <table align="center" border="3">
        <tr align="center" bgcolor="#FFAACC">
            <td width="100">發佈日期</td>
            <td width="150">標題</td>
            <td width="360">發 &nbsp; 佈 &nbsp; 訊 &nbsp; 息</td>
            <td>修改</td>
            <td>刪除</td>
        </tr>

        <?php
        $link = new PDO('mysql:host=' . $hostname . ';dbname=' . $database . ';charset=utf8', $username, $password);

        $query = "SELECT DATE_FORMAT(`note`.`Time`, '%Y-%m-%d %h:%i:%s') AS Time, `note`.`Title`," .
            " `note`.`Description`, `note`.`ID` FROM `note` WHERE 1=1 ORDER BY `note`.`Time` DESC LIMIT 0,30;";
        //time format:https://www.fooish.com/sql/mysql-date_format-function.html

        $result = $link->query($query);

        foreach ($result as $row) {
            // $row中有$row["Time"]、$row["Title"]與$row["Description"]三欄位的值。
            echo "<tr align=center bgcolor=\"#FFEECC\"><td>" . $row["Time"] . "</td>";
            echo "<td valign=\"top\" align=\"left\"><H2>" . $row["Title"] . "</H2></td>";
            echo "<td>" . nl2br($row["Description"]) . "</td>";
            // 上行的 nl2br() 把換行符號\r\n轉成HTML的<br>
            //https://www.php.net/manual/en/function.nl2br.php
            echo "<td><form action='./modify.php' method='POST'><input type='text' name='msgID' hidden value=" .
                $row["ID"] . "><input type='submit' value='修改'></form></td>";
            echo "<td><form action='./delete.php' method='POST'><input type='text' name='msgID' hidden value=" .
                $row["ID"] . "><input type='submit' value='刪除'></form></td></tr>";
        }

        ?>

    </table>
</body>

</html>