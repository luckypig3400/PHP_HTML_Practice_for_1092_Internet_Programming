<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>檔案內文關鍵字查詢系統</title>
    </head>

    <body align="center">
        <h1>檔案內文關鍵字查詢系統</h1>
        <form action="" method="GET">
            關鍵字：
            <input type="text" name="Keyword" />
            <input type="submit" />
        </form>
    </body>

    <?php
    /*
	題目說明：
	  在Practice 3中，我們使用陣列來搜尋關鍵字，現在，將程式轉變為在檔案中搜尋關鍵字，在1.txt~10.txt中尋找關鍵字，然後將符合的檔案搜尋出來，並
	    1. 檔案名稱用連結表示
	    2. 符合的該行顯示出來(一檔案只要一行就好)
	    3. 關鍵字可忽略換行的問題
    */

	$Keyword = isset($_GET["Keyword"]) ? $_GET["Keyword"] : "";
    $foundCount = 0;

    for($i=1; $i<=10; $i++){//共有10個檔案
        $filePath = "Questions\\PT06001\\" . $i . ".txt";
        $file = fopen($filePath, "r");

        $currentReadLineString = "";
        while(!feof($file)){//逐行讀取該檔案直到檔案結尾
            $currentReadLineString = fgets($file);
            if(strcasecmp($currentReadLineString, $Keyword) == 0){
                if($foundCount == 0)
                    echo "<h3>搜尋結果如下</h3>";
                echo "<a href=$filePath>$i.txt</a><br>";
                echo $currentReadLineString . "<br>";
                $foundCount += 1;
                break;
            }
        }

        fclose($file);
    }

    if($foundCount == 0)
        echo "<h3>查無結果</h3>";

    ?>

</html>