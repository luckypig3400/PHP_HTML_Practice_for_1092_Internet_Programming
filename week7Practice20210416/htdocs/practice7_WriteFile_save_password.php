<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice 7 寫入檔案</title>
</head>

<body>
    <form action="" method="post">
        帳號 ：<input type="text" name="username" /><br />
        密碼 ：<input type="password" name="password" /><br />
        <input type="submit" value="寫入password.dat" />
    </form>
</body>

<?php
/*
	題目說明：
	  當使用者輸入「帳號」與「密碼」後，將這兩個值存入一檔案(password.dat)中，然後再顯示出來。

	注意事項：
	  1. 「帳號」與「密碼」間用「;」隔開
	  2. 輸入兩筆以上時，之前的紀錄仍須存在(一筆用一行顯示)
*/
if ((isset($_POST["username"])) && (isset($_POST["password"])))    // 用isset()檢查變數是否有值(非NULL)
{
    // 接收使用者所傳送之帳號與密碼
    $username = $_POST["username"];
    $password = $_POST["password"];
}
?>

</html>