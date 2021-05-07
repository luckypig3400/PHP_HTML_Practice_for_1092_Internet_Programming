<?php
	include ("configure.php");
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>NTUNHS PHP+MySQL課程範例</title>
	<meta name="keywords" content=" MySQL, PHP, NTUNHS, PHP網路程式設計, 範例程式">
	<meta name="description" content=" 這是「PHP網路程式設計」課程用的PHP+MySQL範例程式">
</head>



<body>
	<br /><br />
	<table width="580" align="center" cellpadding="3" cellspacing="0" border="1">
		<!-- 本文 --->
		<tr align=center bgcolor="#FFDD88"><td width="100">發佈日期</td><td width="480">發 &nbsp; 佈 &nbsp; 訊 &nbsp; 息</td></tr>

		<?php
			// 建立與MySQL資料庫的連線
			$link = mysqli_connect($hostname, $username, $password, $database) OR die("Error: Unable to connect to MySQL.");
			// 設定編碼方式為UTF-8
			// 另一種寫法	mysqli_query($link, "SET NAMES utf8");
			mysqli_set_charset($link, "utf8");

			// 用SQL語法呼叫mysqli_query()
			$query = "SELECT DATE_FORMAT(`News`.`Time`,'%Y-%m-%d') AS Time,`News`.`Title`,`News`.`Description` FROM `News` WHERE `News`.`Flag`=1 ORDER BY `News`.`Time` DESC LIMIT 0,30;";
			$result = mysqli_query($link, $query) or die("Connect DB Table Error!");

			// mysqli_query()的結果會放在$result中；一般為一陣列(Array)，包含N筆資料。
			// 然後，用mysqli_fetch_array($result)將此N筆資料，1筆1筆的讀出來，放至$row中。
			while ($row=mysqli_fetch_array($result))
			{
				// 在此例中，$row中有$row["Time"]與$row["Description"]兩欄位的值。
				echo "		<tr align=center bgcolor=\"#FFEECC\"><td>" . $row["Time"] . "</td><td valign=\"top\" align=\"left\"><H2>" . $row["Title"] . "</H2> " . $row["Description"] . "</td></tr>";
			}

			// 釋放結果集($result)所佔用的記憶體。(若無釋放，程式可能會錯誤，尤其是用"SELECT ..."的時候)
			mysqli_free_result($result);

			// 關閉與MySQL資料庫的連線
			mysqli_close($link);
		?>

	</table><br /><br />

</body>
</html>
