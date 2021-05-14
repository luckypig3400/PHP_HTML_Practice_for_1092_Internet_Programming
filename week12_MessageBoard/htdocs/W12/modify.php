<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>修改留言</title>
    </head>

    <body align="center">
        <h1>修改留言</h1>

        <?php
        if(isset($_POST['msgID'])){
            
        }
        ?>

        <form action="./modify.php" method="POST">
            <input type="text" name="msgTitle" hidden value="">
            內容:<textarea name="msgContent" cols="30" rows="15"></textarea>
            <br><input type="submit" value="修改">
        </form>
    </body>

</html>