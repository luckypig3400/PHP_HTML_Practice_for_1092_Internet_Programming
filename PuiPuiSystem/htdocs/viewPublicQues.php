<!DOCTYPE HTML>
<!--
	Twenty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>公開題庫-PuiPuiSystem</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" />
    </noscript>
</head>

<body class="index is-preload">

    <div id="page-wrapper">

        <!-- Header -->
        <header id="header" class="alt">
            <h1 id="logo"><a href="index.html">Pui Pui 系統</a></h1>
            <nav id="nav">
                <ul>
                    <li class="current"><a href="welcome.php">系統首頁</a></li>
                    <li class="submenu">
                        <a href="#">功能總覽</a>
                        <ul>
                            <li><a href="joinRoom.php">加入房間</a></li>
                            <li><a href="viewPublicQues.php">劉覽公開題庫</a></li>
                            <li class="submenu">
                                <a href="#">會員專屬</a>
                                <ul>
                                    <li><a href="addNewQues.php">建立新的題庫</a></li>
                                    <li><a href="viewMyQues.php">瀏覽我的題庫</a></li>
                                    <li><a href="createRoom.php">建立房間</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">聯繫我們</a></li>
                        </ul>
                    </li>
                    <?php
                    session_start();
                    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                        echo "<li><a href='reset-password.php' class='button alert-danger'>重設密碼</a></li><li><a href='logout.php' class='button primary'>登出帳號</a></li>";
                    } else {
                        echo "</li><li><a href='signup.php' class='button primary'>註冊帳號</a></li><li><a href='login.php' class='button alert-danger'>登入帳號</a></li>";
                    }
                    ?>
                </ul>
            </nav>
        </header>

        <section id="banner">
            <header class="special container">
                <span class="icon solid fa-globe"></span>
                <h2>公開題庫</h2>
                <p>瀏覽公開題庫集並開始遊玩</p>
            </header>
        </section>

        <!-- Main -->
        <article id="main">

            <!-- One -->
            <section class="wrapper style4 special container medium">

                <h2>公開題庫列表</h2>

            </section>

        </article>

        <div style="overflow-x:auto;">
            <table>
                <tr>
                    <th>資料筆數</th>
                    <th>題目</th>
                    <th>選項1</th>
                    <th>選項2</th>
                    <th>選項3</th>
                    <th>選項4</th>
                    <th>解答</th>
                    <th>選項1詳解</th>
                    <th>選項2詳解</th>
                    <th>選項3詳解</th>
                    <th>選項4詳解</th>
                    <th>科目</th>
                    <th>題庫集標題</th>
                    <th>章節</th>
                </tr>

                <?php
                require_once "config.php";

                // Prepare a select statement
                $sql = "SELECT * FROM `userquestions` WHERE PublishStatus = 'Y'";

                if ($stmt = $pdo->prepare($sql)) {

                    // Attempt to execute the prepared statement
                    if ($stmt->execute()) {
                        // Check if userID exists, if yes then verify password
                        if ($stmt->rowCount() >= 1) {
                            $rowCount = $stmt->rowCount();

                            for ($i = 1; $i <= $rowCount; $i++) {
                                echo "<tr>";
                                if ($row = $stmt->fetch()) { //用$stmt->fetch()來抓取資料
                                    echo "<td>" . $i . "</td>";
                                    echo "<td>" . $row["Question"] . "</td>";
                                    echo "<td>" . $row["Answer1"] . "</td>";
                                    echo "<td>" . $row["Answer2"] . "</td>";
                                    echo "<td>" . $row["Answer3"] . "</td>";
                                    echo "<td>" . $row["Answer4"] . "</td>";
                                    echo "<td>" . $row["Correct_Ans"] . "</td>";
                                    echo "<td>" . $row["Detailed1"] . "</td>";
                                    echo "<td>" . $row["Detailed2"] . "</td>";
                                    echo "<td>" . $row["Detailed3"] . "</td>";
                                    echo "<td>" . $row["Detailed4"] . "</td>";
                                    echo "<td>" . $row["Subject"] . "</td>";
                                    echo "<td>" . $row["Title"] . "</td>";
                                    echo "<td>" . $row["Chapter"] . "</td>";
                                }
                                echo "</tr>";
                            }
                        } else {
                            // 目前沒有公開題庫
                            echo "<p>很抱歉! 目前沒有公開題庫QAQ</p>";
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    // Close statement
                    unset($stmt);
                }
                // Close connection
                unset($pdo);

                ?>
            </table>
        </div>

        <!-- Footer -->
        <footer id="footer">

            <ul class="icons">
                <li><a href="#" class="icon brands circle fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon brands circle fa-facebook-f"><span class="label">Facebook</span></a>
                </li>
                <li><a href="#" class="icon brands circle fa-google-plus-g"><span class="label">Google+</span></a>
                </li>
                <li><a href="#" class="icon brands circle fa-github"><span class="label">Github</span></a></li>
                <li><a href="#" class="icon brands circle fa-dribbble"><span class="label">Dribbble</span></a></li>
            </ul>

            <ul class="copyright">
                <li>&copy; Pui Pui System</li>
                <li>Website Creator: LuckyPig3400</li>
                <li>Template Design: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>

        </footer>

    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.dropotron.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>