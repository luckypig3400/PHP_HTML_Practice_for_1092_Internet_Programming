<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>網頁瀏覽計數器</title>
</head>

<body align="center">
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
                echo $counter;

                $newfile = fopen("viewCount.txt", "a+");
                fputs($newfile, $counter);
                fclose($newfile);
            } else {
                $file = fopen("viewCount.txt", "a+");
                fputs($file, "1");
                echo "1";
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

            $sqlCheckTable = 'SELECT * FROM information_schema.tables WHERE table_schema ="' . $database . '" AND table_name = "viewlogwithoutip" LIMIT 1;';
            //https://stackoverflow.com/questions/8829102/check-if-table-exists-without-using-select-from

            $result = $link->query($sqlCheckTable);

            print_r($result);
            //https://stackoverflow.com/questions/2537767/how-to-convert-a-php-object-to-a-string

            foreach($result as $row){
                echo $row;
            }
            
            if (empty($result)) {
                echo "QAQ回傳的查詢結果不存在，尚未建立該資料表";

                $createTableCommand = 'CREATE TABLE `webviewlog_user`.`viewlogwithoutip` ( `viewCount` INT NOT NULL , `viewTime` TIMESTAMP NOT NULL ) ENGINE = InnoDB;';
            }
            ?>
            次
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
</style>

</html>