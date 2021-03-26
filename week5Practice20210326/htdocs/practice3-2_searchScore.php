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
	$Score = array( array("王小明", "440000001", 95, 93, 92),
					array("王小乖", "440000002", 85, 95, 77),
					array("王小笨", "440000003", 87, 76, 50),
					array("王大毛", "412345678", 88, 95, 85),
					array("林大毛", "440000005", 79, 82, 82));
    
    echo sizeof($Score);
?>