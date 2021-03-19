<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>字串比較</title>
    </head>

    <body>
        <?php
        //isset()判斷是否傳遞的參數有填值回傳true/false
        $A = isset($_POST["strA"]) ? $_POST["strA"] : "";
        //三元運算子 條件式1 ? 條件式2 : 條件式3
        //如果條件式1成立則執行條件式2否則執行條件式3
        $B = isset($_POST["strB"]) ? $_POST["strB"] : "";
        ?>
    </body>

</html>