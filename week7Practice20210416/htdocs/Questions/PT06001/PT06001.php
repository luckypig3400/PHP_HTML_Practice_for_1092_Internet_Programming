<?php
/*
	題目說明：
	  在Practice 3中，我們使用陣列來搜尋關鍵字，現在，將程式轉變為在檔案中搜尋關鍵字，在1.txt~10.txt中尋找關鍵字，然後將符合的檔案搜尋出來，並
	    1. 檔案名稱用連結表示
	    2. 符合的該行顯示出來(一檔案只要一行就好)
	    3. 關鍵字可忽略換行的問題
*/

	if (isset($_GET["Keyword"]))
		$Keyword = $_GET["Keyword"];
	else
		$Keyword = "";
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Practice 6</title>
</head>
<body>

<form action="" method="GET">
關鍵字：
	<input type="text" name="Keyword" /><input type="submit" />
</form>

<?php

?>

</body>
</html>
