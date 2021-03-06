<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>檢查帳號密碼(1維陣列)</title>
    </head>

    <body align="center">
        <h1>檢查帳號密碼(1維陣列)</h1>

        <h3>請嘗試登入(帳號不分大小寫，密碼須完全符合)</h3>

        <form action="" method="POST">
            請輸入帳號:<input type="text" name="account" id=""><br>
            請輸入密碼:<input type="password" name="pwd" id=""><br>
            <input type="submit"> <input type="reset">
        </form>

        <h3>登入驗證結果如下</h3>

        <?php
        /*
        讓使用者輸入的帳號跟密碼，然後與$UserDB和$PassDB內之資料均符合時，顯示「登入成功」；
        當帳號正確而密碼錯誤時，顯示「密碼錯誤」；若無此帳號，則顯示「帳號或密碼輸入錯誤」。
        1. 帳號不分大小寫，而密碼則需符合大小寫。 [提示：可用strcmp()與strcasecmp()，
        亦可用課本5-3的strtoupper()或strtolower()進行處理。]
        2. 需有中斷(Break)判斷，資料比對符合時即中斷，不能一直搜尋到最後。

        1個二維陣列
        $UserPass = array(array("derek","123456"),array("rolla","abcdeef"), 
        array("kevin","123abc"),array("eve","abc123"), array("john","abcdefgh"),
        array("crystal","12345678"),array("peter","abcd1234"),array("mary","1234abcd"));
        想想兩種陣列有何不同，要怎麼寫？
        */

        //2個一維陣列
        $UserDB = array("derek", "rolla", "kevin", "eve", "john","crystal", "peter", "mary");
        $PassDB = array("123456", "abcdeef", "123abc","abc123", "abcdefgh", "12345678", "abcd1234","1234abcd");

        if(isset($_POST['account']) && isset($_POST['pwd'])){
            $foundAccount = false;
            for($i=0; $i<sizeof($UserDB) ;$i++){
                if(strcasecmp($_POST['account'],$UserDB[$i]) == 0){
                    if(strcmp($_POST['pwd'],$PassDB[$i]) == 0)
                        echo "帳號密碼<b>均正確!</b>ヾ(≧▽≦*)o";
                    else
                        echo "<b>密碼錯誤</b>＞︿＜";
                    $foundAccount = true;
                }
            }

            if(!$foundAccount)
                echo "<b>沒有找到此帳號</b>請檢查後再嘗試(。>︿<)_θ";

        }else{
            echo "帳號和密碼<b>都需要輸入喔!</b>";
        }
        ?>

    </body>

</html>