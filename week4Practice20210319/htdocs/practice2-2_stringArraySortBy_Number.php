<!DOCTYPE html>
<!--
	題目說明：
	  1. 計算$Student陣列的元素數目
	  2. 將成績排序 (顯示學生姓名與成績，成績由高至低排序)
	
      // 一個陣列所宣告產生的學生姓名與成績
      $Student = array(array("可達鴨",0), array("皮卡丘",90), array("傑尼龜",70),
        array("妙蛙種子",80), array("胖丁",50), array("臭臭泥",40), array("果然翁",30),
        array("捲捲耳",60), array("帝牙盧卡",100), array("瑪納霏",99));
        
      陣列處理
     成績排序
     輸出
     陣列的數目
     排序後的結果 (顯示學生姓名與成績，成績由
    高至低排序)
     提示： 6.5.5相關函式
-->
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>字串陣列排序(數字)</title>
    </head>

    <body align="center">
        <h1>字串陣列排序(數字)</h1>

        <h3>原始陣列資料排序如下:</h3>

        <?php
        $Student = array(array("可達鴨",0), array("皮卡丘",90), array("傑尼龜",70),
        array("妙蛙種子",80), array("胖丁",50), array("臭臭泥",40), array("果然翁",30),
        array("捲捲耳",60), array("帝牙盧卡",100), array("瑪納霏",99));

        for ($i=0; $i < sizeof($Student); $i++) { 
          echo '姓名:' . $Student[$i][0] . ' 成績:' . $Student[$i][1] . '<br>';
        }

        echo '<h3>按成績排序後的陣列資料如下:</h3>';

        for($i = 0; $i < sizeof($Student); $i++){
          for ($j=0; $j < sizeof($Student) - 1; $j++) { 
            if($Student[$j][1] < $Student[$j+1][1]){
              $swapName = $Student[$j][0];
              $swapScore = $Student[$j][1];
              $Student[$j][0] = $Student[$j+1][0];
              $Student[$j][1] = $Student[$j+1][1];
              $Student[$j+1][0] = $swapName;
              $Student[$j+1][1] = $swapScore;
            }
          }
        }

        for ($i=0; $i < sizeof($Student); $i++) { 
          echo '姓名:' . $Student[$i][0] . ' 成績:' . $Student[$i][1] . '<br>';
        }

        ?>

    </body>

</html>