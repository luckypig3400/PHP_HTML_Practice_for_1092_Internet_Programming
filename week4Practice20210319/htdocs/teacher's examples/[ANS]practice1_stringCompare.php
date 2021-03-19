<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Practice 1</title>
</head>

<body>
	比較以下兩字串<br>
	<form action="" method="GET">
		<input type="text" name="Value1" value="" /> ≡ <input type="text" name="Value2" value="" /><input type="submit" />
	</form>

	<?php
	$v1 = isset($_GET["Value1"]) ? $_GET["Value1"] : "";
	$v2 = isset($_GET["Value2"]) ? $_GET["Value2"] : "";
	
	if (strcmp($v1, $v2) == 0)
		echo '絕對相等';
	else if (strcasecmp($v1, $v2) == 0)
		echo '相對相等';
	else
		echo '不相等';
	?>

</body>

</html>