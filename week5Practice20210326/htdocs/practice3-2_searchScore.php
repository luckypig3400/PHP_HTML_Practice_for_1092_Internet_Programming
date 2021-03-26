<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NTUNHS成績查詢系統</title>
    </head>

    <body align="center">
        <h1>NTUNHS成績查詢系統</h1>

        <form action="" method="GET">
            請輸入學生姓名或學號：
            <input type="text" name="Keyword" value="" />
            <input type="submit" />
        </form><br />

        <h3>搜尋結果如下:</h3>
    </body>

</html>

<?php
    /*
	題目說明：
	  搜尋$Score，當輸入關鍵字(部分)符合$Score[?]的第1個欄位或第2個欄位時
      ，則顯示出$Score[?]該筆資料。
    */

    // 一個陣列所宣告產生的資料庫
    //	欄位依序代表「學生姓名」、「學生學號」、「國文成績」、「英文成績」與「數學成績」
    $Score = array(
        array("王小明", "440000001", 95, 93, 92),
        array("王小乖", "440000002", 85, 95, 77),
        array("王小笨", "440000003", 87, 76, 50),
        array("王大毛", "412345678", 88, 95, 85),
        array("林大毛", "440000005", 79, 82, 82)
    );

    //echo sizeof($Score);

    $kw = isset($_GET['Keyword']) ? $_GET['Keyword'] : "Error No Parameter sent.";
    $createTable = false;
    for ($i = 0; $i < sizeof($Score); $i++) { //逐列掃描陣列
        //echo sizeof($Score[$i]) . "<br>";
        
        if (strstr($Score[$i][0], $kw) || strstr($Score[$i][1], $kw)) {
        //查詢該列儲存姓名及學號的欄位是否包含關鍵字
            if ($createTable == false) {//有找到資料才建立表格
                echo "<table width=60% border=6px align=\"center\"><tr><th>學生姓名</th><th>學生學號
                </th><th>國文成績</th><th>英文成績</th><th>數學成績</th></tr>";
                $createTable = true;
            }
            
            for ($j = 0; $j < sizeof($Score[$i]); $j++) { //儲存該列的每個元素
                if ($j == 0)
                    echo "<tr><td>" . $Score[$i][$j] . "</td>"; //第一欄
                else if ($j == sizeof($Score[$i]) - 1)
                    echo "<td>" . $Score[$i][$j] . "</td></tr>"; //最末欄
                else
                    echo "<td>" . $Score[$i][$j] . "</td>";
           }
        }
    }

    if ($createTable) echo '</table>';

?>