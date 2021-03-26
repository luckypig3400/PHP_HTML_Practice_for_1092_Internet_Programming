<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>字串比較</title>
    </head>

    <body align="center">

        <h1>字串比較器</h1>

        <?php
        //isset()判斷傳遞的參數是否有被回傳 isset()回傳值為(true/false)
        $A = isset($_POST["strA"]) ? $_POST["strA"] : "Error相應的變數沒有被傳遞";
        //三元運算子 條件式1 ? 條件式2 : 條件式3
        //如果條件式1成立則執行條件式2否則執行條件式3
        $B = isset($_POST["strB"]) ? $_POST["strB"] : "Error相應的變數沒有被傳遞";

        echo '<h3>接收到的字串如下</h3>字串A:' . $A . '<br>字串B:' . $B;
        echo '<h3>判斷結果如下</h3>';

        if($A == '' && $B == '')
            echo '請輸入字串後再試一次';
        else if(strcmp($A,$B) == 0)
            echo '字串完全相等(絕對相等)';
        else if(strcasecmp($A,$B) == 0)
            echo '不分大小寫相等(相對相等)';
        else
            echo '不相等';
        ?>
    </body>

</html>