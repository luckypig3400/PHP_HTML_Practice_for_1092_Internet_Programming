<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>字串陣列排序(A~Z)</title>
</head>

<body align="center">

    <h1>字串陣列排序(A~Z)</h1>
    <h3>排序結果如下:</h3>

    <?php
    /*
	題目說明：
	  1. 計算$Student陣列的元素數目
	  2. 將名字排序，並顯示出來 (由A~Z排序)
    */
    // 一個陣列所宣告產生的學生姓名
    $Student = array("Derek", "Joe", "Kevin", "Charlton", "Lee", "Martin");
    sort($Student);
    for ($i = 0; $i < count($Student); $i++) {
        echo $Student[$i] . '<br>';
    }

    echo '<h3>陣列中共有' . count($Student) . '個元素</h3>'

    ?>

</body>

</html>