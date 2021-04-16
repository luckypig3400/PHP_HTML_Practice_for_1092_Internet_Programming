<?php
/*
	題目說明：
	  1. 使用PHP開啟board.txt檔，然後將其內容顯示出來。
	  2. TXT檔中換行的地方，用PHP與HTML處理後，也需要換行。
*/
$filePath = "Questions\\PT05001\\board.txt";
$file1 = fopen($filePath, "r") or die("Unable to open file!");
// https://www.w3schools.com/php/php_file_open.asp
echo fread($file1 , filesize($filePath));

fclose($file1);
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Practice5 檔案讀取練習</title>
    </head>

    <body>

    </body>

</html>