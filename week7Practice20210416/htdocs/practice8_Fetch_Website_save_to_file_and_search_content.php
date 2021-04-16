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

for ($i = 0; $i < sizeof($URLLink); $i++) {
    $fileNameToSave = $i + 1 . ".html";
    $htmlFile = fopen($fileNameToSave, "w+");

    //https://stackoverflow.com/questions/819182/how-do-i-get-the-html-code-of-a-web-page-in-php
    $htmlStrings = file_get_contents($URLLink[$i]);

    fwrite($htmlFile, $htmlStrings);
    fclose($htmlFile);
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice8 抓取網頁保存成HTML檔並搜尋內文</title>
</head>

<body align="center">
    <h1>離線網頁內文檢索系統(簡易版)</h1>
    <form action="" method="GET">
        關鍵字：
        <input type="text" name="Keyword" value="<?php echo $Keyword; ?>" />
        <input type="submit" />
    </form>

    <?php
    if ($Keyword != "") {
        $foundCount = 0;

        for ($i = 0; $i < sizeof($URLLink); $i++) {
            $filePath = $i + 1 . ".html";
            $file = fopen($filePath, "r");

            while (!feof($file)) {
                $currentLineString = fgets($file);

                if (strstr($currentLineString, $Keyword)) {

                    if ($foundCount == 0)
                        echo "<h3>搜索結果如下</h3>";

                    echo "<h4><a href=\"" . $filePath . "\">" . $filePath . "</a></h4><br>";
                    echo "<table align=\"center\" width=\"66%\" border=\"6px\"><tr><th>於"
                        . $filePath . "中搜索到的內容如下</th></tr><tr><td>";
                    echo $currentLineString;
                    echo "</td></tr></table>";
                    $foundCount += 1;
                    break; //found Keyword in current file, break to search in other files
                }
            }
        }

        if ($foundCount == 0)
            echo "<h3>很抱歉!沒有找到相關內容，請嘗試其他關鍵字</h3>";
    } else {
        echo "<h3>請輸入要查詢的字串喔!</h3>";
    }
    ?>

</body>

</html>