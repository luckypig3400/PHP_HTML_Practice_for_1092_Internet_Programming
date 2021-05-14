<?php
include("configure.php");
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Show SQL Select</title>
</head>

<body>
    <h1>PHP Show SQL Select</h1>

    <table align="center" border="3">
        <tr align="center" bgcolor="#FFAACC">
            <td width="100">發佈日期</td>
            <td width="150">標題</td>
            <td width="360">發 &nbsp; 佈 &nbsp; 訊 &nbsp; 息</td>
        </tr>

        <?php
        $link = new PDO('mysql:host=' . $hostname . ';dbname=' . $database . ';charset=utf8', $username, $password);

        $query = "SELECT DATE_FORMAT(`note`.`Time`, '%Y-%m-%d %h:%i:%s') AS Time, `note`.`Title`, `note`.`Description` FROM `note` WHERE 1=1 ORDER BY `note`.`Time` DESC LIMIT 0,30;";
        //time format:https://www.fooish.com/sql/mysql-date_format-function.html

        $result = $link->query($query);

        foreach ($result as $row) {
            // $row中有$row["Time"]、$row["Title"]與$row["Description"]三欄位的值。
            echo "<tr align=center bgcolor=\"#FFEECC\"><td>" . $row["Time"] . "</td>";
            echo "<td valign=\"top\" align=\"left\"><H2>" . $row["Title"] . "</H2></td>";
            echo "<td>" . nl2br($row["Description"]) . "</td></tr>";
            // 上行的 nl2br() 把換行符號\r\n轉成HTML的<br>
            //https://www.php.net/manual/en/function.nl2br.php
        }

        ?>

    </table>
</body>

</html>