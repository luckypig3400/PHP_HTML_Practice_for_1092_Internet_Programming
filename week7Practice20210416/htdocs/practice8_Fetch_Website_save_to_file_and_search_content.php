<?php
/*
	題目說明：
	  擷取新聞各大版網頁，然後儲存至1.htm~5.htm，並結合Practice 6  (W08-2)，提供一搜尋當日新聞的功能。
*/

// 5個新聞的連結($URLLink[0] ~ $URLLink[4])
$URLLink = array("https://www.nownews.com/cat/global/", "https://www.nownews.com/cat/sport/", "https://www.nownews.com/cat/society/", "https://www.nownews.com/cat/column/", "https://www.nownews.com/cat/finance/");

if (isset($_GET["Keyword"]))
    $Keyword = $_GET["Keyword"];
else
    $Keyword = "";
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice8 抓取網頁保存成HTML檔並搜尋內文</title>
</head>

<body>
    <h1>離線網頁內文檢索系統(簡易版)</h1>
    <form action="" method="GET">
        關鍵字：
        <input type="text" name="Keyword" value="<?php echo $Keyword; ?>" />
        <input type="submit" />
    </form>

    <?php



    ?>

</body>

</html>