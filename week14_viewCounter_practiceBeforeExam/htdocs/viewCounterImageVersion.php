<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>網頁瀏覽計數器--圖片版</title>
</head>

<body align="center">
    <div class="topnav">
        <!--https://www.w3schools.com/howto/howto_js_topnav.asp-->
        <a class="active" href="#">Home</a>
        <a href="#">Null</a>
        <div class="topnav-right">
            <!--https://www.w3schools.com/howto/howto_css_topnav_right.asp-->
            <?php
            echo "<a href=\"#\">現在時間:";
            echo date("Y-m-d H:i:s");
            echo "</a>";
            ?>
        </div>
    </div>

    <h1>歡迎光臨本站~ヾ(≧▽≦*)o</h1>

    <div class="footer">
        <p>
            總瀏覽次數(檔案紀錄簡易版):
            <?php
            if (file_exists("viewCount.txt")) {
                $file = fopen("viewCount.txt", "r");
                $counter = fgets($file);
                fclose($file);
                unlink("viewCount.txt");

                $counter = (int)$counter + 1;
                //echo $counter;

                $counterString = strval($counter);
                //https://stackoverflow.com/questions/1035634/converting-an-integer-to-a-string-in-php
                $counterCharArray = str_split($counterString);
                //https://stackoverflow.com/questions/2768314/convert-a-string-into-an-array-of-characters/50448824
                foreach ($counterCharArray as $digit) {
                    echo "<img src=\"digits/001/" . $digit . ".gif\">";
                }

                $newfile = fopen("viewCount.txt", "a+");
                fputs($newfile, $counter);
                fclose($newfile);
            } else {
                $file = fopen("viewCount.txt", "a+");
                fputs($file, "1");
                echo "<img src=\"digits/001/1.gif\">";
                fclose($file);
            }

            ?>
            次
        </p>

        <p>
            總瀏覽次數(SQL紀錄版不包含IP):
            <?php
            include "config.php";
            $link = new PDO('mysql:host=' . $hostname . ';dbname=' . $database . ';charset=utf8', $username, $password);

            $sqlCreateTableIfNotExists = 'CREATE TABLE IF NOT EXISTS `webviewlog_user`.`viewlogwithoutip` ( `viewTime` TIMESTAMP NOT NULL ) ENGINE = InnoDB;';
            //https://www.mysqltutorial.org/mysql-create-table/
            $result = $link->query($sqlCreateTableIfNotExists);

            $insertCommand = 'INSERT INTO `viewlogwithoutip` (`viewTime`) VALUES (current_timestamp());';
            $result = $link->query($insertCommand); //在顯示之前增加一筆紀錄

            $selectCommand = 'SELECT COUNT(viewTime) FROM `viewlogwithoutip`';
            $result = $link->query($selectCommand);
            //print_r($result);
            //https://stackoverflow.com/questions/2537767/how-to-convert-a-php-object-to-a-string

            foreach ($result as $row) {
                //echo $row["COUNT(viewTime)"];
                //使用 欄位名稱 做為陣列索引
                $numStr = $row["COUNT(viewTime)"];
                $numCharArray = str_split($numStr);

                foreach ($numCharArray as $digit) {
                    echo "<img src=\"digits/001/" . $digit . ".gif\">";
                }
            }

            ?>
            次
        </p>

        <p>
            <?php
            include "config.php";
            $link = new PDO('mysql:host=' . $hostname . ";dbname=" . $database . ";charset=utf8", $username, $password);

            $sqlCreateTableWithIP = 'CREATE TABLE IF NOT EXISTS `webviewlog_user`.`viewlogwithip` ( `IP` VARCHAR(66) NOT NULL , `viewTime` TIMESTAMP NOT NULL ) ENGINE = InnoDB;';
            $result = $link->query($sqlCreateTableWithIP);

            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $viewerIP = $_SERVER['HTTP_CLIENT_IP'];
            } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $viewerIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $viewerIP = $_SERVER['REMOTE_ADDR'];
            }
            //https://devco.re/blog/2014/06/19/client-ip-detection/

            $SQLcheckIPvisitTime = 'SELECT COUNT(viewTime) FROM `viewlogwithip` WHERE IP ="' .
                $viewerIP . '" AND `viewTime` >= (NOW() - INTERVAL 3 HOUR)';
            //https://stackoverflow.com/questions/35955039/how-to-add-1-hour-to-currrent-timestamp-in-mysql-which-is-the-default-value/35955291
            //https://stackoverflow.com/questions/17198468/from-the-timestamp-in-sql-selecting-records-from-today-yesterday-this-week-t
            $result = $link->query($SQLcheckIPvisitTime);
            foreach ($result as $row) {
                if ($row['COUNT(viewTime)'] == "0") {
                    echo "您的IP位址最近3小內首次瀏覽本網頁，已更新瀏覽次數";

                    $insertViewLog = 'INSERT INTO `viewlogwithip` (`IP`, `viewTime`) VALUES ("'
                        . $viewerIP . '", current_timestamp());';
                    $result = $link->query($insertViewLog);
                } else {
                    echo "您的IP位址最近3小內有訪問過本站，將不會更新瀏覽次數";
                }
            }

            $SQLselectIPviewCount = 'SELECT COUNT(viewTime) FROM `viewlogwithip`';
            $result = $link->query($SQLselectIPviewCount);
            foreach ($result as $row) {
                $totalViewCountWithIP = $row['COUNT(viewTime)'];
            }

            $tvcWithIPstr = str_split($totalViewCountWithIP);
            echo "<br><h3>總瀏覽次數(SQL紀錄版含IP):";
            foreach ($tvcWithIPstr as $digit) {
                echo "<img src=\"digits/001/" . $digit . ".gif\">";
            }
            echo "次</h3>您的IP位置:" . $viewerIP;

            ?>
        </p>
    </div>
    <!--https://www.w3schools.com/howto/howto_css_fixed_footer.asp-->
</body>

<style>
    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: black;
        color: white;
        text-align: center;
    }

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    /* Add a black background color to the top navigation */
    .topnav {
        background-color: #333;
        overflow: hidden;
    }

    /* Style the links inside the navigation bar */
    .topnav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    /* Change the color of links on hover */
    .topnav a:hover {
        background-color: #000;
        color: white;
    }

    /* Add a color to the active/current link */
    .topnav a.active {
        background-color: #04AA6D;
        color: white;
    }

    .topnav-right {
        float: right;
    }
</style>

</html>